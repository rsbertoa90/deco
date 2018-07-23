<template>
    <div v-if="payments && payments.length > 0">
        <h2>Historial de pagos</h2>
        <table class="table table-striped">
            <thead>

            </thead>
            <tbody>
                <tr  v-for="(pay,key) in payments" :key="pay.id">
                     <td>
                         {{ pay.created_at }}
                     </td>
                    <td class="row"> 
                        <span class="col-12" v-for="(inscription) in pay.inscriptions" 
                              :key="inscription.id"> 
                                <b> {{inscription.event.seminar.title}} </b> /
                                <span v-if="inscription.event.mode == 'presencial'"> /
                                    {{inscription.event.state}} - {{inscription.event.city}}  /
                                     </span>
                                <span v-else>ONLINE</span>/
                                <span>{{inscription.event.date}}</span>
                        </span>
                     </td>
                     <td>
                         ${{pay.amount}}
                     </td>
                     <td>
                         <img v-if="pay.ticket" :src="pay.ticket" :alt="pay.ticket">
                     </td>
                    
                     <td>
                         <div class="row d-flex flex-column">
                            <button v-if="pay.status == 'revision'" class="button btn-sm btn-outline-warning"
                                    :class="{'btn-warning text-white':pay.status == 'revision'}"
                                    @click = "changeStatus(key,'revision')">Revision</button>
                            <button v-if="pay.status != 'cancelado'" class="button btn-sm btn-outline-success"
                                    :class="{'btn-success text-white': pay.status == 'confirmado'}"
                                    @click = "changeStatus(key,'confirmado')">Confirmado</button>
                            <button v-if="pay.status != 'confirmado'" class="button btn-sm btn-outline-danger"
                                    :class="{'btn-danger text-white':pay.status == 'cancelado'}"
                                    @click = "changeStatus(key,'cancelado')">Cancelado</button>
                         </div>
                     </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { EventBus } from '../../app.js';
    export default{
         props:{
            user :{default:null},
        },
        data(){
         return {
             payments:[]
         }   
        },
        created(){
            
            var vm = this;
            
            $.ajax({
                url: '/api/payments/unregistered/'+vm.user.id,
                success(res){
                    vm.payments = res;
                    // console.log(res);
                    // console.log(vm.payments.length);
                    
                }
            });
        },
        methods: {
            changeStatus(key,status){
                var vm = this;
                if (status != this.payments[key].status){

                
                    vm.payments[key].status = status;

                    $.ajax({
                        url : '/admin/payments/change-status/',
                        method : 'put',
                        data : {
                            _token : window.csrf,
                            status : status,
                            payment : vm.payments[key].id
                        },
                        success(){
                            
                                EventBus.$emit('refreshData');
                        }
                    });

                 }
                
            }
        }
    }
</script>
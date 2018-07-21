<template>
    <div class="row border-dark">
        <div class="col-12">
            <h4>Cargar pagos</h4>
        </div>
      <hr>
       <form class="col-12" action="/admin/unregistered/registerPayment" method="post">
           <input type="hidden" name="_token" :value="csrf">
       
           <div v-if="user" class="border-danger">
                <div class="col-12">
                    <table class="col-12 table-striped table-bordered">
                            <thead>
                                <th> Pagar </th>
                                <th> Seminario </th>
                                <th> Localidad </th>
                                <th> Fecha </th>
                                <th> Pagado </th>
                            </thead>
                        <tbody>
                            <tr v-for="inscription in user.presencial" :key="inscription.id" > 
                               
                                    <td> <input v-if="inscription.payd < inscription.event.price" v-model="selected" :data-price="inscription.event.price" :data-payd="inscription.payd" type="checkbox" name="inscriptions[]" :value="inscription.id"> </td>
                                    <td> <b>  {{inscription.event.seminar.title}} </b> </td>
                                    <td> {{inscription.event.state}} - {{inscription.event.city}} </td>
                                    <td> {{inscription.event.date}} </td>
                                    <td v-if="inscription.payd < inscription.event.price"> ${{inscription.payd}} / ${{inscription.event.price}}   </td>
                                     <td v-else> <span class="text-success">PAGO</span>  </td>
                            </tr>
                            <tr v-for="inscription in user.online" :key="inscription.id" > 
                               
                                    <td> <input v-if="inscription.payd < inscription.event.price" v-model="selected" :data-price="inscription.event.price" :data-payd="inscription.payd" type="checkbox" name="inscriptions[]" :value="inscription.id"> </td>
                                    <td> <b>  {{inscription.event.seminar.title}} </b> </td>
                                    <td>ONLINE</td>
                                    <td> {{inscription.event.date}} </td>
                                    <td v-if="inscription.payd < inscription.event.price"> ${{inscription.payd}} / ${{inscription.event.price}}   </td>
                                    <td v-else> <span class="text-success">PAGO</span>  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              
                <div class="row mt-4">
                    <div class="col-12 row form-group">
                        <label class="col-2" for="">Email</label>
                        <input class ="col-4" type="text" name="email" v-model="user.email">
                    </div>
                       <div class="form-group row col-12">
                            <label class="col-2">Tipo de pago</label>
                            <select required name="type" class="form-control col-4">
                                <option v-for="type in paymentTypes" name="type" :value="type" :key="type">{{type}}</option>
                            </select>
                        </div>
                    <div class="col-12 row form-group">
                        <label class="col-2" for="">Monto</label>
                        <input required class ="col-4" type="number" name="amount" :max="total">
                        / $ <input type="number"  disabled :value="total">
                        <input type="hidden" name="total" :value="total">
                    </div>
                    <div class="col-12 row form-group">
                        <label class="col-2" for="">URL comprobante de pago</label>
                        <input class ="col-4" type="text" name="ticket" v-model="url">
                    </div>
                    <div  v-if="url" class="col-12 row form-group">
                        <div class="offset-4 col-2">
                             <img style="width:100%" :src="url" alt="ticket">
                        </div>
                    </div>
                     <div class="col-12 row form-group">
                        <label class="col-2" for="">Comentarios</label>
                        <textarea name="comments" id="" class="form-control col-4"></textarea>
                    </div>
                </div>
                <button class="button btn-lg btn-outline-success" :disabled="formValid" >ENVIAR</button>
           </div>
       </form>
    </div>
</template>
<script>
    export  default{
        props:{
            user :{default:null},
        },
        data(){
            return{
                selected:[],
                // userInput :null,
                // userSugestions:null,
                // users:null,
               
                total : 0,
                url: null,
                csrf: window.csrf,
                paymentTypes: null,
            }
        },
        methods: {
            getTotal(){
                var tot = 0;                
                $('input[type=checkbox]:checked').each(function(){
                        // console.log($(this).attr('data-price'));     
                        tot+= ( Number($(this).attr('data-price')) - Number($(this).attr('data-payd'))  );  
                    });
                
                return tot;
            }
        },
        watch:{
            selected(){
                this.total = this.getTotal();
            },
        },
        created(){
            var vm = this;
             $.ajax({
                url : '/api/payment_types',
                success(response){  
                    vm.paymentTypes = response;
                }
            });
            // Lista de usuarios con inscripciones activas

           
        },
        computed: {
            formValid(){
                if ($('input[type=checkbox]:checked').length > 0)
                {return true}
                else {return false}
            }
        }
    }
</script>
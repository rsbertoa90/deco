<template>
    <div>
        <h2>Inscripciones</h2>
        <form action="/admin/inscriptions" method="post">
             <input type="hidden" name="_token" :value="csrf">
        

            <div class="form-group row">
                <label class="col-2">Ciudad</label>
                <select required name="city" v-model='city' class="form-control col-4">
                    <option v-for="op in citys" :value="op" :key="op">{{op}}</option>
                </select>
                <div  class="col-12 row" v-for="event in events" :key="event.id">
                    <input v-model="selected" class="form-control col-1" type="checkbox" name="events[]" :value="event.id">
                    <label for="" class="col-11"><b>  {{event.seminar.title}}</b> / {{event.state}} - {{event.city}} / {{event.date}}</label>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="" class="col-2">Tipo de pago</label>
                <select required name="type">
                    <option v-for="type in paymentTypes" :value="type" :key="type">{{type}}</option>
                </select>
            </div> -->
            
            <div class="form-group row">
                <label class="col-2">Nombre -de facebook-</label>
                <input  required type="text" name="fbname" class="form-control col-4">
            </div>
            
            <div class="form-group row">
                <label class="col-2">Email-</label>
                <input type="email" name="email" class="form-control col-4">
            </div>

            <div class="form-group row">
                <label class="col-2">Observaciones</label>
                <textarea name="comments" class="form-control col-4" ></textarea>            
            </div>
            <div class="row">
                <button class="button btn-lg btn-outline-info col-4 offset-2" :disabled="!validForm">GUARDAR</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                citys: null,
                city: null,
                events:null,
                paymentTypes:null,
                selected: [],
                validForm:false,
                csrf: window.csrf
            }
        },
       
        watch: {
            city: function(){
                var vm = this;
                // presenciales
                $.ajax({
                    url : '/api/events/city/'+vm.city,
                    success(response){
                        vm.events = response;
                    }
                });
              
            },
            selected(){
                if( this.selected.length > 0){
                    this.validForm = true;
                }else{this.validForm = false;}
            }
        },
        methods: {

        },
        computed: {
            
        },
        created() {
            var vm = this;
            // cargo ciudades
            $.ajax({
                url : '/api/activeCitys',
                success(response){ 
                    vm.citys = response;
                }
            });
            // cargo tipos de pago
            $.ajax({
                url : '/api/payment_types',
                success(response){  
                    vm.paymentTypes = response;
                }
            });


        }
    }
</script>
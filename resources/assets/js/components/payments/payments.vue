<template>
    <div>    
    
        <div class="row form-group">
            <label for="">Buscar usuario por nombre</label>
            <input type="text" class="form-control" v-model="userInput">
        </div>
       <div v-if="userSugestions" class="row form-group">
               <div class="col-4">
                   <div class="row" v-for='sugestion in userSugestions' :key="sugestion.id" >
                      <span  @click="setUser(sugestion)" class="text-center button btn-block btn-success">
                          {{sugestion.fbname}}
                      </span> 
                   </div>
               </div>
        </div>
        <pay-create v-if="user" :user="user" @refresh="refresh"></pay-create>
        <hr>
        <pay-list  v-if="user"  class="mt-4" :user="user" ></pay-list>
    </div>
</template>

<script>
    import { EventBus } from '../../app.js';
    import create from  './create'
    import list from  './list'
    export default{
        components:{
            'pay-create' :create,
            'pay-list' : list
        },
        data(){
            return{

                users: null,
                user:null,
                userInput: null,
                userSugestions: null,
            }
        },
        watch: {
            userInput(){
                    var vm=this;
                    if (this.userInput.length > 3){
                        $.ajax({
                            url:'/admin/inscriptions/userSearch/'+vm.userInput,
                            success(response){
                                if (response.length >= 0){
                                    vm.userSugestions = response;
                                }
                            }
                        });
                    }
                },
        },
        methods: {
            refresh(){
              console.log('freshed up');
            //   this.$forceUpdate();  
              var resg = this.user;
              this.user = null;
              this.user =resg; 
            },
            setUser(user){
                this.user = user ;
                var vm = this;

                 // presencial
            $.ajax({
                url: '/api/inscriptions/unregistered/presencial/'+vm.user.id,
                success(response){
                   Vue.set(vm.user,'presencial',response);
                }
            });
            // online
             $.ajax({
                url: '/api/inscriptions/unregistered/online/'+vm.user.id,
                success(response){
                    Vue.set(vm.user,'online',response);
                }
            });

            
            

            }
        },
        created(){
              EventBus.$on('refreshData', () => {
                 console.log('event from bus');
                this.setUser(this.user);
            });
        }

    }
</script>
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
        <pay-create v-if="user" :user="user"></pay-create>
    </div>
</template>

<script>
    import create from  './create'
    export default{
        components:{
            'pay-create' :create
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
        }

    }
</script>
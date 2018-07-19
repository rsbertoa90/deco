<template>
    <div>
        <div class="row">
            <div class="col-4">
                <button 
                    class="btn-block button " 
                    :class="{'btn-success text-white':seminarType=='presencial',
                            'btn-outline-success':seminarType=='online'}"
                             @click="seminarType = 'presencial'">
                             PRESENCIAL
                </button>
            </div>
            <div class="col-4">
                <button 
                    class="btn-block button btn-outline-info " 
                    :class="{'btn-info text-white':seminarType=='online',
                            'btn-outline-info ':seminarType=='presencial'}"
                    @click="seminarType = 'online'">
                    ONLINE

                </button>
                </div>
        </div>
       
        <presencial v-if="seminarType=='presencial'"></presencial>
        <online v-if="seminarType=='online'"></online>
        
    </div>
</template>

<script>
    import presencial from './inscriptions/presencial.vue';
    import online from './inscriptions/online.vue';

    export default {
        data(){
            return {
                seminarType: 'presencial'
            }
        },
        components: {
            'presencial':presencial,
            'online':online
        }
    }
</script>
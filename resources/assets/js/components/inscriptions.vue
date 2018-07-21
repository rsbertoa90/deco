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
        
            <insc-presencial v-if="seminarType=='presencial'"></insc-presencial>
            <insc-online v-if="seminarType=='online'"></insc-online>
       
        <hr>
            <insc-payments></insc-payments>
        
       
        
    </div>
</template>

<script>
    import presencial from './inscriptions/presencial.vue';
    import online from './inscriptions/online.vue';
    import payments from './payments/payments.vue';

    export default {
        data(){
            return {
                seminarType: 'presencial'
            }
        },
        components: {
            'insc-presencial':presencial,
            'insc-online':online,
            'insc-payments':payments
        }
    }
</script>
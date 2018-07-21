<template>
    <div>
        <table class="table table-striped">
            <thead>

            </thead>
            <tbody>
                <tr v-for="inscription in user.online" :key="inscription.id">
                    <td> <b> {{inscription.event.seminar.title}} </b> </td>
                    <td>ONLINE</td>
                    <td>{{inscription.event.date}} </td>
                    <td>  </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
        props:['user'],
        data(){
         
        }
    }
</script>
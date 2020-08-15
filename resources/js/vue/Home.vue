<template>
    <div v-if='isMounted'>

        <Event :event='event'></Event>


        <Gacha :gacha='gacha'></Gacha>

    </div>
</template>

<script>

import axios from 'axios'
import Event from './Event.vue'
import Gacha from './Gacha.vue'
    
export default {
    components: {
        'Event': Event,
        'Gacha': Gacha,

    },
    data(){

        return{

            isMounted : false,
            event : null,
            gacha : null,

        }
    },
    mounted(){

        axios.all([

            axios.get('https://mltw-wiki.online/api/v1/events/now'),
            axios.get('https://mltw-wiki.online/api/v1/gachas/now')

        ])
        .then(axios.spread((responseA , responseB) =>{

            this.event = responseA.data
            this.gacha = responseB.data

        }));



        this.isMounted = true;


    }
}

</script>
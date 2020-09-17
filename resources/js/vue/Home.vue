<template>
    <div v-if='isMounted'>


        <hr>
        


        <div v-for='event in events' v-if='events.length != 0'>
            <div style='text-align: center; font-size: 42px; font-weight: bold;'>當前活動<br></div>
            <div style='text-align: center; font-size: 18px; font-weight: bold; background-color: red; color: white;'>
                {{ e_left }}
            </div>

            <Event :event='event'></Event>

                



            <hr>
        </div>


        <div style='text-align: center; font-size: 42px; font-weight: bold;'>當前轉蛋<br></div>

        <div style='text-align: center; font-size: 18px; font-weight: bold; background-color: red; color: white;'>
            {{ g_left }}
        </div>

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
            events : null,
            gacha : null,

            e_countdown : null,
            e_left : null,
            g_countdown : null,
            g_left : null,

            date : Date.now() / 1000,

        }
    },
    watch:{

        e_countdown:{

            

            handler(value){


                if(value > 0){

                    setTimeout(() =>{

                        this.e_countdown--;
                        this.e_left = this.left(this.e_countdown);

                        

                    } , 1000);

                }

                immediate: true;

            }

        },

        g_countdown:{

            handler(value){

                if(value > 0){

                    setTimeout(() =>{

                        this.g_countdown--;
                        this.g_left = this.left(this.g_countdown);

                    } , 1000);

                }

                immediate: true;

            }


        },

    },
    methods: {

        left(temp){

            var day;
            var hr;
            var min;
            var sec;

            if(temp >= 86400){
                day = Math.floor(temp / 86400).toString() + ' 天 ';
                temp %= 86400;
            }else{

                day = '';

            }

            if(temp >= 3600){

                hr = Math.floor(temp / 3600).toString() + ' 小時 ';
                temp %= 3600;

            }else{

                hr = '';

            }

            if(temp >= 60){

                min = Math.floor(temp / 60).toString() + ' 分 ';
                temp %= 60;
                
            }else{

                min = '';

            }

            sec = Math.floor(temp).toString() + ' 秒 ';


            return  '剩餘 ' + day + hr + min + sec;

        },



    },

    mounted(){

        axios.all([

            axios.get('https://mltw-wiki.online/api/v1/events/now'),
            axios.get('https://mltw-wiki.online/api/v1/gachas/now'),


        ])
        .then(axios.spread((responseA , responseB) =>{

            this.events = responseA.data,
            this.gacha = responseB.data,

            this.g_countdown = Math.floor((new Date(this.gacha.end_date) / 1000 + 75599) - this.date);

            this.g_left = this.left(this.g_countdown);


            if((this.events).length == 0){

                this.e_left='無舉辦中活動';

            }

            else{

                this.e_countdown = Math.floor((new Date(this.events[0].end_date) / 1000 + 75599) - this.date);
                this.e_left = this.left(this.e_countdown);

            }

            this.isMounted = true;


        }))
        .finally(() =>{


        });




        





    }
}

</script>
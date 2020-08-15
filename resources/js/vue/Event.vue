<template>
	<div>

        <div class='row'>

            <div :class="'col-md-' + display[0]"/>

        
            <table :class="'full event col-md-' + display[1]">


                <thead>

                    <tr>
                        <th class='col-md-6'>{{event.name_tw}}</th>
                        <th class='col-md-6'>{{event.start_date}} ~ {{event.end_date}}</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td class='col-md-6' height='200'>
                            <img :src='event.image' v-on:click='sw()' width ='365'>
                        </td>

                        <td class='col-md-6'>
                            <div v-if='event.type == "anniversary"'>
                                
                                52位偶像各有一張PST卡與一套衣服(&異色)

                            </div>
                            <div v-else>
                                <div v-for='card in event.cards'>
                                    <router-link :to="{ name: 'card' , params: { id: card.id }}">
                                        <b>{{ card.name_tw }}</b></br>
                                    </router-link>
                                </div>
                            </div>
                        </td>

                    </tr>

                    <tr v-if='check_display(event.id)' >

                        <td v-if='event.type =="tour" || event.type == "theater" '
                        colspan = '2' height='auto' style="text-align:left">
                            <div class='row' style='margin:23px;'>

                                <div class = 'col-md-4'>

                                    <div v-if='event.boost_date'>
                                        <div>
                                            {{event.start_date}} 活動開始<br>{{event.boost_date}} 進入後半戰<br>{{event.end_date}} 活動結束
                                        </div>
                                        
                                        <div>
                                            
                                            <div>總活動時間： {{total_time()}}</div>
                                            <div>前半段長度：　{{first_half()}}</div>
                                            <div>後半段長度： {{second_half()}}</div>

                                        </div>
                                    </div>

                                    <div v-else>
                                        <div>{{event.start_date}} 活動開始<br>{{event.end_date}} 活動結束</div>
                                        
                                        <div>
                                            
                                            <div>總活動時間： {{total_time()}}</div>


                                        </div>
                                    </div>

                                </div>

                                <div class = 'col-md-8'>
                                    
                                    <div v-if='event.songs'>
                                        <div v-for='song in event.songs'>

                                            <table>
                                                <tr>
                                                    <td class ='col-md-4'>
                                                        <router-link :to="{ name: 'song' , params: { id: song.id }}">
                                                            <img :src='song.image' width='150'>
                                                        </router-link>
                                                    </td>

                                                    <td class ='col-md-6'>
                                                        <router-link :to="{ name: 'song' , params: { id: song.id }}">
                                                            {{song.name_tw}}
                                                        </router-link>
                                                    </td>

                                                    <td class ='col-md-2'>
                                                        {{song.type}}
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div :class="'col-md-' + display[2]"/>
        </div>


	</div>
</template>



<script>
import _ from "lodash"

    export default {
        props: {
            event:{},
        },
        data(){
    		return{

                display:[],
                date1: new Date(this.event.start_date) / 1000 / 3600,
                date3: new Date(this.event.end_date) / 1000 / 3600,


			}
        },
        methods:{

            total_time(){

                return (this.date3 - this.date1 + 6).toString() + '小時';

            },
            first_half(){

                var date2 = new Date(this.event.boost_date) / 1000 / 3600;
                return (date2 - this.date1).toString() + '小時';


            },
            second_half(){

                var date2 = new Date(this.event.boost_date) / 1000 / 3600;
                return (this.date3 - date2 + 6).toString() + '小時';


            },

            check_display(id){

                if(this.display.indexOf(id) == -1){


                    return false;

                }
                else{

                    return true;


                }

            },
            if_display(id){

                if(this.display.indexOf(id) == -1){

                    return [1 , 10 , 1];

                }
                else{

                    return [0 , 12 , 0];

                }


            },

            sw(id){

                if(this.display.indexOf(id) == -1){

                    this.display.push(id);

                }
                else{

                    this.display.splice(this.display.indexOf(id) , 1);

                }


            },


        },
        computed:{





        },
        mounted(){





        }
    }
</script>
<template>
	<div>

        <div class='row'>

            <div :class="margin()"/>

        
            <table :class="content() + ' full event'">


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

                    <tr v-if='display[1] == 12' >

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

                            <div style='text-align:center;'>

                                <button type="button" class="btn btn-primary" v-on:click="get_ep()">日版資訊點我</button>

                                <div v-if='jp_info'>

                                    資料來源：<a href='https://api.matsurihi.me/docs/'>matsurihi.me</a>

                                    <div class = 'row'>
                                        <div class = 'col-sm-3'/>
                                        <div class = 'col-sm-6'>

                                            總分排名（總人數：{{ep.count}}）<br>
                                            <table>
                                                <tr>

                                                    <th>排名</th>
                                                    <th>分數</th>

                                                </tr>

                                                <tr v-for='rk in ep.scores'>

                                                    <td>{{rk.rank}}</td>
                                                    <td>{{rk.score}}</td>

                                                </tr>
                                            </table>
                                        </div>
                                        <div class='col-sm-3'/>
                                    </div>
                                    
                                    <br>

                                    <div class = 'row'>
                                        <div class = 'col-sm-2'/>
                                        <div class = 'col-sm-3'>

                                            高分排名（總人數：{{hs.count}}）<br>

                                            <table>
                                                <tr>

                                                    <th>排名</th>
                                                    <th>分數</th>

                                                </tr>

                                                <tr v-for='rk in hs.scores'>

                                                    <td>{{rk.rank}}</td>
                                                    <td>{{rk.score}}</td>

                                                </tr>
                                            </table>
                                        </div>

                                        <div class = 'col-sm-2'/>

                                        <div class = 'col-sm-3'>

                                            社交圈排名（總人數：{{lp.count}}）<br>
                                            <table>
                                                <tr>

                                                    <th>排名</th>
                                                    <th>分數</th>

                                                </tr>

                                                <tr v-for='rk in lp.scores'>

                                                    <td>{{rk.rank}}</td>
                                                    <td>{{rk.score}}</td>

                                                </tr>
                                            </table>
                                        </div>

                                        <div class = 'col-sm-2'/>
                                    </div>

                                    <br><br>

                                </div>

                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div :class="margin()"/>
            
        </div>


	</div>
</template>



<script>
import _ from "lodash"
import axios from "axios"

    export default {
        props: {
            event:{},
        },
        data(){
    		return{

                display:[1 , 10],
                date1: new Date(this.event.start_date) / 1000 / 3600,
                date3: new Date(this.event.end_date) / 1000 / 3600,
                jp_info: false,

                ep: null,
                hs: null,
                lp: null



			}
        },
        methods:{

            get_ep(){
                if(this.jp_info){

                    return;

                }

                axios
                .get('https://api.matsurihi.me/mltd/v1/events/' + this.event.api_id.toString() + '/rankings/borderPoints')
                .then(response => (
                    this.ep = response.data.eventPoint,
                    this.hs = response.data.highScore,
                    this.lp = response.data.loungePoint,
                    this.jp_info = true
                    ));

                

            },


            margin(){

                return 'col-md-' + this.display[0];

            },
            content(){

                return 'col-md-' + this.display[1];

            },

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

            sw(){


                if(this.display[0] == 1){

                    this.display = [0 , 12];

                }
                else{

                    this.display = [1 , 10];

                }


            },


        },
        computed:{





        },
        mounted(){





        }
    }
</script>
<template>
    
    <div v-if="!(is_open)" class='row'>

        <div class='col-md-1'></div>

        <div class='col-md-10 event'>
    
            <table class='full'>

                <tr class='row'>
                    <th class='col-md-6'>{{ event.name_tw }}</th>
                    <th class='col-md-6'>{{ event.start_date }} ~ {{ event.end_date }}</th>
                </tr>

                <tr class='row'>

                    <td class='col-md-6' height='200'>
                        <a class ='void' href='javascript: void(0)' v-on:click='open(is_open)'>
                        <img :src='image' width ='365'/>
                        </a>
                        <div>{{ is_open }}</div>
                    </td>
                    <td class='col-md-6'>
                        <div v-if='event.type == "anniversary"'>52位偶像皆有一張卡與衣服</div>
                        <div v-for='card in JSON.parse(cards)' v-else><b><a :href='card_url(card)'>{{ card.name_tw }}</a></b></div>
                    </td>
                    
                </tr>

            </table>
        </div>

        <div class='col-md-1'></div>

    </div>

    <div class='row' v-else>

        <div class='col-md-12 event'>
    
            <table class='full'>

                <tr class='row'>
                    <th class='col-md-6'>{{ event.name_tw }}</th>
                    <th class='col-md-6'>{{ event.start_date }} ~ {{ event.end_date }}</th>
                </tr>

                <tr class='row'>

                    <td class='col-md-6' height='200'>
                        <a class ='void' href='javascript: void(0)' v-on:click='open(is_open)'>
                        <img :src='image' width ='365'/>
                        </a>
                    </td>
                    <td class='col-md-6'>
                        <div v-if='event.type == "anniversary"'>52位偶像皆有一張卡與衣服</div>
                        <div v-for='card in JSON.parse(cards)' v-else><b><a :href='card_url(card)'>{{ card.name_tw }}</a></b></div>
                    </td>
                </tr>
                <tr class='row'>
                    
                    <td colspan = '2' class='col-md-12 event_content' height='auto'>
                        <br/>
                        <div class='row'>

                            <div class='col-md-4 data'>                    
                                <div>活動開始於：{{ event.start_date }} 15:00</div>
                                <div v-if='ept'>後半開始於：{{ event.boost_date }} 15:00</div>
                                <div>活動結束於：{{ event.end_date }} 20:59</div>
                                <br/>

                                <div>總活動長度：<b>{{ total_time }}</b><br/></div>
                                <div v-if='ept'>
                                    
                                    前半戰長度：<b>{{ first_half }}</b><br/>
                                    後半戰長度：<b>{{ second_half }}</b><br/>

                                </div>
                                
                               
                            
                            </div>


                            <div class='col-md-8' v-if='songs'>
                            
                        
                                <table class='inner col-md-11' v-for='song in JSON.parse(songs)'>
                                    <tr class='row'>
                                        <th class ='col-sm-2 t2'><img src='' width='120' /></th>
                                        <th class ='col-sm-6 t2'><b>{{ song.name_tw }}</b></th>
                        
                                        <th class ='col-sm-2 t2'></th>
                                        <th class ='col-sm-2 t2'>{{ song.type }}</th>
                                    </tr>
                                </table>
                                <div class='col-md-1'></div>
                        
                            </div>

                            <div class='col-md-8' v-else></div>
                        
                        </div>
                        <br/><br/><br/>
                        
                        <div v-if='ept'>
                            <a class="btn btn-primary" data-toggle="collapse" :href='"#" + event.id + "collapseExample"' role="button" aria-expanded="false" aria-controls="collapseExample">
                            日版資訊點我
                            </a>
                            <br/><br/>
                    
                            <div :id='event.id + "collapseExample"' class='collapse'>
                                <h1><b>以下資料來自於<a href='https://api.matsurihi.me/docs/'>matsurihi.me</a></b></h1>
                                <br/>
                                <div class='row'>
                                    <div class='col-md-1'></div>
                                    <div class='col-md-6 data'>
                                        <h2><b>日版本期活動</b></h2><br/>
                                        <div class='col-md-4'>
                                        總參與人數：<br/>
                                        總活動長度：<br/>
                                        前半戰長度：<br/>
                                        後半戰長度：<br/>
                                        </div>

                                        <div class='col-md-7'>
                                            <b>{{ JSON.parse(ept).count }}</b> 人<br/>
                                            <b>{{ total_time }}</b><br/>
                                            <b>{{ first_half }}</b><br/>
                                            <b>{{ second_half }}</b>
                                        </div>

                                        <div class='col-md-1'></div>


                                    </div>

                                    <table id='ep' class='col-md-4'>
                                <tr>
                                    <td colspan='2'><b>累積pt排行榜</b></td>
                                </tr>
                                <tr>
                                    <th>排名</th>
                                    <th>分數</th>
                                </tr>

                                <tr>
                                    <td class ='rk'>1</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_1 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk'>2</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_2 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk'>3</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_3 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk shine'>100</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_100 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk colorful'>2500</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_2500 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk gold'>5000</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_5000 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk silver'>10000</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_10000 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk bronze'>25000</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_25000 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk'>50000</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_50000 }}</td>
                                </tr>

                                <tr>
                                    <td class ='rk'>100000</td>
                                    <td class ='pt'>{{ JSON.parse(ept).ep_100000 }}</td>
                                </tr>

                            </table>
                            
                                </div>
                            </div>
                        </div>
                
                    </td>
                
                </tr>

            </table>
        </div>

    </div>
</template>

<script>

    export default {
        props:{


            event:{
                type: Object,
            } ,
            image:{
                type: String,
            } ,
            cards:{
                type: Object,
            } ,
            ept:{
                type: Object,
            } ,
            songs:{
                type: Object,
            } ,

            
        },
        data(){
            return{
            
                'is_open': false,

            };

        },
        computed:{

            total_time(){
                var start_date = new Date(this.event.start_date);
                var end_date = new Date(this.event.end_date);
                
                var length = end_date - start_date;
                length = length / 1000;
                length = length / 86400;
                return (parseInt(length)).toString() + ' 天 9 小時（' + (parseInt(length * 24) + 9).toString() + ' 小時）';
                
            } ,
            first_half(){
                var start_date = new Date(this.event.start_date);
                var boost_date = new Date(this.event.boost_date);
                var hours = (boost_date - start_date) / 1000 / 60 / 60;
                return (hours / 24).toString() + ' 天   　　　（' + (hours).toString() + ' 小時）'
            },
            second_half(){
                var end_date = new Date(this.event.end_date);
                var boost_date = new Date(this.event.boost_date);
                var hours = (end_date - boost_date) / 1000 / 60 / 60;
                return (hours / 24).toString() + ' 天 9 小時（' + (hours + 9).toString() + ' 小時）';
            },


        },
        methods:{
            card_url(card){

                return './cards/' + card.name_tw;
                
            },
            open(is_open){

                this.is_open = !(this.is_open);
                return this.is_open;
            },


        },
        mounted() {
        console.log('papara');
        }
    }

</script>

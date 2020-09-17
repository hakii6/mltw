<template>

	<div class ='row'>

		<div :class="margin()"/>

		<table :class="content() + ' full gacha'">

			<thead>

			    <tr>
			        <th class ='col-md-6'><b>{{ gacha.name_tw }}</b></th>
			        <th class ='col-md-6'><b>{{ gacha.start_date }} ~ {{ gacha.end_date }}</b></th>
			    </tr>

			</thead>

			<tbody>
			    <tr>

			        <td class ='col-md-6' height='200'>
			            
			            <img :src='gacha.image' v-on:click='sw(gacha.id)' width ='365'>

			        </td>
			        
			        <td class ='col-md-6'>
			        	<div v-for='card in gacha.cards'>
			            	<router-link :to="{ name: 'card' , params: { id: card.id }}"><b>{{ card.name_tw }}</b></br></router-link>
			        	</div>
			        </td>

			    </tr>
	    	


			    <tr v-if='display[1] == 12'>

			        <td colspan = '2'  height='700'>

			            <table class='inner' style='table-layout: fixed;' width='100%'>

			            	<thead>
				                <tr>
				                    <th class ='col-sm-2 t2'>未覺醒</th>
				                    <th class ='col-sm-2 t2'>已覺醒</th>
				                    <th class ='col-sm-5 t2'>卡名</th>
				                    <th class ='col-sm-1 t2'>稀有度</th>
				                    <th class ='col-sm-2 t2'>類型</th>
				                </tr>
							</thead>

			    
		    				<tbody>
				                <tr height='180' v-for='card in gacha.cards'>

				                    <td class ='t2'>
				                        <router-link :to="{ name: 'card' , params: { id: card.id }}">
				                        	<img :src='card.imageA' width='110'>
				                        </router-link>
				                    </td>

				                    <td class ='t2'>
				                        <router-link :to="{ name: 'card' , params: { id: card.id }}">
				                        	<img :src='card.imageB' width='110'>
				                        </router-link>
				                    </td>

				                    <td class ='t2'>
				                        <router-link :to="{ name: 'card' , params: { id: card.id }}">
				                        	<b>{{ card.name_tw }}</b>
				                    	</router-link>
				                    </td>

				                    <td class ='t2'>{{ card.rarity }}</td>
				                    <td class ='t2' :style='add_color(card.limited)'><b>{{ card.limited }}</b></td>

				                </tr>
			    			</tbody>

			            </table>

			        </td>

			    </tr>

		    </tbody>

		</table>

		<div :class="margin()"/>

					
	</div>

</template>



<script>
import _ from "lodash"

    export default {
        props: {
        	gacha:{},
        },
        data(){
    		return{
    			display: [1 , 10],

			}
        },
        methods:{

        	margin(){

                return 'col-md-' + this.display[0];

            },
            content(){

                return 'col-md-' + this.display[1];

            },

        	sw(){


                if(this.display[0] == 1){

                    this.display = [0 , 12];

                }
                else{

                    this.display = [1 , 10];

                }


            },

			add_color(limited){

				if(limited == '期間限定'){

					return 'color:red; font-size:18px;';

				}else if(limited == 'FES限定'){

					return 'color:green;';

				}else{

					return 'color:grey; font-size:18px;';

				}


			}


        },
        computed:{



        },
        mounted(){





        }
    }
</script>
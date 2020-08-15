<template>

	<div class ='row'>

		<div :class="'col-md-' + if_display(gacha.id)[0]"/>

		<div :class="'gacha col-md-' + if_display(gacha.id)[1]">
			<table class ='full row' >

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
		    	


				    <tr v-if='check_display(gacha.id)'>

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
		</div>

		<div :class="'col-md-' + if_display(gacha.id)[2]"></div>

					
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
    			display: [],

			}
        },
        methods:{

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
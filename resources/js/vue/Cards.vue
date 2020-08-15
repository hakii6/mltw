<template>
	<div style='text-align:center;'>

		<div class='row'>
			<div class='col-md-1'></div>
			    <div class='col-md-10'>
			        <div class='col-md-4' v-on:click="type = 'PRINCESS' , test_on()">PRINCESS</div>
			        <div class='col-md-4' v-on:click="type = 'FAIRY' , test_on()">FAIRY</div>
			        <div class='col-md-4' v-on:click="type = 'ANGEL' , test_on()">ANGEL</div>
			    </div>
			<div class='col-md-1'></div>
		</div>

		<hr>

		<div class='row'>

		    <div class='col-md-3' v-on:click="rarity = 'SSR' , test_on()">SSR</div>

		    <div class='col-md-3' v-on:click="rarity = 'SR' , test_on()">SR</div>

		    <div class='col-md-3' v-on:click="rarity = 'R' , test_on()">R</div>

		    <div class='col-md-3' v-on:click="rarity = 'N' , test_on()">N</div>

		</div>

		<div v-if='display'>
			<hr>

			<div >
				<div class='row'>
					
					<div class='col-md-1'></div>

					<table class='col-md-10 row'>
						<thead>
							<tr>
								<th class='col-md-1.5'>覺醒前</th>
								<th class='col-md-1.5'>覺醒後</th>
								<th class='col-md-5'>卡名</th>
								<th class='col-md-2'>稀有度</th>
								<th class='col-md-2'>偶像</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for='card in cards_info'>

								<td>
									<router-link :to="{ name: 'card' , params: { id: card.id }}">
										<img :src='card.imageA' width = "110">
									</router-link>
								</td>

								<td>
									<router-link :to="{ name: 'card' , params: { id: card.id }}">
										<img :src='card.imageB' width = "110">
									</router-link>
								</td>

								<td>
									<router-link :to="{ name: 'card' , params: { id: card.id }}">
										<b>{{ card.name_tw }}</b>
									</router-link>
								</td>
								<td>{{ card.rarity }}</td>
								<td><b>{{ card.idol_name_tw }}</b></td>
							</tr>

						</tbody>

					</table>
					<div class='col-md-1'></div>

					
				</div>
			</div>

		</div>

	</div>
</template>

<script>
import axios from 'axios'
import _ from "lodash"

    export default {
        components: {
        },
        data(){
    		return{
    			
    			type: '',
    			rarity: '',
    			cards_info:null,
    			display: false,
    			choose:'',

			}
        },
        methods:{

        	test_on(){
        		

        		if(this.type && this.rarity){

        			this.display = true;
		        	this.choose = this.type + '_' + this.rarity
		        	axios
		        	.get('https://mltw-wiki.online/api/v1/cards/' + this.choose)
		        	.then(response => (this.cards_info = response.data));

        		}

        	},


        },
        computed:{



        },
        mounted(){



        }
    }
</script>
<template>
	<div v-if='isMounted'>

		<div style ='text-align: right;'>
			<a v-if="filter" href='#' @click.prevent="filter = !(filter) "> >>日版未來視點我 </a>
			<a v-else href='#' @click.prevent="filter = !(filter)"> >>回繁體中文版 </a>

		</div>

		<div v-if='filter'>
			<div v-for='gacha in gachas_tw()'>
				<div v-if='date >= new Date(gacha.start_date)'>
					<Gacha :gacha='gacha'></Gacha>
					<br><br><br><br>
				</div>
				
			</div>
		</div>

		<div v-else>
			<div v-for='gacha in gachas_jp()'>
				<div v-if='date < new Date(gacha.start_date)'>
					<Gacha :gacha='gacha'></Gacha>
				</div>
			</div>
		</div>

	</div>
</template>



<script>
import Gacha from './Gacha.vue'
import axios from 'axios'
import _ from "lodash"

    export default {
        components: {
        	'Gacha' :Gacha,
        },
        data(){
    		return{
    			isMounted: false,
    			gachas: null,
    			display: [],
    			filter: true,
    			date: Date.now(),

			}
        },
        methods:{



        	gachas_jp(){


				return _.orderBy(this.gachas , 'end_date' , 'asc');;


        	},
        	gachas_tw(){

	        	return _.orderBy(this.gachas , 'end_date' , 'desc');

        	},



        },
        computed:{





        },
        mounted(){

			axios
			.get('https://mltw-wiki.online/api/v1/gachas')
			.then(response => (this.gachas = response.data));


			this.isMounted = true;





        }
    }
</script>
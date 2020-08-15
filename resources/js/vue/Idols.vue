<template>
	<div class='idols' v-if='isMounted'>

		<div v-for='tp in type'>

		    <h3 style='text-align:center;'>
		    	<img src=''><br>{{ tp }}
		    </h3>

		    <div class = 'row'>
		    	<div v-for='idol in idols'>
			        <div class='col-md-2' style='text-align:center' v-if='idol.type == tp'>
				        <router-link :to="{ name: 'idol' , params: { id: idol.id }}">
				        	<br><br><b>{{ idol.name_tw }}</b></br>
				        	<img :src='idol.image' width='140'>
				        </router-link>
			        </div>
				</div>
		    </div>


		    <br><br><br>
		    <hr>

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
    			isMounted: false,
				idols:[],
				type:['PRINCESS' , 'FAIRY' , 'ANGEL' , 'EX'],

			}
        },
        methods:{



        },
        computed:{



        },
        mounted(){

        	axios
        	.get('https://mltw-wiki.online/api/v1/idols')
        	.then(response => (this.idols = response.data));
        	this.isMounted = true;

        }
    }
</script>
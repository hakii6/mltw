<template>
	<div>
		<div style ='text-align: right;'>
			<a v-if="filter['tw']" href='#' @click.prevent="filter['tw'] = !(filter['tw']) "> >>日版未來視點我 </a>
			<a v-else href='#' @click.prevent="filter['tw'] = !(filter['tw'])"> >>回繁體中文版 </a>

		</div>

		<div class = 'row' style='text-align:center;'>

		    <div class = 'col-md-1'/>
		    <div class = 'col-md-10'>
		        <div class = 'col-md-3'>
		        	<button v-on:click="filter['ALL'] = (!filter['ALL'])">{{ if_on(filter.ALL) }} ALL</button>
		        </div>

		        <div class = 'col-md-3'>
		        	<button v-on:click="filter['PRINCESS'] = (!filter['PRINCESS'])">{{ if_on(filter.PRINCESS) }} PRINCESS</button>
		        </div>

		        <div class = 'col-md-3'>
		        	<button v-on:click="filter['FAIRY'] = (!filter['FAIRY'])">{{ if_on(filter.FAIRY) }} FAIRY</button>
		        </div>

		        <div class = 'col-md-3'>
		        	<button v-on:click="filter['ANGEL'] = (!filter['ANGEL'])">{{ if_on(filter.ANGEL) }} ANGEL</button>
		        </div>
		    </div>

		    <div class = 'col-md-1'/>
		</div>

		<div class='row'>

			<div class='col-md-1'/>

			<table class='col-md-10 row' v-if="filter['tw']">

				<thead>
		            <tr>

		                <th class = 'col-md-1'> </th>
		                <th class = 'col-md-5' v-on:click="add_order('name_tw')">歌名</a></th>
		                <th class = 'col-md-2' v-on:click="add_order('BPM')">BPM</th>
		                <th class = 'col-md-2' v-on:click="add_order('length')">長度</th>
		                <th class = 'col-md-2' v-on:click="add_order('type')">類型</th>

		            </tr>
	        	</thead>

	        	<tbody>
					<tr v-for='song in songs_info' v-if="filter[song['type']] && on_tw(song.date)">

						<td><img class="thumbnail" :src="song.image"></td>
						<td><router-link :to="{ name: 'song' , params: { id: song.id }}"><b>{{ song.name_tw }}</b></router-link></td>
						<td>{{ song.BPM }}</td>
						<td>{{ song.length.substring(3 , 8) }}</td>
						<td>{{ song.type }}</td>

					</tr>
				</tbody>


			</table>



			<table class='col-md-10 row' v-else>

				<thead>
		            <tr>

		                <th class = 'col-md-1'> </th>
		                <th class = 'col-md-5' v-on:click="add_order('name_tw')">歌名</th>
		                <th class = 'col-md-1.5' v-on:click="add_order('BPM')">BPM</th>
		                <th class = 'col-md-1.5' v-on:click="add_order('length')">長度</th>
	                    <th class = 'col-md-1' v-on:click="add_order('type')">類型</th>
	                    <th class = 'col-md-2' v-on:click="add_order('date')">預計實裝日期</th>
		            </tr>
	        	</thead>

				<tbody>
					<tr v-for='song in songs_info' v-if="filter[song['type']] && !(on_tw(song.date))">

						<td><img class="thumbnail" :src="song.image"></td>
						<td><router-link :to="{ name: 'song' , params: { id: song.id }}"><b>{{ song.name_tw }}</b></router-link></td>
						<td>{{ song.BPM }}</td>
						<td>{{ song.length.substring(3 , 8) }}</td>
						<td>{{ song.type }}</td>
						<td>{{ song.date }}</td>

					</tr>					

				</tbody>

			</table>

			<div class='col-md-1'/>

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
    			songs_info: [],
    			order: ['date' , 'ASC'],

    			filter:{
    				'tw': true,
	    			'ALL': true,
	    			'PRINCESS': true,
	    			'FAIRY': true,
	    			'ANGEL': true
    			},

    			date: Date.now(),

			}
        },
        methods:{

        	if_on(flag){

        		if(flag){

        			return 'O'

        		}
        		else{
        			return 'X'
        		}

        		

        	},

    		on_tw(date){

    			var x = new Date(date)

				return x <= this.date;

    		},
    		add_order(add){
    			if (this.order[0] != add){

    				this.order[0] = add;
    				this.order[1] = 'asc';
					
    			}
    			else{

    				if (this.order[1] == 'desc'){

	    				this.order[1] = 'asc';

					}else{

						this.order[1] = 'desc';

					}
    			}
    			this.songs_info = _.orderBy(this.songs_info , this.order[0] , this.order[1])
    		}

        },
        computed:{



        },
        mounted(){

        	axios
        	.get('https://mltw-wiki.online/api/v1/songs')
        	.then(response => (this.songs_info = response.data));
        	this.songs_info = _.orderBy(this.songs_info , 'date');

        }
    }
</script>
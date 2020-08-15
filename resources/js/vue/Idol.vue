<template>




	<div v-if='isMounted'>

        <div style='text-align:center'>
        	<br><br><b>{{ idol.name_tw }}</b></br>
        	<img :src='idol.image' width='280'>
        </div>

	    <hr>

	    <div class = 'row'>
		    <div class = 'col-md-1'/>

		    <table class='col-md-10 row'>

		        <thead>

		            <tr>
		                <th class = 'col-md-1'> </th>
		                <th class = 'col-md-5'>歌名</th>
		                <th class = 'col-md-2'>BPM</th>
		                <th class = 'col-md-2'>長度</th>
		                <th class = 'col-md-2'>類型</th>
		            </tr>

		        </thead>

		        <tbody>

		            <tr v-for='song in songs()'>
		                <td>
		                	<router-link :to="{ name: 'song' , params: { id: song.id }}">
		                		<img class="thumbnail" :src="song.image">
		                	</router-link>
		                </td>
		                <td>
		                	<router-link :to="{ name: 'song' , params: { id: song.id }}"><b>{{ song.name_tw }}</b></router-link>
		                </td>
		                <td>{{ song.BPM }}</td>
		                <td>{{ song.length.substring(3 , 8) }}</td>
		                <td>&nbsp{{ song.type }}&nbsp</td>
		            </tr>

		        </tbody>

		    </table>

		    <div class = 'col-md-1'/>
	    </div>


	    <hr>

	    <div class = 'row'>
	        <div class = 'col-md-1'/>

	        <table class='col-md-10 row'>

	        	<thead>
		            <tr>
		                <th class='col-md-1'>覺醒前</th>
		                <th class='col-md-1'>覺醒後</th>
		                <th class='col-md-6'>卡名</th>
		                <th class='col-md-2'>稀有度</th>
		                <th class='col-md-2'>技能分類</th>
		            </tr>
				</thead>

				<tbody>
		            <tr v-for='card in cards()'>

		                <td><router-link :to="{ name: 'card' , params: { id: card.id }}">
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
		                <td>{{ card.skill_type.name_tw }}</td>

					</tr>
	       		</tbody>

	        </table>

	        <div class = 'col-md-1'/>
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
				idol:null,

			}
        },
        methods:{

        	songs(){

        		return this.idol.songs;

        	},
        	cards(){

        		return this.idol.cards;

        	}

        },
        computed:{



        },
        mounted(){

        	axios
        	.get('https://mltw-wiki.online/api/v1/idols/' + this.$route.params.id)
        	.then(response => (this.idol = response.data));

        	this.isMounted = true;

        }
    }
</script>
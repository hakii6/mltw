<template>
	<div>


		<div class='row'>

			<div class='col-md-1'/>

			<table class='col-md-10 row'>

				<thead>
		            <tr>

		                <th> </th>
		                <th>歌名</a></th>
		                <th>總位移</th>
		                <th>最高下落速度</th>
		                <th>最低下落速度</th>
		                <th>箭頭總數</th>
		                <th>箭頭向左</th>
		                <th>箭頭向上</th>
		                <th>箭頭向左</th>
		                <th>共同線</th>
		                <th>長條</th>
		                <th>小圈</th>
		                <th>大圈</th>
		                <th>超大型圈圈</th>
		                <th>總連打數</th>
		                <th>最長連打</th>

		            </tr>
	        	</thead>

	        	<tbody>
					<tr v-for='song in songs_info'>

						<td><img class="thumbnail" :src="song.image"></td>
						<td><router-link :to="{ name: 'song' , params: { id: song.id }}"><b>{{ song.name_tw }}</b></router-link></td>
						<td>{{ song.move }}</td>
						<td>{{ song.speed_max }}</td>
						<td>{{ song.speed_min }}</td>
						<td>{{ song.flick_total }}</td>
						<td>{{ song.flick_left }}</td>
						<td>{{ song.flick_up }}</td>
						<td>{{ song.flick_right }}</td>
						<td>{{ song.line }}</td>
						<td>{{ song.sliders }}</td>
						<td>{{ song.circle_small }}</td>
						<td>{{ song.circle_big }}</td>
						<td>{{ song.circle_huge }}</td>
						<td>{{ song.stream_total }}</td>
						<td>{{ song.stream_max }}</td>

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

    			date: Date.now(),

			}
        },
        methods:{

        },
        computed:{



        },
        mounted(){

        	axios
        	.get('https://mltw-wiki.online/api/v1/songs/info')
        	.then(response => (this.songs_info = response.data));

        }
    }
</script>
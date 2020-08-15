<template>
	<div>

		<div class = 'row'>

		    <div class ='col-sm-6'>
		        <br/>
		        <div><img src='' width ='450'></div>
		    </div>

		    <div class = 'col-sm-6'>
		        <div class='_table'>
		            <div class="_tr">
		                <div class="_td status_box">曲名</div>
		                <div class="_td">&nbsp{{ song.name_tw }}</div>
		            </div>

		            <hr class='space'>

		            <div class="_tr">
		                <div class="_td status_box">類型</div>
		                <div class="_td">&nbsp{{ song.type }}</div>
		            </div>

		            <hr class='space'>

		            <div class="_tr">
		                <div class="_td status_box">BPM</div>
		                <div class="_td">&nbsp{{ song.BPM }}</div>
		            </div>

		            <hr class='space'>

		            <div class="_tr">
		                <div class="_td status_box">長度</div>
		                <div class="_td">&nbsp{{ song.length }}</div>
		            </div>

		            <hr class='space'>

		            <div class="_tr">
		                <div class="_td status_box">實裝日期</div>
		                <div class="_td">&nbsp{{ song.date }}</div>
		            </div>

		            <hr class='space'>

		            <div class="_tr">
		                <div class="_td status_box">日版曲名</div>
		                <div class="_td"><a :href="'http://imasml-theater-wiki.gamerch.com/' + song.name_jp">&nbsp{{ song.name_jp }}</a></div>
		            </div>

		        </div>
		    </div>
		</div>

		<hr>

		<table style='border: 0px solid;'>
		    <tr>
		        <th class='toumei_list'></th>
		        <th class='toumei'>2M</th>
		        <th class='toumei'>2M+</th>
		        <th class='toumei'>4M</th>
		        <th class='toumei'>6M</th>
		        <th class='toumei'>MM</th>
		    </tr>

		    <tr>

		        <td class='toumei_list'>難度</td>
		        <td class='toumei'>{{ song.EZ_LV }}</td>
		        <td class='toumei'>{{ song.HR2_LV}}</td>
		        <td class='toumei'>{{ song.NM_LV }}</td>
		        <td class='toumei'>{{ song.HR_LV }}</td>
		        <td class='toumei'>{{ song.EX_LV }}</td>

		    </tr>

		    <tr>

		        <td class='toumei_list'>notes</td>
		        <td class='toumei'>{{ song.EZ_notes }}</td>
		        <td class='toumei'>{{ song.HR2_notes}}</td>
		        <td class='toumei'>{{ song.NM_notes }}</td>
		        <td class='toumei'>{{ song.HR_notes }}</td>
		        <td class='toumei'>{{ song.EX_notes }}</td>

		    </tr>

		    <tr>

		        <td class='toumei_list'>圖譜</td>
		        <td class='toumei'><a :href="song.map">2M</a></td>
		        <td class='toumei'><a :href="song.map.HR2">2M+</a></td>
		        <td class='toumei'><a :href="song.map.NM">4M</a></td>
		        <td class='toumei'><a :href="song.map.HR">6M</a></td>
		        <td class='toumei'><a :href="song.map.EX">MM</a></td>

		    </tr>
		</table>

		<div class = 'row'>


		</div>

	</div>

</template>

<script>
import axios from 'axios'
    export default {
    	props:{

    	},
        components: {
        },
        data(){
    		return{

    			song: null,


			}
        },
        methods:{



        },
        mounted(){

        	axios
        	.get('https://mltw-wiki.online/api/v1/songs/' + this.$route.params.id)
        	.then(response => (this.song = response.data));

        }
    }
</script>
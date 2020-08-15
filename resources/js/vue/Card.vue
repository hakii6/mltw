<template>
	<div v-if='isMounted'>

		<div class='row'>

		    <div class='col-md-2'></div>
		    <img :src='card.imageA' class = 'col-md-3'>
		    <div class='col-md-2'></div>
		    <img :src='card.imageB' class = 'col-md-3'>
		    <div class='col-md-2'></div>

		</div>

		<br>
		<br>

		<div class = 'row'>

		    <div class ='col-sm-6'>
<!-- 		        <div><img id='data_image' width ='450'></div>
 -->		    </div>

		    <div class="_table col-sm-6" >
		    <div class="_tr">
		        <div class="_td status_box">卡名</div>
		        <div class="_td">&nbsp{{ card.name_tw }}（＋）</div>
		    </div>

		    <hr class='space'>
		    <div class="_tr">
		        <div class="_td status_box">日版卡名</div>
		        <div class="_td">&nbsp{{ card.name_jp }}（＋）</div>
		    </div>

		    <hr class='space'>
		    <div class="_tr">
		        <div class="_td status_box">偶像</div>
		        <div class="_td">&nbsp{{ card.idol_name_tw }}</div>
		    </div>

		    <hr class='space'>
		    <div class="_tr">
		        <div class="_td status_box">稀有度</div>
		        <div class="_td">&nbsp{{ card.rarity }}（＋）</div>
		    </div>

		    <hr class='space'>
		    </div>

		</div>

		<hr>



		<div class="_table" v-if="card.rarity != 'N'">
			<div class="_tr">
			    <div class="_td status_box">Center效果</div>
			    <div class="_td">&nbsp{{ card.center_skill['content_' + card.rarity] }}</div>
			</div>

			<hr class='space'>
			<div class="_tr">
			    <div class="_td status_box">技能</div>
			    <div class="_td">&nbsp{{ skill(card.skill , card.skill_type) }}</div>
			</div>

			<hr class='space'>
			<div class="_tr">
			    <div class="_td status_box">技能分類</div>
			    <div class="_td">&nbsp{{ card.skill_type.name_tw }}</div>
			</div>

			<hr class='space'>
		</div>

		<hr>


		<table style='border: 0px solid;'>
		    <tr>
		        <th class='toumei_list2'></th>
		        <th class='toumei2'>0</th>
		        <th class='toumei2'>1</th>
		        <th class='toumei2'>2</th>
		        <th class='toumei2'>3</th>
		        <th class='toumei2'>4</th>
		    </tr>

		    <tr v-for=''>

		        <td class='toumei_list2'>歌唱力</td>
		        <td class='toumei2' v-for='vo in vocal'>{{ vo }}</td>

		    </tr>

		    <tr>

		        <td class='toumei_list2'>舞蹈力</td>
		        <td class='toumei2' v-for='da in dance'>{{ da }}</td>

		    </tr>

		    <tr>

		        <td class='toumei_list2'>視覺力</td>
		        <td class='toumei2' v-for='vi in visual'>{{ vi }}</td>


		    </tr>

		    <tr>

		        <td class='toumei_list2'>合計值</td>
		        <td class='toumei2' v-for='to in total' style='font-weight:bold;'>{{ to }}</td>

		    </tr>
		</table>






		<hr>

		<p>
			<span class="status_box">入手方法</span>

			<span v-if='card.rarity == "N" || card.rarity == "R"'>

				<span v-if='card.rarity == "N"'>&nbsp進行演唱會與工作時，有機率掉落</span>
				<span v-else>&nbsp１．進行演唱會與工作時，有機率掉落<br>２．白金轉蛋<br></span>

			</span>

			<span v-else>

				<span v-if='card.limited == "PST"'>
					<b style='color:blue;'><!-- &nbsp{{card.get_card.name_tw}} --></b>　活動報酬卡片　或者等待半年後開放以 PST 石兌換
				</span>

				<span v-if='card.limited == "常駐"'>&nbsp白金轉蛋</span>

				<span v-if='card.limited == "FES限定"'>
					<b style='color:red;'>&nbsp百萬祭典轉蛋</b>（FES轉蛋）限定取得
				</span>

				<span v-if='card.limited == "期間限定"'>
					<b style='color:red;'><!-- &nbsp{{card.get_card.name_tw}} --></b>限定取得　或者等待半年後限定復刻
				</span>
			</span>

		</p>

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
    			card: '',

    			vo_add:0,
    			da_add:0,
    			vi_add:0,
    			to_add:0,

			}
        },
        methods:{

        	skill(skill_code , skill_type){
        		console.log(this.card.rarity);
        		
    			var skill_content = skill_type['content_' + this.card.rarity];


				var value = [];
				var temp = '';

				while(skill_code.indexOf('x') != -1){

				    temp = skill_code.substring(0 , skill_code.indexOf('x'));
				    value.push(temp);
				    skill_code = skill_code.substring(skill_code.indexOf('x') + 1 , skill_code.length);

				}
				value.push(skill_code);


		        var mark = 'X';
		        var i = 0;
		        var index = '';
		        temp = i.toString();
		        index = mark + temp;
		        while(skill_content.indexOf(index) != -1){

		            skill_content = skill_content.replace(index , value[i]);
		            

		            i = i + 1;
		            temp = i.toString();
		            index = mark + temp;


			    }

			    return skill_content;


        	},


        },
        computed:{

        	vocal(){
        		var vocal =[];
				this.vo_add = Math.round(this.card.vocal * 0.03);

				for (var i = 0; i <= 4; i++) {

					vocal.push(this.card.vocal + this.vo_add * i);
					this.total[i] = this.total[i] + vocal[i];

				}

				return vocal;   		

        	},
        	dance(){

        		var dance =[];
				this.da_add = Math.round(this.card.dance * 0.03);

				for (var i = 0; i <= 4; i++) {

					dance.push(this.card.dance + this.da_add * i);

				}

				return dance;  


        	},
        	visual(){

        		var visual =[];
				this.vi_add = Math.round(this.card.visual * 0.03);

				for (var i = 0; i <= 4; i++) {

					visual.push(this.card.visual + this.vi_add * i);

				}

				return visual;  


        	},total(){

        		var total = [];
        		this.to_add = Math.round(this.card.vocal * 0.03) + Math.round(this.card.dance * 0.03) + Math.round(this.card.visual * 0.03);

				for (var i = 0; i <= 4; i++) {

					total.push(this.card.total + this.to_add * i);

				}

				return total;


        	}



        },
        mounted(){

			axios
			.get('https://mltw-wiki.online/api/v1/cards/' + this.$route.params.id)
			.then(response => (this.card = response.data ));
			this.isMounted = true;
			console.log(this.isMounted);





        }
    }
</script>
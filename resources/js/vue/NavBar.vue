<template>
	<div>
        <nav class='navbar navbar-default menu'>
            <div class='container-fluid'>
                <div class="navbar-header">
                <a class="navbar-brand">
                	<router-link style = 'color:#FFF8DC;' :to="{ name:'home' }"><big>製作人企劃書</big> <small>by 蛤蛤</small>
                	</router-link>
                </a>
                </div>
                <ul class='nav navbar-nav'>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'events' }">活動</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'gachas' }">轉蛋</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'idols' }">偶像</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'songs' }">歌曲</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'cards' }">卡片</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'datas' }">詳細資料</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'calculators' }">各式計算機</router-link></li>
                    <li><router-link style = 'color:#FFF8DC;' :to="{ name:'about' }">關於本站</router-link></li>
                </ul>
            </div>
        </nav>
	</div>
</template>

<script>

    export default {}
</script>
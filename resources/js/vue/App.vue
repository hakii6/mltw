<template>
    <div class='container'>

        <NavBar/>

        <div class="content">
            <div>網站大更新中 會有問題很正常的 稍等一下</div>

            <router-view></router-view>
            
        </div>
    </div>
</template>

<script>
    import NavBar from './NavBar.vue'

    export default {
        components: {
            'NavBar': NavBar,
        },
    }
</script>
<template>

    <div class='row'>

        <div class = 'col-sm-1'></div>

        <div class = 'col-sm-3' style='text-align: center; font-size:24px;'>
            <br/>
            <a :href='"https://www.youtube.com/channel/" + play.channel '>{{ play.author }}</a>
            <br/>
            <br/>
            <span>{{ play.type }}</span>
            <br/>
            <span>{{ play.diff }}</span>
            <br/>
            <span>{{ play.acc }}%</span>
            <br/>

        </div>

        <div class = 'col-sm-7'>
            <iframe width="560" height="315"
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""
            :src="'https://www.youtube.com/embed/' + play.video "></iframe>
        </div>

        <div class = 'col-sm-1'></div>
    </div>
    
</template>

<script>

    export default {

    props:{
        play:{
        }
    },
    data(){
    return{


    };

    },
    computed:{



    },
    methods:{

    },
    mounted() {
    console.log('papara');
    }
    }

</script>

<template>

    <div>
        
        <div style="text-align:center; font-size:30px;font-weight:bold;">手元展示</div><br/>
            
        <div v-if="plays" v-for="play in JSON.parse(plays)" >
            <song_play :play="play"></song_play>
        </div>
        <br/><br/>
            
        <div class='row' style="font-size:30px;font-weight:bold;">
            <br/>
            <div class='col-sm-1'/>
            
            <div class='col-sm-8'>
            只要有 AP 手元，人人都可以上傳影片 ＞＞＞＞＞
            </div>
            
            <div class='col-sm-2'>
                <a
                class="btn btn-primary" data-toggle="collapse" href="#song_upload" role="button" aria-expanded="false" aria-controls="song_upload"
                style="font-size:30px;font-weight:bold;">
                上傳影片
                </a>

            </div>
            
            <div class='col-sm-1'/>
        </div>

        <div id='song_upload' class='row collapse' style="text-align:left;">
            <song_upload></song_upload>
        </div>
    </div>

    
</template>

<script>
    import song_upload from './song_upload.vue'
    import song_play from './song_play.vue'

    export default {
        components: {
            'song_upload': song_upload,
            'song_play': song_play,
        },
        props:{
            song:{
                type: Object,
            } ,
            plays:{
            },

        },
        data(){
            return{


            };

        },
        computed:{



        },
        methods:{
            card_url(card){


            },


        },
        mounted() {
            console.log(this.song);
        }
    }

</script>

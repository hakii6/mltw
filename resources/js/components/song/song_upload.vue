<template>
    
    <div class='row'>
        <br/>
        <div class='col-sm-1'/>
        <div class='col-sm-3'>上傳須知：<br/>１．手元限定<br/>２．目前只開放 AP 影片<br/>３．請不要上傳別人的影片</div>
        <div class='col-sm-7'>

            <form @submit.prevent="onSubmit">
                <label for='author'>頻道</label><br/>
                <input type='text' id='author' v-model='author' placeholder="https://www.youtube.com/channel/XXXXXXXXX" ></input><br/>

                <label for='video'>影片</label><br/>
                <input type='text' id='video' v-model='video' placeholder="https://www.youtube.com/watch?v=XXXXXXXX"></input> <br/>               
                <label for='type'>玩法</label><br/>
                <select
                id="type"
                v-model="type"
                name="type"
                >
                    <option>雙指</option>
                    <option>拇指</option>
                    <option>多指</option>
                    <option>特殊</option>
                </select><br/>

                <label for='des'>其他說明(選填)</label><br/>
                <input type='text' id='des' v-model='des' placeholder=""></input><br/>

                <input type="submit" value="上傳"/> <br/> 

            </form>

        </div>
        <div class='col-sm-1'/>
    </div>


    
</template>
<script>

    export default {

        props:{
            id:{
            }
        },

        data(){
            return{

                author: null,
                video: null,
                type: null,
                des: null

            };

        },
        computed:{



        },
        methods:{

            onSubmit (){

                let data = {
                    author: this.author,
                    video: this.video,
                    type: this.type,
                    des: this.des,
                }

                this.author = null
                this.video = null
                this.type = null
                this.des = null
            }

        },
        mounted() {
            
            console.log('papara');
        
        },
    }

</script>

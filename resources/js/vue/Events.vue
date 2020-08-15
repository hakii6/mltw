<template>
	<div v-if='isMounted'>

        <div style ='text-align: right;'>
            <a v-if="filter" href='#' @click.prevent="filter = !(filter) "> >>日版未來視點我 </a>
            <a v-else href='#' @click.prevent="filter = !(filter)"> >>回繁體中文版 </a>

        </div>

        <div v-if='filter'>
            <div v-for='event in events_tw()'>

                <div v-if='date >= new Date(event.start_date)'>
                    <Event :event='event'></Event>
                    <br><br><br><br>
                </div>

            </div>
        </div>

        <div v-else>
            <div v-for='event in events_jp()'>

                <div v-if='date < new Date(event.start_date)'>
                    <Event :event='event'></Event>
                    <br><br><br><br>
                </div>

            </div>
        </div>

	</div>
</template>



<script>
import axios from 'axios'
import Event from './Event.vue'
import _ from "lodash"

    export default {
        components: {
            'Event': Event,
        },
        data(){
    		return{

    			isMounted: false,
    			events: null,
                filter: true,
                date: Date.now(),



			}
        },
        methods:{

            events_jp(){


                return _.orderBy(this.events , 'end_date' , 'asc');;


            },
            events_tw(){

                return _.orderBy(this.events , 'end_date' , 'desc');

            },





        },
        computed:{





        },
        mounted(){

			axios
			.get('https://mltw-wiki.online/api/v1/events')
			.then(response => (this.events = response.data ));
			this.isMounted = true;





        }
    }
</script>
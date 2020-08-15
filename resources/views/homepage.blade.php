@extends('main')
@section('content')

<script>
$(document).ready(function(){

    
    var end_date = new Date({!! json_encode($event->end_date) !!} + "T06:59:59Z");
    var end_event = Math.floor(end_date / 1000);
    var end_date = new Date({!! json_encode($gacha->end_date) !!} + "T06:59:59Z");
    var end_gacha = Math.floor(end_date / 1000);
    var date_stamp = Math.floor(Date.now() / 1000);

    $('#countdown_event').html(time_format(end_event - date_stamp));
    $('#countdown_gacha').html(time_format(end_gacha - date_stamp));
    
    

    var x = setInterval(function(){

        date_stamp = Math.floor(Date.now() / 1000);
        

        $('#countdown_event').html(time_format(end_event - date_stamp));
        $('#countdown_gacha').html(time_format(end_gacha - date_stamp));

    }, 1000)

    var m = $('.limited');
    
    $.each(m , function(i , val){

        if(val.innerHTML == '期間限定'){
            $(this).attr('style' , 'color:red; font-size:18px');
            $(this).html('<b>' + val.innerHTML + '</b>');

        }else if(val.innerHTML == 'FES限定'){
            $(this).attr('style' , 'color:green;');
            $(this).html('<b>' + val.innerHTML + '</b>');


        }else{

            $(this).attr('style' , 'color:grey; font-size:18px');
            $(this).html('<b>常駐</b>');


        }


    });



    var total = $('.gacha').length;
    var i = 0;

    for(i = 0; i < total; ++i){
        $('.gacha')[i].id = i;
        $('.gacha_content')[i].id = i;
        $('.void')[i].id = i;

    }


});

function time_format(res){

    var d = parseInt(res / 86400);
    res = res % 86400;
    var h = parseInt(res / 3600);
    res = res % 3600;
    var m = parseInt(res / 60);
    res = res % 60;
    var s = parseInt(res);
    if (d){
        return '剩餘 ' + d + ' 天 '+ h + ' 小時 ' + m + ' 分 ' + s + ' 秒 ';
    }else if(h){
        return '剩餘 ' + h + ' 小時 ' + m + ' 分 ' + s + ' 秒 ';
    }else{
        return '剩餘 '  + m + ' 分 ' + s + ' 秒 ';
    }


};


</script>

<style>

    .full{
        border-top:5px solid;
        border-left:5px solid;
        border-right:5px solid;
        border-bottom:5px solid;


    }
    .inner{

        border-style: hidden;

        border-collapse: collapse;


    }

    .t2{

        border-top:2px solid #FFB90F;
        border-left:hidden;
        border-right:hidden;
        border-bottom: 2px solid #FFB90F;


    }

    .countdown{

        text-align:center;
        background-color: red;
        color: white;

    }


</style>

<div style='text-align:center; font-size:50px; color:red;'>
<b>網站大更新中，歌曲區域無法正常進入是正常的</b>
</div>


<div style='text-align:center;'>
<b>特別感謝　<a href='https://home.gamer.com.tw/homeindex.php?owner=q7584933'>長谷川翔太(點點)</a>　大大</b>
<br>錄製此謝幕影片<br><br>各位繁中版玩家<br><b>一周年辛苦了~</b><br><br>

<iframe width="1008" height="567" src="https://www.youtube.com/embed/UrmN8vsfx_k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<br>
<hr>


<h1 style='text-align:center;'><b>目前舉行活動</b></h1>
@if($event->end_date >= date('y-m-d h:i:s') && $event->start_date <= date('y-m-d'))
<div class='countdown' id='countdown_event'></div>
<div class='row'>

    <div class='col-md-1'></div>

    <div class='col-md-10 event'>
    
        <table class='full'>

            <tr class='row'>
                <th style='font-size: 20px'class='col-md-12'><b>{{$event -> name_tw}}</b>{{$event -> start_date}} ~ {{$event -> end_date}}</th>
            </tr>

            <tr class='row'>

                <td class='col-md-12' height='200'>
                    <img src='{{App\Event_image::where('event_id' , $event->id)->where('description' , 'main')->firstorfail()->image}}' width ='600'>
                </td>



            </tr>
            @if($event->song)
            <tr class='row'>

                <td colspan = '2' class='col-md-12 event_content'  height='200'>
                    <br>

                
                    @foreach($event->songs as $song)
                    <div class='row'>
                        <div class='col-md-2'></div>
                        <table class='inner col-md-8'>
                            <tr class='row'>

                                <th class ='col-sm-3 t2'><a href = './songs/{{$song->name_tw}}'><img src='{{($song->song_images)[0]->image}}' width='120'></a></th>
                                <th class ='col-sm-5 t2'><a href = './songs/{{$song->name_tw}}'><b>{{$song->name_tw}}</b></a></th>
                        
                                <th class ='col-sm-2 t2'>{{ substr($song->length , 3 , 5) }}</th>
                                <th class ='col-sm-2 t2'>{{ $song->type }}</th>
                            </tr>
                        </table>
                        <div class='col-md-2'></div>
                    </div>
                    @endforeach

                </td>
            </tr>
            @endif
        </table>

    </div>

    <div class='col-md-1'></div>


</div>
@else
<div style='text-align:center;'><b>無</b></div>
@endif
<br>
<br>
<hr>
<br>
<br>



<h1 style='text-align:center;'><b>目前舉行轉蛋</b></h1>

@if( $gacha->end_date >= date('y-m-d h:i:s') && $gacha->start_date <= date('y-m-d'))
<div class='countdown' id='countdown_gacha'></div>

<div class='row'>

    <div class='col-md-12 gacha'>
    
        <table class='full'>

            <tr class='row'>
                <th class ='col-md-6'><b>{{ $gacha -> name_tw }}</b></th>
                <th class ='col-md-6'><b>{{ $gacha -> start_date }} ~ {{ $gacha -> end_date }}</b></th>
            </tr>

            <tr class='row'>

                <td class='col-md-6' height='200'>
                <a class ='void' href='javascript: void(0)' onclick='choose(this.id)'>
                    <img src='{{ app\gacha_image::where('gacha_id' , $gacha->id)->where('description' , 'main')->firstorfail()->image }}' width ='365'>
                </a>
                 </td>

                <td class ='col-md-6'>
                @foreach( $gacha->cards as $card)
                    <a href ='./cards/{{ $card->name_tw }}'>{{ $card->name_tw }}</a></br>
                @endforeach
                </td>

            </tr>

            <tr class='row'>

                <td colspan = '2' class='col-md-12 gacha_content'height='700'>
                    <br>


                    <table class='inner' style='table-layout: fixed;' width='100%'>
                        <tr class='row'>
                            <th class ='col-sm-2 t2'>未覺醒</th>
                            <th class ='col-sm-2 t2'>已覺醒</th>
                            <th class ='col-sm-5 t2'>卡名</th>
                            <th class ='col-sm-1 t2'>稀有度</th>
                            <th class ='col-sm-2 t2'>類型</th>
                        </tr>



                        @foreach( $gacha->cards as $card )
                        <tr class='row'>
                            <td class ='col-sm-2 t2'>
                            <a href='./cards/{{ $card->name_tw }}'>
                            <img src='{{ app\card_image::where('card_id' , $card->id)->where('description' , 'not_awaken')->firstorfail()->image }}' width='110'>
                            </a>
                            </td>

                            <td class ='col-sm-2 t2'>
                            <a href='./cards/{{ $card->name_tw }}'>
                            <img src='{{ app\card_image::where('card_id' , $card->id)->where('description' , 'is_awaken')->firstorfail()->image }}' width='110'>
                            </a>
                            </td>


                            <td class ='col-sm-5 t2'>
                            <a href='./cards/{{ $card->name_tw }}'>{{ $card->name_tw }}</a>
                            </td>

                            <td class ='col-sm-1 t2'>{{ $card->rarity }}</td>
                            <td class ='col-sm-2 limited t2'>{{ $card->limited }}</td>

                        </tr>

                        @endforeach
                    </table>

                    <br><br><br>

                </td>
            </tr>
        </table>
    </div>

</div>

@else
<div style='text-align:center;'><b>無</b></div>
@endif


@stop

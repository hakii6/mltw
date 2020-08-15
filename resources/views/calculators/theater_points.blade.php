@extends('main')
@section('content')

<script>

$(document).ready(function(){

    $('#type1').on('click' , function(){

        $('.type1').show();
        $('.type2').hide();
        $('.type3').hide();
        $('#theater1').on('submit' , function(e){

            e.preventDefault();
            var a = $(this).serializeArray();
            do_type1(a);

        });

    });

    $('#type2').on('click' , function(){

        $('.type1').hide();
        $('.type2').show();
        $('.type3').hide();

        $('#theater2').on('submit' , function(e){

            e.preventDefault();
            var a = $(this).serializeArray();
            do_type2(a);

        });

    });

    $('#type3').on('click' , function(){

        $('.type1').hide();
        $('.type2').hide();
        $('.type3').show();

        $('#theater3').on('submit' , function(e){

            e.preventDefault();
            var a = $(this).serializeArray();
            do_type3(a);

        });

    });

});

function do_type1(a){

    var energy_limit , stones , energy , diff , diff_event , work , minutes , seconds , work_type , minutes2 , seconds2 , minutes3 , seconds3;

    $.each(a , function(i , form){

        switch(form.name){

            case 'energy_limit':
                energy_limit = form.value;
                break;
            case 'stones':
                stones = form.value;
                break;

            case 'work_weight':
                work_weight = form.value / 100;
                break;
            case 'work_type':
                work_type = form.value;
                break;

            case 'energy':
                energy = form.value;
                break;
            case 'diff':
                diff = form.value;
                break;
            case 'diff_event':
                diff_event = form.value;
                break;

            case 'minutes':
                minutes = form.value;
                break;
            case 'seconds':
                seconds = form.value;
                break;
            case 'minutes2':
                minutes2 = form.value;
                break;
            case 'seconds2':
                seconds2 = form.value;
                break;
            case 'minutes3':
                minutes3 = form.value;
                break;
            case 'seconds3':
                seconds3 = form.value;
                break;
        }


    });



    var diff_get , diff_cost;
    switch(diff){

        case 'MM':
            diff_get = 85;
            diff_cost = 30;
            break;
        case '6M':
            diff_get = 64;
            diff_cost = 25;
            break;
        case '2M+':
            diff_get = 62;
            diff_cost = 25;
            break;
        case '4M':
            diff_get = 49;
            diff_cost = 20;
            break;
        case '2M':
            diff_get = 35;
            diff_cost = 15;
            break;

    }

    var time = parseFloat(minutes * 60) + parseFloat(seconds);
    var time2 = parseFloat(minutes2 * 60) + parseFloat(seconds2);
    var time3 = parseFloat(minutes3 * 60) + parseFloat(seconds3);



    var event_cost = get_event_cost(diff_event);







    var total_energy = parseFloat(energy_limit * stones / 50) + parseFloat(energy);
    var energy_at_work = total_energy * work_weight;
    var energy_at_live = total_energy * (1 - work_weight);
        

    var get_items = ( parseFloat(energy_at_work * 0.7) + parseFloat(energy_at_live) ) * diff_get / diff_cost;
    var points_raw = get_items;       //not event live yet

        

    var points_total = parseInt( parseFloat(points_raw) + parseFloat(get_items * 537 / 180) );
    get_items = Math.floor(get_items);


    $('#results').html('總分：' + apart(points_total) );
    $('#items').html('總道具量：' + apart(get_items) );
    $('#work_count').html('工作次數：' + apart( Math.floor(energy_at_work / work_type) ) );
    $('#work_count2').html('工作次數（二倍）：' + apart( Math.floor(energy_at_work / (work_type * 2)) ) );
    $('#work_cost_time').html('工作所耗時間：' + time_format( Math.floor(energy_at_work / work_type) * time ) );
    $('#work_cost_time2').html('工作所耗時間（二倍）：' + time_format( Math.floor(energy_at_work / (work_type * 2)) * time ) );

    $('#live_for_work').html('消卷用演唱會次數：' + apart( Math.floor(energy_at_work / 300) ) );
    $('#live_not_for_work').html('一般演唱會次數（不含消卷用）：' + apart( Math.floor(energy_at_live / diff_cost) ) );
    $('#live_not_for_work2').html('一般演唱會次數（不含消卷用）（二倍）：' + apart( Math.floor(energy_at_live / (diff_cost * 2)) ) );

    $('#live_normal').html('一般演唱會總時間：' + time_format( (Math.floor(energy_at_live / diff_cost) + Math.floor(energy_at_work / 300)) * time2 )   );
    $('#live_normal2').html('一般演唱會總時間（二倍）：' + time_format( (Math.floor(energy_at_live / (diff_cost * 2)) + Math.floor(energy_at_work / 300) ) * time2 )   );

    $('#live_event').html('活動曲次數：' + apart( Math.floor(get_items / event_cost) ) );
    $('#live_event2').html('活動曲次數（二倍）：' + apart( Math.floor(get_items / (event_cost * 2)) ) );
    $('#live_event4').html('活動曲次數（四倍）：' + apart( Math.floor(get_items / (event_cost * 4)) ) );

    $('#live_time_event').html('活動曲總消耗時間：' + time_format( Math.floor(get_items / event_cost) * time3 ) );
    $('#live_time_event2').html('活動曲總消耗時間（二倍）：' + time_format( Math.floor(get_items / (event_cost * 2)) * time3) );
    $('#live_time_event4').html('活動曲總消耗時間（四倍）：' + time_format( Math.floor(get_items / (event_cost * 4)) * time3) );


}

function do_type2(a){

    var energy_limit , score , diff , diff_event , work , minutes , seconds , work_type , minutes2 , seconds2 , minutes3 , seconds3;
    $.each(a , function(i , form){

        switch(form.name){

            case 'energy_limit':
                energy_limit = form.value;
                break;
            case 'score':
                score = form.value;
                break;

            case 'work_weight':
                work_weight = form.value / 100;
                break;
            case 'work_type':
                work_type = form.value;
                break;

            case 'energy':
                energy = form.value;
                break;
            case 'diff':
                diff = form.value;
                break;
            case 'diff_event':
                diff_event = form.value;
                break;

            case 'minutes':
                minutes = form.value;
                break;
            case 'seconds':
                seconds = form.value;
                break;
            case 'minutes2':
                minutes2 = form.value;
                break;
            case 'seconds2':
                seconds2 = form.value;
                break;
            case 'minutes3':
                minutes3 = form.value;
                break;
            case 'seconds3':
                seconds3 = form.value;
                break;
        }


    });



    var diff_get , diff_cost;
    switch(diff){

        case 'MM':
            diff_get = 85;
            diff_cost = 30;
            break;
        case '6M':
            diff_get = 64;
            diff_cost = 25;
            break;
        case '2M+':
            diff_get = 62;
            diff_cost = 25;
            break;
        case '4M':
            diff_get = 49;
            diff_cost = 20;
            break;
        case '2M':
            diff_get = 35;
            diff_cost = 15;
            break;

    }


    var time = parseFloat(minutes * 60) + parseFloat(seconds);
    var time2 = parseFloat(minutes2 * 60) + parseFloat(seconds2);
    var time3 = parseFloat(minutes3 * 60) + parseFloat(seconds3);



    var event_cost = get_event_cost(diff_event);



    var get_items = score  / 717 * 180;
    var energy_weight = get_items / diff_get * diff_cost;
    var total_energy = energy_weight / (1 - parseFloat(work_weight * 0.3));

    var energy_at_work = total_energy * work_weight;
    var energy_at_live = total_energy * (1 - parseFloat(work_weight));
    var stones = Math.floor(total_energy  / energy_limit);
    stones = stones * 50;

    get_items = Math.floor(get_items);




    $('#results2').html('總消耗體力：' + apart( Math.floor(total_energy)) );
    $('#results3').html('相當於吃了 ' + apart(     stones    ) + ' 顆石頭');
    $('#itemsX').html('總道具量：' + apart(get_items) );



    $('#work_countX').html('工作次數：' + apart( Math.floor(energy_at_work / work_type) ) );
    $('#work_count2X').html('工作次數（二倍）：' + apart( Math.floor(energy_at_work / (work_type * 2)) ) );
    $('#work_cost_timeX').html('工作所耗時間：' + time_format( Math.floor(energy_at_work / work_type) * time ) );
    $('#work_cost_time2X').html('工作所耗時間（二倍）：' + time_format( Math.floor(energy_at_work / (work_type * 2)) * time ) );

    $('#live_for_workX').html('消卷用演唱會次數：' + apart( Math.floor(energy_at_work / 300) ) );
    $('#live_not_for_workX').html('一般演唱會次數（不含消卷用）：' + apart( Math.floor(energy_at_live / diff_cost) ) );
    $('#live_not_for_work2X').html('一般演唱會次數（不含消卷用）（二倍）：' + apart( Math.floor(energy_at_live / (diff_cost * 2)) ) );

    $('#live_normalX').html('一般演唱會總時間：' + time_format( (Math.floor(energy_at_live / diff_cost) + Math.floor(energy_at_work / 300)) * time2 )   );
    $('#live_normal2X').html('一般演唱會總時間（二倍）：' + time_format( (Math.floor(energy_at_live / (diff_cost * 2)) + Math.floor(energy_at_work / 300) ) * time2 )   );

    $('#live_eventX').html('活動曲次數：' + apart( Math.floor(get_items / event_cost) ) );
    $('#live_event2X').html('活動曲次數（二倍）：' + apart( Math.floor(get_items / (event_cost * 2)) ) );
    $('#live_event4X').html('活動曲次數（四倍）：' + apart( Math.floor(get_items / (event_cost * 4)) ) );

    $('#live_time_eventX').html('活動曲總消耗時間：' + time_format( Math.floor(get_items / event_cost) * time3 ) );
    $('#live_time_event2X').html('活動曲總消耗時間（二倍）：' + time_format( Math.floor(get_items / (event_cost * 2)) * time3) );
    $('#live_time_event4X').html('活動曲總消耗時間（四倍）：' + time_format( Math.floor(get_items / (event_cost * 4)) * time3) );

}


function do_type3(a){

    var energy_limit , target_score , items_now , points_now;
    var diff , diff_event , work;
    $.each(a , function(i , form){

        switch(form.name){

            case 'target_score':
                target_score = parseInt(form.value);
                break;
            case 'items_now':
                items_now = parseInt(form.value);
                break;

            case 'points_now':
                points_now = parseInt(form.value);
                break;

        }

        var points_needed = parseInt(target_score) - parseInt(points_now);

        if(points_needed < 0){
            $('#res').html('分數輸入有誤');
            return;

        }else if(points_needed > 2000){

            $('#res').html('請壓到 2000 ~ 300 之間');
            return;

        }

        var A , B , C , D , E;
        var total;
        for (A = 20 ; A >= 0; --A){
            for (B = 20 ; B >= 0; --B){
                for (C = 20 ; C >= 0; --C){
                    for (D = 20 ; D >= 0; --D){
                        for (E = 20 ; E >= 0; --E){

                            total = 85 * A + 64 * B + 62 * C + 49 * D + 35 * E;
                            if(points_needed == total){

                                $('#MM').html(A.toString() + ' 場　一般曲 MM <br>');
                                $('#6M').html(B.toString() + ' 場　一般曲 6M <br>');
                                $('#6M2').html(C.toString() + ' 場　一般曲 2M+ <br>');
                                $('#4M').html(D.toString() + ' 場　一般曲 4M <br>');
                                $('#2M').html(E.toString() + ' 場　一般曲 2M <br>');

                                return;
                            }
                        }
                    }
                }
            }
        }

        $('#MM').html('本計算機目前幫不了你的分數差 拍謝');

    });








}

function get_event_cost(diff_event){

    switch (diff_event){

        case 'MM':
            return 180;

        case '6M':
            return 150;

        case '2M+':
            return 150;

        case '4M':
            return 120;

        case '2M':
            return 90;

        }

}

function apart(number){

    var number_string = number.toString();

    if (number_string == '0'){

        return '0';

    }

    var result = '';
    var flag = false;
    while (number_string.length > 3){
        flag = true;
        if(result == ''){

            result = number_string.slice(number_string.length - 3 , number_string.length);

        }else{

            result = number_string.slice(number_string.length - 3 , number_string.length) + ',' + result;

        }

        number_string = number_string.slice(0 , number_string.length - 3);

    }

    if(number_string.length > 0 && flag){

        result = number_string.slice(0 , number_string.length) + ',' + result;

    }else if(number_string.length > 0){

        result = number_string.slice(0 , number_string.length);

    }

    return result;

};

function time_format(time){

    var result = '';
    if(time == 0){

        return '0 秒';

    }
    if (time > 3600){

        result = parseInt(time / 3600).toString() + ' 小時';
        if (time % 3600 == 0){

            return result;

        }

    }

    time = time % 3600;
    if (time > 60){

        result = result + ' ' + parseInt(time / 60).toString() + ' 分';
        if (time % 60 == 0){

            return result;

        }

    }
    time = time % 60;
    time = Math.floor(time);
    result = result + ' ' + time.toString() + ' 秒';
    return result;


};

</script>



<div><b>本篇目前未考慮自然回體　建議有打高排名的需要再使用　自然回體部分之後才會補上</b></div>

<button class='btn-primary' style='font-size:25px; border-radius:10px; padding:7px;' id='type1'>計算總分</button>
<button class='btn-primary' style='font-size:25px; border-radius:10px; padding:7px;' id='type2'>預測消耗</button>
<button class='btn-primary' style='font-size:25px; border-radius:10px; padding:7px;' id='type3'>控分計算機</button>

<hr>



<div class='type1' style='display:none;'>
    <h1><b>計算總分</b></h1></br>


    <form id="theater1">

        <label>當前活力上限：<input type="number" name='energy_limit' max='240' min='20' value='90'></input></label></br>
        <label>預計投入石頭：<input type="number" name='stones' max='1000000' min='0' value='0'></input></label></br>
        <label>預計投入體力水(總體力)：<input type="number" name='energy' max='10000' min='0' value='0'></input></label></br>
        <label>請輸入工作所占比例(%)：<input type="number" name='work_weight' max='100' min='0' value='100'></input></label></br></brz>

        <div><b>難度與工作</b></br>
            <label>一般曲：
            <select name='diff'>
                <option value="MM">MM</option>
                <option value="6M">6M</option>
                <option value="2M+">2M+</option>
                <option value="4M">4M</option>
                <option value="2M">2M</option>
            </select>
            </label>

            <label>活動曲：
            <select name='diff_event'>
                <option value="MM">MM</option>
                <option value="6M">6M</option>
                <option value="2M+">2M+</option>
                <option value="4M">4M</option>
                <option value="2M">2M</option>
            </select>
            </label>
            <label>工作：
            <select name='work_type'>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            </label>

        </div>
        </br>


        <label>預計一次工作的時間：</br>
            <input type="number" name='minutes' max='59' min='0' value='0'></input>：<input type="number" name='seconds' max='59' min='10' value='10'></input>
        </label></br></br>

        <label>平均一次演唱會的時間：</br>
            <input type="number" name='minutes2' max='59' min='0' value='2'></input>：<input type="number" name='seconds2' max='59' min='0' value='40'></input>
        </label></br></br>

        <label>活動曲一場時間（請包含loading時間）：</br>
            <input type="number" name='minutes3' max='59' min='0' value='2'></input>：<input type="number" name='seconds3' max='59' min='10' value='40'></input>
        </label>

        </br></br></br><label><input type="submit" value='確認'></input></label>



    </form>

    <hr>
    <h1><b>結果</b></h1>
    <div id='results'></div></br>
    <div id='items'></div></br>
    </br>
    </br>


    <div id='work_count'></div>
    <div id='work_count2'></div></br>
    <div id='work_cost_time'></div>
    <div id='work_cost_time2'></div></br>

    <div id='live_for_work'></div>
    <div id='live_not_for_work'></div>
    <div id='live_not_for_work2'></div>
    <div id='live_not_for_work4'></div></br>

    <div id='live_normal'></div>
    <div id='live_normal2'></div></br>

    <div id='live_event'></div>
    <div id='live_event2'></div>
    <div id='live_event4'></div></br>

    <div id='live_time_event'></div>
    <div id='live_time_event2'></div>
    <div id='live_time_event4'></div></br>

</div>




<div class='type2' style='display:none;'>

    <h1><b>預測消耗</b></h1></br>

    <form id="theater2">

        <label>當前活力上限：<input type="number" name='energy_limit' max='240' min='20' value='90'></input></label></br>
        <label>想打的分數：<input type="number" name='score' max='20000000' min='0' value='50000'></input></label></br>
        <label>請輸入工作所占比例(%)：<input type="number" name='work_weight' max='100' min='0' value='100'></input></label></br></brz>

        <div><b>難度與工作</b></br>
            <label>一般曲：
            <select name='diff'>
                <option value="MM">MM</option>
                <option value="6M">6M</option>
                <option value="2M+">2M+</option>
                <option value="4M">4M</option>
                <option value="2M">2M</option>
            </select>
            </label>

            <label>活動曲：
            <select name='diff_event'>
                <option value="MM">MM</option>
                <option value="6M">6M</option>
                <option value="2M+">2M+</option>
                <option value="4M">4M</option>
                <option value="2M">2M</option>
            </select>
            </label>
            <label>工作：
            <select name='work_type'>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            </label>

        </div>
        </br>


        <label>預計一次工作的時間：</br>
            <input type="number" name='minutes' max='59' min='0' value='0'></input>：<input type="number" name='seconds' max='59' min='10' value='10'></input>
        </label></br></br>

        <label>平均一次演唱會的時間：</br>
            <input type="number" name='minutes2' max='59' min='0' value='2'></input>：<input type="number" name='seconds2' max='59' min='0' value='40'></input>
        </label></br></br>

        <label>活動曲一場時間（請包含loading時間）：</br>
            <input type="number" name='minutes3' max='59' min='0' value='2'></input>：<input type="number" name='seconds3' max='59' min='10' value='40'></input>
        </label>

        </br></br></br><label><input type="submit" value='確認'></input></label>



    </form>


    <hr>
    <h1><b>結果</b></h1>
    <div id='results2'></div>
    <div id='results3'></div></br>
    <div id='itemsX'></div></br>

    <div id='work_countX'></div>
    <div id='work_count2X'></div></br>
    <div id='work_cost_timeX'></div>
    <div id='work_cost_time2X'></div></br>

    <div id='live_for_workX'></div>
    <div id='live_not_for_workX'></div>
    <div id='live_not_for_work2X'></div>
    <div id='live_not_for_work4X'></div></br>

    <div id='live_normalX'></div>
    <div id='live_normal2X'></div></br>

    <div id='live_eventX'></div>
    <div id='live_event2X'></div>
    <div id='live_event4X'></div></br>

    <div id='live_time_eventX'></div>
    <div id='live_time_event2X'></div>
    <div id='live_time_event4X'></div></br>
</div>




<div class='type3' style='display:none;'>


    <h3 style='color: red;'><b>若修改數字 請務必重新按一次確認<br><br></b></h3>


    <h1><b>控分計算機</b></h1></br>
    <h4><b>使用前請先把分數差拉到 2000 ~ 300 內（低於 300 有可能會失敗）</b></h4>
    <h4>其實可以控在800~300內是最好 但小心打超過</h4></br>

    <form id="theater3">

        <label>當前分數：<input type="number" name='points_now' max='10000000' min='0' value='0'></input></label></br>
        <label>想打的分數：<input type="number" name='target_score' max='20000000' min='0' value='50000'></input></label></br>

        </br></br></br><label><input type="submit" value='確認'></input></label>



    </form>
    <hr>
    <div><b>使用以下結果前 建議自行驗算一次確認結果相符</b></div><br>

    <div id='MM'></div>
    <div id='6M'></div>
    <div id='6M2'></div>
    <div id='4M'></div>
    <div id='2M'></div>

</div>
@stop

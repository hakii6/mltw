@extends('main')
@section('content')


<script>

$(document).ready(function(){

    $('#type1').on('click' , function(){

        $('.type1').show();
        $('.type2').hide();
        $('#anniversary').hide();
        $('#tour1').on('submit' , function(e){

            e.preventDefault();
            var a = $(this).serializeArray();
            do_type1(a);

        });

    });

    $('#type2').on('click' , function(){

        $('.type1').hide();
        $('.type2').show();
        $('#anniversary').hide();
        $('#tour2').on('submit' , function(e){

            e.preventDefault();
            var a = $(this).serializeArray();
            do_type2(a);

        });

    });

    $('#anniversary').on('click' , function(){

        $('.type1').hide();
        $('.type2').hide();
        $('#anniversary').show();
        $('#anniversary').on('submit' , function(e){

            e.preventDefault();
            var a = $(this).serializeArray();
            do_anniversary(a);

        });

    });

});

function do_type1(a){

    var energy_limit , stones , energy , diff , work_weight , minutes , seconds , minutes2 , seconds2 , minutes3 , seconds3;

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
            case 'energy':
                energy = form.value;
                break;
            case 'diff':
                diff = form.value;
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

    var cost = set_cost(diff);
    var time = minutes * 60 + parseInt(seconds);
    var time2 = minutes2 * 60 + parseInt(seconds2);
    var time3 = minutes3 * 60 + parseInt(seconds3);



    var total_energy = parseFloat(energy_limit * stones / 50) + parseFloat(energy);
    var energy_at_work = work_weight * total_energy;
    var energy_at_live = (1 - work_weight) * total_energy;
    var progress = total_energy / 5 ;
    var items = parseInt(progress / 20);
    var points_event = parseInt(items * 720);
    var points_normal = parseFloat(energy_at_work * 1.6) + parseFloat(energy_at_live * 140 / 30);
    points_normal = Math.ceil(points_normal);



    $('#results').html( '總分：' + apart(points_event + points_normal) );
    $('#items').html( '道具總量：' + apart(items) );
    $('#work_count').html(
    '工作次數：' + apart(Math.floor(energy_at_work / cost) )
    );
    $('#work_count2').html(
    '工作次數（二倍）：' + apart(Math.floor(energy_at_work / (cost * 2)) )
    );
    $('#work_time').html(
    '工作時間：' + time_format( (energy_at_work / cost) * time )
    );
    $('#work_time2').html(
    '工作時間（二倍）：' + time_format( (energy_at_work / (cost * 2)) * time)
    );

    $('#live_normal_counts').html(
    '一般演唱會次數：' + apart( Math.floor(energy_at_live / cost) )
    );
    $('#live_normal_counts2').html( '一般演唱會次數（二倍）：' + apart( Math.floor(energy_at_live / (cost * 2)) ) );
    $('#live_normal_time').html( '一般演唱會時間：' + time_format( (energy_at_live / cost) * time2 ) );
    $('#live_normal_time2').html( '一般演唱會時間（二倍）：' + time_format( (energy_at_live / (cost * 2)) *time2 ) );

    $('#live_event_counts2').html( '活動演唱會次數（二倍）：' + apart( Math.floor(items / 2) ) );
    $('#live_event_counts3').html( '活動演唱會次數（三倍）：' + apart( Math.floor(items / 3) ) );
    $('#live_event_time2').html( '活動演唱會時間（二倍）：' + time_format( (items / 2) * time3 ) );
    $('#live_event_time3').html( '活動演唱會時間（三倍）：' + time_format( (items / 3) * time3 ) );


}

function do_type2(a){

    var energy_limit , score , diff , work_weight;
    var minutes , seconds , minutes2 , seconds2 , minutes3 , seconds3;

    $.each(a , function(i , form){

        switch(form.name){

            case 'energy_limit':
                energy_limit = form.value;
                break;
            case 'work_weight':
                work_weight = form.value / 100;
                break;
            case 'score':
                score = form.value;
                break;
            case 'diff':
                diff = form.value;
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

    var cost = set_cost(diff);
    var time = minutes * 60 + parseInt(seconds);
    var time2 = minutes2 * 60 + parseInt(seconds2);
    var time3 = minutes3 * 60 + parseInt(seconds3);



    var total_energy = score / ( (parseFloat(178) - parseFloat(work_weight * 46)) / 15);
    var energy_at_work = work_weight * total_energy;
    var energy_at_live = (1 - work_weight) * total_energy;
    var progress = total_energy / 5 ;
    var items = parseInt(progress / 20);



    $('#results2').html('總消耗體力：' + apart( Math.floor(total_energy)) );
    $('#results3').html('相當於吃了 ' + apart( Math.floor(total_energy / energy_limit) * 50 ) + ' 顆石頭');
    $('#itemsX').html('道具總量：' + apart( items ));
    $('#work_countsX').html(
    '工作次數：' + apart(Math.floor(energy_at_work / cost) )
    );
    $('#work_counts2X').html(
    '工作次數（二倍）：' + apart(Math.floor(energy_at_work / (cost * 2)) )
    );
    $('#work_timeX').html(
    '工作時間：' + time_format( (energy_at_work / cost) * time )
    );
    $('#work_time2X').html(
    '工作時間（二倍）：' + time_format( (energy_at_work / (cost * 2)) * time)
    );

    $('#live_normal_countsX').html(
    '一般演唱會次數：' + apart( Math.floor(energy_at_live / cost) )
    );
    $('#live_normal_counts2X').html( '一般演唱會次數（二倍）：' + apart( Math.floor(energy_at_live / (cost * 2)) ) );
    $('#live_normal_timeX').html( '一般演唱會時間：' + time_format( (energy_at_live / cost) * time2 ) );
    $('#live_normal_time2X').html( '一般演唱會時間（二倍）：' + time_format( (energy_at_live / (cost * 2)) *time2 ) );

    $('#live_event_counts2X').html( '活動演唱會次數（二倍）：' + apart( Math.floor(items / 2) ) );
    $('#live_event_counts3X').html( '活動演唱會次數（三倍）：' + apart( Math.floor(items / 3) ) );
    $('#live_event_time2X').html( '活動演唱會時間（二倍）：' + time_format( (items / 2) * time3 ) );
    $('#live_event_time3X').html( '活動演唱會時間（三倍）：' + time_format( (items / 3) * time3 ) );

}

function set_cost(diff){

    switch (diff){

        case 'MM':
            return 30;

        case '6M':
            return 25;

        case '2M+':
            return 25;

        case '4M':
            return 20;

        case '2M':
            return 15;

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

<div style='color:red; font-size:72px'>先別使用 我修正修正</div>

<div><b>本篇目前未考慮自然回體　建議有打高排名的需要再使用　自然回體部分之後才會補上</b></div>

<button id='type1'>計算總分</button>
<button id='type2'>預測消耗</button>

<hr>



<div class='type1' style='display:none;'>
    <h1><b>計算總分</b></h1></br>


    <form id="tour1">

        <label>當前活力上限：<input type="number" name='energy_limit' max='240' min='20' value='90'></input></label></br>
        <label>預計投入石頭：<input type="number" name='stones' max='1000000' min='0' value='0'></input></label></br>
        <label>預計投入體力水(總體力)：<input type="number" name='energy' max='10000' min='0' value='0'></input></label></br>
        <label>請輸入工作所占比例(%)：<input type="number" name='work_weight' max='100' min='0' value='100'></input></label></br></brz>

        <div><b>難度與工作</b></br>
            <label>一般曲（含工作）：
            <select name='diff'>
                <option value="MM">MM</option>
                <option value="6M">6M</option>
                <option value="2M+">2M+</option>
                <option value="4M">4M</option>
                <option value="2M">2M</option>
            </select>
            </label>

        </div>
        </br>


        <label>預計一次工作的時間：</br>
            <input type="number" name='minutes' max='59' min='0' value='0'></input>：<input type="number" name='seconds' max='59' min='10' value='10'></input>
        </label></br></br>

        <label>平均一次演唱會的時間（一般曲）：</br>
            <input type="number" name='minutes2' max='59' min='0' value='2'></input>：<input type="number" name='seconds2' max='59' min='0' value='40'></input>
        </label></br></br>

        <label>平均一次演唱會的時間（活動曲）：</br>
            <input type="number" name='minutes3' max='59' min='0' value='2'></input>：<input type="number" name='seconds3' max='59' min='10' value='40'></input>
        </label>

        </br></br></br><label><input type="submit" value='確認'></input></label>



    </form>

    <hr>
    <h1><b>結果</b></h1>
    <div id='results'></div>
    <div id='items'></div></br>

    <div id='work_count'></div>
    <div id='work_count2'></div>
    <div id='work_time'></div>
    <div id='work_time2'></div></br>

    <div id='live_normal_counts'></div>
    <div id='live_normal_counts2'></div>
    <div id='live_normal_time'></div>
    <div id='live_normal_time2'></div></br>

    <div id='items'></div>
    <div id='live_event_counts2'></div>
    <div id='live_event_counts3'></div>
    <div id='live_event_time2'></div>
    <div id='live_event_time3'></div></br>


    </br>
    </br>



</div>

<div class='type2' style='display:none;'>
    <h1><b>預測消耗</b></h1></br>


    <form id="tour2">

        <label>當前活力上限：<input type="number" name='energy_limit' max='240' min='20' value='90'></input></label></br>
        <label>想打的分數：<input type="number" name='score' max='20000000' min='0' value='0'></input></label></br>
        <label>工作所占比例(%)：<input type="number" name='work_weight' max='100' min='0' value='100'></input></label></br></brz>

        <div><b>難度與工作</b></br>
            <label>一般曲（含工作）：
            <select name='diff'>
                <option value="MM">MM</option>
                <option value="6M">6M</option>
                <option value="2M+">2M+</option>
                <option value="4M">4M</option>
                <option value="2M">2M</option>
            </select>
            </label>

        </div>
        </br>


        <label>平均一次工作的時間：</br>
            <input type="number" name='minutes' max='59' min='0' value='0'></input>：<input type="number" name='seconds' max='59' min='10' value='10'></input>
        </label></br></br>

        <label>平均一次演唱會的時間（一般曲）：</br>
            <input type="number" name='minutes2' max='59' min='0' value='2'></input>：<input type="number" name='seconds2' max='59' min='0' value='40'></input>
        </label></br></br>

        <label>平均一次演唱會的時間（活動曲）：</br>
            <input type="number" name='minutes3' max='59' min='0' value='2'></input>：<input type="number" name='seconds3' max='59' min='10' value='40'></input>
        </label>

        </br></br></br><label><input type="submit" value='確認'></input></label>



    </form>

    <hr>
    <h1><b>結果</b></h1>
    <div id='results2'></div>
    <div id='results3'></div>
    <div id='itemsX'></div></br>

    <div id='work_countX'></div>
    <div id='work_count2X'></div>
    <div id='work_timeX'></div>
    <div id='work_time2X'></div></br>

    <div id='live_normal_countsX'></div>
    <div id='live_normal_counts2X'></div>
    <div id='live_normal_timeX'></div>
    <div id='live_normal_time2X'></div></br>

    <div id='live_event_counts2X'></div>
    <div id='live_event_counts3X'></div>
    <div id='live_event_time2X'></div>
    <div id='live_event_time3X'></div></br>


    </br>
    </br>



</div>
@stop

@extends('main')
@section('content')

<script>
$(document).ready(function(){
    create_row();

});

function create_row(){
    var row , lv , R , SR , SSR ;
    var table = document.getElementById('SSR');
    var table2 = document.getElementById('SSR2');
    for(var i = 1; i < 10; ++i){

        row = table.insertRow(i);
        lv = row.insertCell(0);
        R = row.insertCell(1);
        SR = row.insertCell(2);
        SSR = row.insertCell(3);
        lv.innerHTML = i.toString() + '->' + (i + 1).toString();
        R.innerHTML = Math.round(3 / (i * 20 + 10) * 10000) / 100;
        SR.innerHTML= Math.round(1 / (i * 2 + 1) * 10000) / 100;
        SSR.innerHTML= Math.round(2 / (i * 2 + 1) * 10000) / 100;

        row = table2.insertRow(i);
        lv = row.insertCell(0);
        R = row.insertCell(1);
        SR = row.insertCell(2);
        SSR = row.insertCell(3);
        lv.innerHTML = i.toString() + '->' + (i + 1).toString();
        R.innerHTML = '3 / ' + (i * 20 + 10).toString();
        SR.innerHTML= '1 / ' + (i * 2 + 1).toString();
        SSR.innerHTML= '2 / ' + (i * 2 + 1).toString();

    }

    var table = document.getElementById('SR');
    var table2 = document.getElementById('SR2');
    for(var i = 1; i < 10; ++i){

        row = table.insertRow(i);
        lv = row.insertCell(0);
        R = row.insertCell(1);
        SR = row.insertCell(2);
        SSR = row.insertCell(3);
        lv.innerHTML = i.toString() + '->' + (i + 1).toString();
        R.innerHTML = Math.round(3 / (i * 10 + 10) * 10000) / 100;
        SR.innerHTML= Math.round(1 / (i * 1 + 1) * 10000) / 100;
        SSR.innerHTML= Math.round(2 / (i * 1 + 1) * 10000) / 100;

        row = table2.insertRow(i);
        lv = row.insertCell(0);
        R = row.insertCell(1);
        SR = row.insertCell(2);
        SSR = row.insertCell(3);
        lv.innerHTML = i.toString() + '->' + (i + 1).toString();
        R.innerHTML = '3 / ' + (i * 10 + 10).toString();
        SR.innerHTML= '1 / ' + (i * 1 + 1).toString();
        SSR.innerHTML= '2 / ' + (i * 1 + 1).toString();

    }

    var table = document.getElementById('R');
    var table2 = document.getElementById('R2');
    for(var i = 1; i < 10; ++i){

        row = table.insertRow(i);
        lv = row.insertCell(0);
        R = row.insertCell(1);
        SR = row.insertCell(2);
        SSR = row.insertCell(3);
        lv.innerHTML = i.toString() + '->' + (i + 1).toString();
        R.innerHTML = Math.round(3 / (i * 5 + 10) * 10000) / 100;
        SR.innerHTML= Math.round(2 / (i * 1 + 1) * 10000) / 100;

        if (i <= 3){

            SSR.innerHTML= '100';

        }
        else{

            SSR.innerHTML= Math.round(4 / (i * 1 + 1) * 10000) / 100;

        }
        row = table2.insertRow(i);
        lv = row.insertCell(0);
        R = row.insertCell(1);
        SR = row.insertCell(2);
        SSR = row.insertCell(3);
        lv.innerHTML = i.toString() + '->' + (i + 1).toString();
        R.innerHTML = '3 / ' + (i * 5 + 10).toString();
        SR.innerHTML= '2 / ' + (i * 1 + 1).toString();
        if (i <= 3){

            SSR.innerHTML= '4 / 4';


        }
        else{

            SSR.innerHTML= '4 / ' + (i * 1 + 1).toString();

            }

    }


}

</script>







<div style ='text-align: right;'>
<a href='https://imasml-theater-wiki.gamerch.com/%E3%82%B9%E3%82%AD%E3%83%AB%E4%B8%8A%E3%81%92'>
>>日版參考連結
</a>
</div>

<div>課程訓練卷分成四種：　<b>訓練課程卷 N </b>, <b>訓練課程卷 R </b>, <b>訓練課程卷 SR </b>, <b> 訓練課程卷 SSR </b>　四種</div></br>
<div>其中　<b>訓練課程卷 R </b>　<b>訓練課程卷 SR </b>　<b>訓練課程卷 SSR </b>　三種　可以提升技能等級</div></br>

<div>另外需注意的點為：</div></br>
<ul>
    <li>隨便一張可提升技能的訓練卷　都<b>有機率</b>提升技能等級　就算只拿<b>一張</b>衝</li>
    <li>衝同樣的等級　會因卡片<b>稀有度</b>而有不同的機率差異　越稀有<b>機率越低</b></li>
    <li>顯示的機率為　機率總和後<b>四捨五入</b>到個位數（但是使用時的機率應該＝顯示的機率）</li>
    </br>
    
    <li>11->12 必須要有 訓練課程卷 SSR 才能湊到 100%　10 以下非必要</li>
    <li>只有"純" 訓練課程卷 SSR　可以在 11->12 湊到 100%</li>
    <li>只有 5 突的卡片可以練到　技能等級 12　其餘皆是　技能等級 10 為滿等</li>
    <li>繁中版 5 突至少要等到 2021 年底附近才會開放（換句話說　可以只考慮如何練到技能等級 10 ）</li>

</ul>
<div>換句話說　如果你捨不得用你的 訓練課程卷 SSR 　你可以當作它不存在　把它囤到明年底再用</div>
</br>
<div>機率如下所示：</div>
</br>








<div class='theme'>SSR / SSR+</div>
</br>
<div class ='row'>
<div class='col-md-6'>
    <table id='SSR' class = 'col-md-11' >
    <tr>
        <th class='col-md-3'>技能等級</th>
        <th class='col-md-3'>卷 R</th>
        <th class='col-md-3'>卷 SR</th>
        <th class='col-md-3'>卷 SSR</th>
    </tr>
    </table>
    <div class='col-md-1'></div>
</div>

<div class='col-md-6'>
    <table id='SSR2' class = 'col-md-11'>
    <tr>
        <th class='col-md-3'>技能等級</th>
        <th class='col-md-3'>卷 R</th>
        <th class='col-md-3'>卷 SR</th>
        <th class='col-md-3'>卷 SSR</th>
    </tr>
    </table>
    <div class='col-md-1'></div>
</div>
</div>

</br>


<button data-toggle="collapse" data-target="#100SSR"> 以少量高稀有度湊到 100% 的方法</button>
<div id='100SSR' class='collapse'>
</br>
    <table>
    <tr>
        <th>技能等級</th>
        <th>卷 R</th>
        <th>卷 SR</th>
        <th>卷 SSR</th>
    </tr>



    <tr>
        <td>1->2</td>
        <td>10</td>
        <td>0</td>
        <td>0</td>
    </tr>

    <tr>
        <td>2->3</td>
        <td>17</td>
        <td>0</td>
        <td>0</td>
    </tr>

    <tr>
        <td>3->4</td>
        <td>17</td>
        <td>2</td>
        <td>0</td>
    </tr>

    <tr>
        <td>4->5</td>
        <td>14</td>
        <td>5</td>
        <td>0</td>
    </tr>

    <tr>
        <td>5->6</td>
        <td>10</td>
        <td>8</td>
        <td>0</td>
    </tr>

    <tr>
        <td>6->7</td>
        <td>10</td>
        <td>10</td>
        <td>0</td>
    </tr>

    <tr>
        <td>7->8</td>
        <td>7</td>
        <td>13</td>
        <td>0</td>
    </tr>

    <tr>
        <td>8->9</td>
        <td>4</td>
        <td>16</td>
        <td>0</td>
    </tr>

    <tr>
        <td>9->10</td>
        <td>0</td>
        <td>19</td>
        <td>0</td>
    </tr>
    </table>
</div>
</br>




<div class='theme'>SR / SR+</div>
</br>
<div class ='row'>
    <div class='col-md-6'>
        <table id='SR' class = 'col-md-11' >
        <tr>
            <th class='col-md-3'>技能等級</th>
            <th class='col-md-3'>卷 R</th>
            <th class='col-md-3'>卷 SR</th>
            <th class='col-md-3'>卷 SSR</th>
        </tr>
        </table>
        <div class='col-md-1'></div>
    </div>

    <div class='col-md-6'>
        <table id='SR2' class = 'col-md-11'>
        <tr>
            <th class='col-md-3'>技能等級</th>
            <th class='col-md-3'>卷 R</th>
            <th class='col-md-3'>卷 SR</th>
            <th class='col-md-3'>卷 SSR</th>
        </tr>
        </table>
        <div class='col-md-1'></div>
    </div>
</div>

</br>





<button class=''data-toggle="collapse" data-target="#100SR"> 以少量高稀有度湊到 100% 的方法</button>



<div id='100SR' class='collapse'>
</br>
<table>


<tr>
    <th>技能等級</th>
    <th>卷 R</th>
    <th>卷 SR</th>
    <th>卷 SSR</th>
</tr>



<tr>
    <td>1->2</td>
    <td>7</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>2->3</td>
    <td>10</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>3->4</td>
    <td>14</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>4->5</td>
    <td>17</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>5->6</td>
    <td>20</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>6->7</td>
    <td>17</td>
    <td>2</td>
    <td>0</td>
</tr>

<tr>
    <td>7->8</td>
    <td>17</td>
    <td>3</td>
    <td>0</td>
</tr>

<tr>
    <td>8->9</td>
    <td>14</td>
    <td>5</td>
    <td>0</td>
</tr>

<tr>
    <td>9->10</td>
    <td>14</td>
    <td>6</td>
    <td>0</td>
</tr>
</table>
</div>



<div class='theme'>R / R+</div>
</br>
<div class ='row'>
<div class='col-md-6'>
    <table id='R' class = 'col-md-11' >
    <tr>
        <th class='col-md-3'>技能等級</th>
        <th class='col-md-3'>卷 R</th>
        <th class='col-md-3'>卷 SR</th>
        <th class='col-md-3'>卷 SSR</th>
    </tr>
    </table>
    <div class='col-md-1'></div>
</div>

<div class='col-md-6'>
    <table id='R2' class = 'col-md-11'>
    <tr>
        <th class='col-md-3'>技能等級</th>
        <th class='col-md-3'>卷 R</th>
        <th class='col-md-3'>卷 SR</th>
        <th class='col-md-3'>卷 SSR</th>
    </tr>
    </table>
    <div class='col-md-1'></div>
</div>
</div>

</br>




<button data-toggle="collapse" data-target="#100R"> 以少量高稀有度湊到 100% 的方法</button>



<div id='100R' class='collapse'>
</br>

<table>
<tr>
    <th>技能等級</th>
    <th>卷 R</th>
    <th>卷 SR</th>
    <th>卷 SSR</th>
</tr>



<tr>
    <td>1->2</td>
    <td>4</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>2->3</td>
    <td>5</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>3->4</td>
    <td>7</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>4->5</td>
    <td>9</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>5->6</td>
    <td>10</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>6->7</td>
    <td>12</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>7->8</td>
    <td>14</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>8->9</td>
    <td>15</td>
    <td>0</td>
    <td>0</td>
</tr>

<tr>
    <td>9->10</td>
    <td>17</td>
    <td>0</td>
    <td>0</td>
</tr>
</table>
</div>

@stop

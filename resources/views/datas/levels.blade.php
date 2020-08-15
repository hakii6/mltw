@extends('main')
@section('content')

<div style ='text-align: right;'>
<a href='https://imasml-theater-wiki.gamerch.com/%E3%83%97%E3%83%AD%E3%83%87%E3%83%A5%E3%83%BC%E3%82%B5%E3%83%BC%E3%83%AC%E3%83%99%E3%83%AB'>
>>日版參考連結
</a>
</div>



<div>　主要重點</div>
</br>
<ul>

    <li>50 等前有經驗值加倍　此為新手福利</li>
    <li>60 等開始　每升 3 等 獲得 1 點活力上限</li>
    </br>
    <li>150 等開始　每升 4 等 獲得 1 點活力上限</li>
    <li>151 等達到同僚人數上限　總共 100 人</li>
    <li>400 等為目前繁中版等級上限　若依照日版進度推算　預計繁中版二周年附近實裝 999 等</li>
    </br>

</ul>







<div class='theme'>等級一覽表</div>
</br>

@foreach($levels_list as $levels)

<table>
    <tr>

        <th>PLV</th>
        <th>活力上限</th>
        <th>同僚上限</th>
        <th>升等所需經驗值</th>
        <th>累計經驗值</th>
        <th width='300'>備註</th>

    </tr>

    @foreach($levels as $level)

    <tr>

        <td>{{ $level->等級 }}</td>
        <td>{{ $level->活力上限 }}</td>
        <td>{{ $level->同僚上限 }}</td>
        <td>{{ $level->升等所需經驗值 }}</td>
        <td>{{ $level->累計經驗值 }}</td>
        <td>{{ $level->備註 }}</td>

    </tr>
    @endforeach

</table>

</br>
</br>
@endforeach

@stop

<!DOCTYPE html>
<html>

<head>
<title>製作人企劃書 by蛤蛤</title>

    @section('head')
        @include('common.head')
    @show
 
</head>
<body>

    <div class = 'container'>

        
        <nav class='navbar navbar-default menu'>
            <div class='container-fluid'>
                <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('homepage')}}"><big>製作人企劃書</big> <small>by 蛤蛤</small></a>
                </div>
                <ul class='nav navbar-nav'>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('events.index')}}">活動</a></li>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('gachas.index')}}">轉蛋</a></li>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('idols.index')}}">偶像</a></li>
                    <li><a style = 'color:#FFF8DC;' href="">歌曲</a></li>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('cards.index')}}">卡片</a></li>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('datas.index')}}">詳細資料</a></li>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('calculators.index')}}">各式計算機</a></li>
                    <li><a style = 'color:#FFF8DC;' href="{{ route('about.index')}}">關於本站</a></li>
                </ul>
            </div>
        </nav>


        <div class="content">

            @yield('content')

        </div>
    </div>

</body>




</html>
@yield('js')

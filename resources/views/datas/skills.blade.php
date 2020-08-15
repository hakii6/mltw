@extends('main')
@section('content')

<table>
    <tr>
        <th>卡名</th>
        <th>技能</th>
    </tr>

    @foreach($cards as $card)
    @if($card->skill_type_id == 1)
    <tr>

        <td>{{ $card->name_tw }}</td>
        <td>{{ $card->skill }}</td>

    </tr>
    @endif
    @endforeach

</table>

<table>
    <tr>
        <th>卡名</th>
        <th>技能</th>
    </tr>

    @foreach($cards as $card)
    @if($card->skill_type_id == 3)
    <tr>

        <td>{{ $card->name_tw }}</td>
        <td>{{ $card->skill }}</td>

    </tr>
    @endif
    @endforeach

</table>

<table>
    <tr>
        <th>卡名</th>
        <th>技能</th>
    </tr>

    @foreach($cards as $card)
    @if($card->skill_type_id == 7)
    <tr>

        <td>{{ $card->name_tw }}</td>
        <td>{{ $card->skill }}</td>

    </tr>
    @endif
    @endforeach

</table>

@stop

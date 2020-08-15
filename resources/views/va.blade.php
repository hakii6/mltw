@extends('main')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>

$(document).ready(function(){

    $('#ok').on('submit' , function(e){
        e.preventDefault();
        var a = $(":checked");

        $.each(a , function(index , val){

            $.ajax({

                type:'POST',

                url: "{{ route('client_images.va') }}",
                        

                data: {
                    'id': val.id,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success:function(data){

                },error:function(data){
                }

            });
        });
        


    });



});


</script>

<form id='ok'>
<table>
<tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>

</tr>


@foreach($client_images as $client_image)
<tr>
    <td><img src='{{ $client_image->image }}' width ='200'></td>

    @if($client_image->client_imageable_type == 'App\Card')

        @foreach ($client_image->client_imageable->card_images as $card_image)
        @if ($card_image->description == $client_image->description)
        <td><img src='{{ $card_image->image }}' width='200'></td>
        @break
        @endif
        @endforeach
    @elseif($client_image->client_imageable_type == 'App\Song')

        @foreach ($client_image->client_imageable->song_images as $song_image)
        @if ($song_image->description == $client_image->description)
        <td><img src='{{ $song_image->image }}' width='200'></td>
        @break
        @endif
        @endforeach

    @endif
    <td>{{ $client_image->description }}</td>
    <td><input id='{{ $client_image->id }}'type='checkbox' style='width:35px; height:35px;'></td>
</tr>
    

@endforeach

</table>

<label><input type="submit" value='確認'></input></label>
</form>
@stop

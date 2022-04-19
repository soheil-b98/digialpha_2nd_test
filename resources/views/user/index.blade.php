@extends('layouts.master')

@section('title','users')

@section('content')
    <div class="container" >
        <table class="table border-bottom table-hover text-center">
            <thead>
                <td>#</td>
                <td>name</td>
                <td>email</td>
                <td>card_number</td>
            </thead>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="text-align: left">
                        <ol>
                            @foreach($user->cards()->get() as $card)
                                <li>
                                    @if($card->is_verified)
                                        <span style="float: right">{{ $card->card_number }}</span>  <a href="{{ '/user/change_status/0/'.$card->id }}" class=""><span class="badge bg-success"> active</span></a>
                                    @else
                                        <span style="float: right">{{ $card->card_number }}</span>  <a href="{{ '/user/change_status/1/'.$card->id }}" class=""><span class="badge bg-danger">de_active</span></a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection




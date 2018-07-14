
@extends('layouts.common')
@section('content')
    <h3>Film List</h3>
    <table>
        @foreach($films as $film)
        <tr>
            <td><a href="/films/{{$film->slug_name}}">{{$film->name}}</a></td>
        </tr>
            @endforeach
    </table>


@endsection

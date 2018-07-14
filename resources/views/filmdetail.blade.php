
@extends('layouts.common')
@section('content')
    <h3>Create New Film</h3>
    <font color="red" id="errors"></font>
    <label>Name:{{$film->name}}</label>
    <br>
    <label>Description:{{$film->description}}</label>
    <br>
    <label>Release Date:{{$film->release_date}}</label>
    <br>
    <label>Rating: {{$film->rating}}</label>
    <br>
    <label>Ticket Price:{{$film->ticket_price}}</label>
    <br>
    <label>Country: {{$film->country}}</label>
    <br>
    <label>Genre: {{$film->genreName}}</label>
    <br>
    @if($film->photo)
        <image src="{{$film->photo}}"></image>
        @endif
    @if(Auth::check())
        <br>
    <label>Name</label>
    <input name="name" id="name" />
    <br>
    <label>Comment</label>
    <input type="hidden" name="film" id="film_id" value="{{$film->id}}"/>
    <textarea name="comments" id="comments" ></textarea>
    <br>
    <button id="submitComment">Submit</button>
    @endif
@endsection
<script></script>

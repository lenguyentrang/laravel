
@extends('layouts.common')
@section('content')
    <h3>Create New Film</h3>
    <font color="red" id="errors"></font>
    <label>Name</label>
    <input name="name" id="name" />
    <br>
    <label>Description</label>
    <input name="description" id="description" />
    <br>
    <label>Release Date</label>
    <input name="release_date" id="release_date" />
    <br>
    <label>Rating</label>
    <input name="rating" id="rating" />
    <br>
    <label>Ticket Price</label>
    <input name="ticket_price" id="ticket_price" />
    <br>
    <label>Country</label>
    <input name="country" id="country" />
    <br>
    <label>Genres</label>
    <fieldset id="genre_id">
        @foreach($genres as $key => $genre)
            <label>{{$genre->name}}</label>
        <input type="checkbox" name="chk[]" value="{{$genre->id}}" />
@endforeach
    </fieldset>
    <br>
    <label>Photo</label>
    <input name="photo" id="photo" />
    <br>
    <button id="submit">Submit</button>


@endsection

@extends('layouts.app')

@section('content')

<div class="jumbotron text-center">
            <h1> Contact info : </h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Name:</strong> {{ $contact->name }}<br>
            <strong>Contact:</strong> {{ $contact->contact }}<br>
            <strong>email:</strong> {{ $contact->email_adress }}

        </p>
    </div>
</div>

<ul>
    <li><a href="{{route ('contact.index')  }}">Back to contact list</a></li>
</ul>

@endsection

@extends('layouts.app')

@section('content')




<div class="card uper">
    <div class="card-header">
      Edit Contact info.
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('contact.update', $contact ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $contact->name }}" required/>
            </div>
            <div class="form-group">
                <label for="email_adress">email adress :</label>
                <input type="text" class="form-control" name="email_adress" value="{{ $contact->email_adress }}" required/>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number :</label>
                <input type="text" class="form-control" name="contact" value="{{ $contact->contact }}" required/>
            </div>
            <button type="submit" class="btn btn-primary">Update </button>
            <button href="{{ route('contact.index') }}" class="btn btn-dark">Back to list </button>

        </form>
    </div>
  </div>











    @endsection

@extends('layouts.app')

@section('content')




<div class="container">
  <div class="card uper">
    <div class="card-header">
Add new Contact
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

        <form method="post" action="{{route ('contact.store')}}">
  .         @csrf
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" class="form-control" name="name"  value="{{old('name')}}"/>
            </div>

            <div class="form-group">
                <label for="contact">Contact :</label>
                <input type="text" class="form-control" name="contact"  value="{{old('contact')}}"/>
            </div>
            <div class="form-group">
                <label for="email_adress"> Email :</label>
                <input type="text" class="form-control" name="email_adress" value="{{old('email_adress')}}"/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
  </div>
</div>
@endsection

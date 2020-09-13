@extends('layout')

@section('content')
    <h1>Edit Contact Form</h1>
    <div class="container col-lg-4" >
    <form method="POST" action="/contactposts/{{ $contacts->id }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label>Full Name</label>
            <input type="name" class="form-control" name="name" placeholder="Enter Full Name" value="{{ $contacts->name}}">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ $contacts->email}}">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="contact" class="form-control" name="contactno" placeholder="Enter Contact No." value="{{ $contacts->contactno}}">
            </div>
            <div class="form-group">
                <label>Message</label>
            <textarea class="form-control" name="description" rows="3">{{$contacts->description}}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection
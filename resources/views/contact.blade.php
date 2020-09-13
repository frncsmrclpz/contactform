@extends('layout')

@section('content')
    <h1>Contact Form</h1>
    <div class="container col-lg-4" >
        <form method="POST" action="/contactposts">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Full Name</label>
                <input type="name" class="form-control" name="name" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="contact" class="form-control" name="contactno" placeholder="Enter Contact No.">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>

@endsection
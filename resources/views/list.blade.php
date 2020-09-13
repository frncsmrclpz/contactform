@extends('layout')

@section('content')
<div class="container list">
    <table class="table table-responsive">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact No</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                <th scope="row">{{$contact->id}}</th>
                <td>
                    <div>
                        <a href="/contactposts/{{$contact->id}}/edit">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </a>
                    </div>
                    <div>
                        <form method="POST" action="/contactposts/{{$contact->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->contactno}}</td>
                <td>{{$contact->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->render("pagination::bootstrap-4") }}
    <form method="GET" action="/contactposts/create"> 
        <div>
            <button type="submit" class="btn btn-primary">Send Contact</button>
        </div>
    </form>
</div>
@endsection
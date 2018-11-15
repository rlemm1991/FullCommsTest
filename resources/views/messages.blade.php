@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header justify-content-center">All our messages</div>

                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Sent At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)

                                    <tr>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td>{{$contact->created_at}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

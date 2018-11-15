@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header justify-content-center"><h1>Thank you</h1></div>

                    <div class="card-body">
                        <p>Your message has been sent to us</p>
                        <p>You should recieve an email confirmation from us once we've received it</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/')}}" class="btn btn-success">Go Home !!!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

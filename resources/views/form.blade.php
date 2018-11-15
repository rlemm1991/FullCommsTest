@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header justify-content-center">Fill out the form</div>

                    <div class="card-body">
                       <form action="{{url('/contact/new')}}" method="POST">
                            {{csrf_field()}}
                           <div class="form-group">
                               <label>First Name</label>
                               <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                           </div>

                           <div class="form-group">
                               <label>Last name Name</label>
                               <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                           </div>

                           <div class="form-group">
                               <label>Email Address</label>
                               <input class="form-control" type="email" name="email_address" placeholder="Email@adress.com" required>
                           </div>

                           <div class="form-group">
                               <label>Subject</label>
                               <input class="form-control" type="text" name="subject" placeholder="Your subject" required>
                           </div>

                           <div class="form-group">
                               <label>Message to send</label>
                               <textarea class="form-control" rows="10" name="message"></textarea>
                           </div>

                           <div class="form-group">
                               <button type="submit" class="btn btn-success">Send Message</button>
                           </div>

                       </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

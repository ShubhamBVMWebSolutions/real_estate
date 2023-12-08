@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="{{route('send_inquiry')}}" data-toggle="modal" data-target="#inquairyModel"> <img src="{{asset('img/message.jpg')}}" style="max-width: 3%; float: right;"></a>
                </div>

                <div class="card-body">

                    <h1>You are Welcome To the user DashBoard</h1> 
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

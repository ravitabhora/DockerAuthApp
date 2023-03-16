<!-- resources/views/auth/login.blade.php -->

@extends('layout.app')

@section('content')
@if(session()->has('alreadyLoggedIn'))
                <div class="alert alert-success">
                    {{ session()->get('alreadyLoggedIn') }}
                </div>
                @endif
<div class="container d-flex justify-content-center align-items-center">
             
        <div class="card">
             @if(session()->has('authenticatedUser'))
              <div class="upper">

                <img src="https://i.imgur.com/Qtrsrk5.jpg" class="img-fluid">
                
              </div>

              <div class="user text-center">

                <div class="profile">

                  <img src="{{ session()->get('authenticatedUser')['avatar'] }}" class="rounded-circle" width="80">
                  
                </div>

              </div>

              <div class="mt-5 text-center">
              
                <h4 class="mb-0">Welcome</h4>
                <br/>
                <span class="text-muted d-block mb-2">    
                {{ session()->get('authenticatedUser')['name'] }}</span>
                <br/>
                <span class="text-muted d-block mb-2">    
                {{ session()->get('authenticatedUser')['email'] }}</span>
                <!-- <span class="text-muted d-block mb-2">{{ json_encode(session()->get('authenticatedUser')) }}</span> -->
                <br/>
                <form class="form-horizontal" method="GET" action="/logout">
                    <input type="submit" value="Logout" class="btn btn-primary btn-sm" >
                </form>
                
              </div>
              @endif
        </div>

</div>
@endsection

<!-- resources/views/auth/login.blade.php -->

@extends('layout.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger">    
    {{ implode('', $errors->all(':message')) }}
</div>
@endif
<div class="container d-flex justify-content-center align-items-center">
             
             <div class="card">
              <div class="upper">
                
              </div>

              <div class="mt-5 text-center">

               
                <a href="{{ route('login.google')}}" class="btn btn-primary btn-sm">
                {{ __('Login with') }}&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" height="20px">
                    <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/>
                </svg>
                 
                    </a>
                <!-- <button class="" onclick="{{ URL::route('login.google')}}">Login via Google</button> -->


                <div class="d-flex justify-content-between align-items-center mt-4 px-4" style="display:none !important;">

                  <div class="stats">
                    <h6 class="mb-0">Followers</h6>
                    <span>8,797</span>

                  </div>


                  <div class="stats">
                    <h6 class="mb-0">Projects</h6>
                    <span>142</span>

                  </div>


                  <div class="stats">
                    <h6 class="mb-0">Ranks</h6>
                    <span>129</span>

                  </div>
                  
                </div>
                
              </div>
               
             </div>

           </div>
@endsection

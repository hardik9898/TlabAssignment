@extends('frontend.layouts.app')
@section('title','Login')
@section('front_main_content')
          <!-- About section-->
          <section >
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-4">
                        <h2 class="mb-4">Therapist Login</h2>
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                          <h4>Error !!</h4>
                            @error('password')
                                  {{ $message }}
                                @enderror
                                <br />
                                @error('email')
                                  {{ $message }}
                              @enderror  
                        </div>
                       @endif
                       <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="mb-3">
                              <label  class="form-label">Email address</label>
                              <input type="email" name="email" value="{{old('email')}}" placeholder="Email" class="form-control" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label  class="form-label">Password</label>
                             
                              <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                          </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
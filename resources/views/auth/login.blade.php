@extends('layouts.dashboard.login')


<!-- ========================================================================== -->
@section('content')


 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-8 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
 
              <div class="col-lg-10">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">

                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


 <!-- ================================================================================= -->





                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" required autocomplete="current-password" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror




 <!-- ================================================================================ -->



                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck"
                         {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label" for="customCheck">
                            {{ __('Remember Me') }}
                         </label>



<!-- ================================================================================ -->
        
                      </div>
                    </div>
                    <button type="submit"  class="btn btn-primary btn-user btn-block font-weight-bold">
                                      {{ __('Login') }}
                    </button>
                                        
                                          <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>  
        
                  </form>
                  <hr>
     <!--              <div class="text-center">

                       @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif 
                 </div> -->
               
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

@endsection


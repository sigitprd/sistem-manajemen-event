@extends('layouts.layoutuser')

@section('title', 'Login - E-VENT')

@section('content')

        <section id="userpage">
          <div class="userpage-container">
                <div class="userform card-header">
                  <h2 class="h3 text text-center m-0 font-weight-light text-white">{{ __('Login') }}</h2>
                </div>


                <div class="row">
                    <form class="p-5 border-top-primary" method="POST" action="{{ route('postlogin') }}" autocomplete="off">
                        @method('post')
                        @csrf
                          <div class="form-group row">
                            
                            <label for="email" class="col-form-label col-md-1 text-white"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email address" class="form-control form-control-akun @error('email') is-invalid @enderror" name="email" autocomplete="off" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="password" class="col-md-1 col-form-label text-white"><i class="fa fa-key" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control form-control-akun  @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-get-started">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group mb-0">
                                <a class="btn btn-link" href="{{ route('signup') }}">
                                    Create an Account!
                                </a>
                        </div>


                    </form>
                </div>
                </div>
        </section>
@endsection

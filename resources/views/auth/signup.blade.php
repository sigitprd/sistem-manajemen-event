@extends('layouts.layoutuser')

@section('title', 'Sign up - E-VENT')

@section('content')
                <section id="userpage">
                  <div class="userpage-container">
                    <div class="userform card-header">
                      <h2 class="h3 text-center m-0 font-weight-light text-white">Sign Up</h2>
                    </div>


                    <form class="p-5 border-top-primary" method="POST" action="{{ route('postsignup') }}" autocomplete="off">
                        @method('post')
                        @csrf

                        <div class="form-group row d-flex">
                            <label for="name" class="col-md-1 col-form-label text-white"><i class="fa fa-user" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Full name" class="form-control form-control-akun @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex">
                            <label for="email" class="col-md-1 col-form-label text-white"><i class="fa fa-envelope" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email address" class="form-control form-control-akun @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex">
                            <label for="password" class="col-md-1 col-form-label text-white"><i class="fa fa-key" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control form-control-akun @error('password') is-invalid @enderror" name="password" required value="{!! old('password') !!}" autocomplete="off">

                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                       {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex">
                            <label for="password_confirmation" class="col-md-1 col-form-label text-white"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" placeholder="Confirm password" class="form-control form-control-akun @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required value="{!! old('password_confirmation') !!}" autocomplete="off">
                                @error('password_confirmation')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-get-started">
                                    {{ __('Sign up') }}
                                </button>
                        </div>
                        <div class="form-group mb-0">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Already Have ?
                                </a>
                        </div>

                    </form>
                  </div>
                </section>
@endsection

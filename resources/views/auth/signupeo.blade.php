@extends('layouts.layoutuser')

@section('title', 'Sign up EO - E-VENT')

@section('content')
                <section id="userpage">
                  <div class="userpage-container">

                    @if(auth()->user() == false)
                        <div class="userform card-header yoi">
                          <h2 class="h3 text-center m-0 font-weight-light">Sign Up as Event Organizer</h2>
                          <p>Ready to manage your event tickets easily with our features? Come on join us!</p>
                        </div>
                     <div class="form-group mb-0">
                            <a class="btn btn-link" href="{{ route('signup') }}">
                                You must create account in my website. Click This!
                            </a>
                    </div>

                    @else
                        @if($eo == null)
                        <div class="userform card-header yoi">
                          <h2 class="h3 text-center m-0 font-weight-light text-white">Sign Up Event Organizer</h2>
                        </div>
                        <form class="card shadow p-5 border-top-primary" method="POST" enctype="multipart/form-data" action="{{ route('postsignupeo') }}">
                            @method('post')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label"><i class="fa fa-user" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="Your name" class="form-control form-control-akun @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-2 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="address" type="text" placeholder="Address" class="form-control form-control-akun @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-2 col-form-label"><i class="fa fa-phone" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" placeholder="Phone number" class="form-control form-control-akun @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="idcard" class="col-md-2 col-form-label"><i class="fa fa-id-card" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="idcard" type="file" placeholder="Identity Card" class="form-control form-control-akun @error('identity_card_eo') is-invalid @enderror" name="identity_card_eo" required autocomplete="idcard">

                                    @error('identity_card_eo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-get-started">
                                        {{ __('Sign up') }}
                                    </button>
                            </div>

                        </form>   
                        @elseif($eo->status == "waiting" || ($eo->status == "confirmed" && auth()->user()->role == "user"))
                        <div class="userform card-header yoi">
                          <h2 class="h3 text-center m-0 font-weight-light text-white">Login Event Organizer</h2>
                        </div>
                        <div class="form-group mb-0">
                                <a class="btn btn-link" href="{{ route('indexUser') }}">
                                    Please wait to the rersponse form admin
                                </a>
                        </div>
                        @elseif($eo->status == "confirmed" && auth()->user()->role == "eo")
                        <div class="userform card-header yoi">
                          <h2 class="h3 text-center m-0 font-weight-light text-white">Login Event Organizer</h2>
                        </div>
                        
                        <form class="p-5 border-top-primary" method="POST" action="{{ route('postlogin_eo') }}" autocomplete="off">
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


                        </form>
                        
                        @else
                        <div class="userform card-header yoi">
                          <h2 class="h3 text-center m-0 font-weight-light text-white">Sign Up Event Organizer</h2>
                        </div>
                        <form class="card shadow p-5 border-top-primary" method="POST" enctype="multipart/form-data" action="{{ route('postsignupeo') }}">
                            @method('post')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label"><i class="fa fa-user" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="Your name" class="form-control form-control-akun @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-2 col-form-label"><i class="fa fa-map-marker" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="address" type="text" placeholder="Address" class="form-control form-control-akun @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-2 col-form-label"><i class="fa fa-phone" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" placeholder="Phone number" class="form-control form-control-akun @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="idcard" class="col-md-2 col-form-label"><i class="fa fa-id-card" aria-hidden="true"></i></label>

                                <div class="col-md-6">
                                    <input id="idcard" type="file" placeholder="Identity Card" class="form-control form-control-akun @error('identity_card_eo') is-invalid @enderror" name="identity_card_eo" required autocomplete="idcard">

                                    @error('identity_card_eo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-get-started">
                                        {{ __('Sign up') }}
                                    </button>
                            </div>

                        </form>                      
                        @endif
                    @endif


                  </div>
                </section>
@endsection

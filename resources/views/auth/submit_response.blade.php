@extends('layouts.layoutuser')

@section('title', 'Sign up')

@section('content')
                <section id="userpage">
                  <div class="userpage-container">
                    <div class="userform card-header">
                      <h2 class="h3 text-center m-0 font-weight-light text-white">Sign Up Event Organizer</h2>
                    </div>

                    <div class="form-group mb-0">
                                <a class="btn btn-link" href="{{ route('indexUser') }}">
                                    Submit success! Please wait to the response for admin.
                                </a>
                        </div>


                  </div>
                </section>
@endsection

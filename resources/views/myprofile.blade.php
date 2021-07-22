@extends('layouts.layout')

@section('title', 'E-VENT - Profile')



@section('content')

<div id="konten" class="container">

  <section id="carousel">
    <div id="back-to-dashboard2" class="col-lg-3 wu-btn-container text-right">
      <a class="wu-btn align-middle" href="/">Back to Home</a>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <div class="card-title mb-4">
                <div class="d-flex justify-content-start">
                  <div class="image-container">
                      <img src="{{ asset('/assets3/avatar/'.$user->avatar) }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  </div>
                    <div class="userData ml-3">
                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ $user->name }}</h2>
                        <!-- <h6 class="d-block">102 Laporan</h6> -->
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="editprofile-tab" data-toggle="tab" href="#editprofile" role="tab" aria-controls="editprofile" aria-selected="false">Edit Profile</a>
                        </li>

                    </ul>

                    <div class="tab-content ml-1" id="myTabContent">
                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Full Name</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <hr />

                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Email</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr />
                        </div>

                        <div class="tab-pane fade" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                            Facebook, Google, Twitter Account that are connected to this account
                        </div>

                    </div>
                </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection

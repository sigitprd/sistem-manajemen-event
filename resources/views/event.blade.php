@extends('layouts.layout')

@section('title', 'E-VENT')



@section('content')

<div id="konten" class="container">

  <h3 class="wu-title">All Event</h3>
  <p class="wu-text"> Find your favorite events, and let's have fun</p>

  <section id="eventlist">

  <div class="container eventonly">

    <h3 class="wu-title">All Event</h3>
    <p class="wu-text"> Find your favorite events, and let's have fun</p>

    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
                <div class="btn-group">
                    <button class="wu-btn" id="lister">
                        List View
                    </button>
                    <button class="wu-btn" id="grider">
                        Grid View
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="productser" class="row view-group">
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="wu-title group card-title inner list-group-item-heading">
                                Java Open Air 2020</h4>
                            <p class="wu-text group inner list-group-item-text">
                              <strong>Jogja Expo Center</strong>
                              </br>
                              Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                      <strong>Rp 350.000</strong>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="{{ asset('assets/img/poster2.png') }}" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="wu-title group card-title inner list-group-item-heading">
                                Hammersonic 2020</h4>
                            <p class="wu-text group inner list-group-item-text">
                              <strong>Carnival Beach Ancol</strong>
                              </br>
                              Pantai Carnaval, Taman Impian Jaya, Ancol, Kec. Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14430</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        <strong>Rp 800.000</strong>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
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

@extends('layouts.layout')

@section('title', 'E-VENT')



@section('content')
  <!-- <div class="row h-100 align-items-center justify-content-center"> -->
  <div id="konten" class="container">


    <!--==========================
    Call To Action Section
    ============================-->
    <section id="carousel">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="wu-title">Welcome to E-VENT</h3>
            <p class="wu-text"> is an integrated online ticketing platform & One Stop Shopping Event Support.
              We provide system admin services for selling both through ticket box and online stores. 
              Sales are also supported by official partners who have collaborated with us,
               in addition to that we also provide supporting equipment for the event.</p>
          </div>
          <div class="col-lg-3 wu-btn-container text-center">
            <a class="wu-btn align-middle" href="#eventlist">Event List</a>
          </div>
          <div class="col-lg-9 text-center text-lg-left">
            <p class="wu-text d-inline"> Or sumbit your another event ?</p>
            <a class="wu-btn align-middle d-inline-block" href="{{ route('signupeo') }}">Click This</a>
          </div>
        </div>
      </div>
    </section><!-- #welcome-user -->

    <section id="categories">
      <div class="lp-section-row margin-bottom-60">
      	<div class="container">
          <div class="row">
      			<div class="col-md-12">
      				<ul class="lp-home-categoires padding-left-0 new-banner-category-view4   ">

                <div class="labelcate text-center">
                  <h3 class="wu-title">
                    <strong>Categories<strong>
                  </h3>
                  <p class="wu-text">Just looking around? Let us suggest u bro</p>
                </div>

                <li>
      						<a href="" class="lp-border">
      							<span>
      								<i class="fa fa-film" aria-hidden="true"></i>
                      <br>
                      <p class="wu-text">Arts &amp; Culture</p>
      							</span>
  								</a>
  							</li>

  							<li>
  								<a href="" class="lp-border">
  									<span>
  										<i class="fa fa-music" aria-hidden="true"></i>
                      <br>
                      <p class="wu-text">Music Concert</p>
  									</span>
  								</a>
  							</li>

                <li>
  								<a href="" class="lp-border">
  								 <span>
  									<i class="fa fa-microphone" aria-hidden="true"></i>
                     <br>
                     <p class="wu-text">Seminar</p>
  								 </span>
  							 </a>
  						  </li>

							</ul>
						</div>
					</div>
				</div>
			</div>
    </section>

    <section id="eventlist">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 my-3">
              <h3 class="sip wu-title">Upcoming Event</h3>
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

          <div class="item col-xs-4 col-lg-4 d-flex">
            <div class="thumbnail card">
              <div class="img-event">
                  <img class="group list-group-image img-fluid"  src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
              </div>
              <div class="caption card-body">
                <h4 class="wu-title group card-title inner list-group-item-heading">
                  Java Open Air 2020
                </h4>
                <div class="pt-4 pb-2">
                  <p class="wu-text group inner list-group-item-text text_detail">
                    <strong>Jogja Expo Center</strong>
                    </br>
                    Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia hjhj hhj hhj hbhj hbjjh jnjnj jknjkjkn jjknnjk jkjkn jjknjk fjjnk jnknnjk jknjk jkjk jknjk jnnjk jkjkn jkknjk jknnkj jknnjk
                  </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="wu-text lead">
                        <strong>Rp 350.000</strong>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success float-right" href="http://www.jquery2dotnet.com">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="item col-xs-4 col-lg-4 d-flex">
            <div class="thumbnail card">
              <div class="img-event">
                  <img class="group list-group-image img-fluid"  src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
              </div>
              <div class="caption card-body">
                <h4 class="wu-title group card-title inner list-group-item-heading">
                  Java Open Air 2020
                </h4>
                <div class="pt-4 pb-2">
                  <p class="wu-text group inner list-group-item-text">
                    <strong>Jogja Expo Center</strong>
                    </br>
                    Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia
                  </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="wu-text lead">
                        <strong>Rp 350.000</strong>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success float-right" href="http://www.jquery2dotnet.com">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="item col-xs-4 col-lg-4 d-flex">
            <div class="thumbnail card">
              <div class="img-event">
                  <img class="group list-group-image img-fluid"  src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
              </div>
              <div class="caption card-body">
                <h4 class="wu-title group card-title inner list-group-item-heading">
                  Java Open Air 2020
                </h4>
                <div class="pt-4 pb-2">
                  <p class="wu-text group inner list-group-item-text">
                    <strong>Jogja Expo Center</strong>
                    </br>
                    Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia
                  </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="wu-text lead">
                        <strong>Rp 350.000</strong>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success float-right" href="http://www.jquery2dotnet.com">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="item col-xs-4 col-lg-4 d-flex">
            <div class="thumbnail card">
              <div class="img-event">
                  <img class="group list-group-image img-fluid"  src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
              </div>
              <div class="caption card-body">
                <h4 class="wu-title group card-title inner list-group-item-heading">
                  Java Open Air 2020
                </h4>
                <div class="pt-4 pb-2">
                  <p class="wu-text group inner list-group-item-text">
                    <strong>Jogja Expo Center</strong>
                    </br>
                    Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia
                  </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="wu-text lead">
                        <strong>Rp 350.000</strong>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success float-right" href="http://www.jquery2dotnet.com">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="item col-xs-4 col-lg-4 d-flex">
            <div class="thumbnail card">
              <div class="img-event">
                  <img class="group list-group-image img-fluid"  src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
              </div>
              <div class="caption card-body">
                <h4 class="wu-title group card-title inner list-group-item-heading">
                  Java Open Air 2020
                </h4>
                <div class="pt-4 pb-2">
                  <p class="wu-text group inner list-group-item-text">
                    <strong>Jogja Expo Center</strong>
                    </br>
                    Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia
                  </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="wu-text lead">
                        <strong>Rp 350.000</strong>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success float-right" href="http://www.jquery2dotnet.com">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="item col-xs-4 col-lg-4 d-flex">
            <div class="thumbnail card">
              <div class="img-event">
                  <img class="group list-group-image img-fluid"  src="{{ asset('assets/img/poster1.jpeg') }}" alt="" />
              </div>
              <div class="caption card-body">
                <h4 class="wu-title group card-title inner list-group-item-heading">
                  Java Open Air 2020
                </h4>
                <div class="pt-4 pb-2">
                  <p class="wu-text group inner list-group-item-text">
                    <strong>Jogja Expo Center</strong>
                    </br>
                    Jalan Raya Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, YO, Indonesia
                  </p>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <p class="wu-text lead">
                        <strong>Rp 350.000</strong>
                    </p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success float-right" href="http://www.jquery2dotnet.com">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </div>

  <script>
    function truncateText(selector, maxLength) {
    var element = document.querySelector(selector),
        truncated = element.innerText;

    if (truncated.length > maxLength) {
        truncated = truncated.substr(0,maxLength) + '...';
    }
      return truncated;
    }

    document.querySelector('p.text_detail').innerText = truncateText('p.text_detail', 100);
  </script>

@endsection

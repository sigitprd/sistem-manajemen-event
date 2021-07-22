@extends('layouts.layout')

@section('title', 'E-VENT - Detail Event')

@section('content')

<div id="konten" class="container">

  <section id="detailevent">
    <div class="container">
      <h1 class="wu-title">{{ $event->event_name }}</h1>

      <div class="row-de">
        <p class="wu-text">Created by : EO Name</p>
        <p class="wu-text">Status : {{ $event->status }}</p>
      </div>

      <div class="row-de">
      <!-- <div class="col-lg-3 wu-btn-container text-right"> -->
              <p><i class="fa fa-calendar" aria-hidden="true" style="margin-right: 16px;"></i>
                <span class="wu-text"> {{ date('j F, Y', strtotime($event->start_date)) }} </span>
              </p>

              <p><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 16px;"></i>
                <span class="wu-text"> {{ $event->event_address }} </span>
              </p>

              <p><i class="fa fa-globe" aria-hidden="true" style="margin-right: 16px;"></i>
                <span><a href="https://www.google.com/maps?q={{ $event->event_address }}" class="wu-text">View in Maps</a></span>
              </p>
      <!-- </div> -->
      </div>

      <div id="ticketbuy" class="ticket-column padside-12">
  <div class="ticket-place">
    <div class="ticket-header">
          Ticket Category
        </div>
    <div class="box-category">
      <div class="ticketPlace">
        <form action="{{ url('details/'.$event->id.'/show/checkout') }}" id="checkoutBoxForm">
        <table id="ticketcheckout" class="table table-responsive">
          <tbody style="display:block; overflow:auto; height:200px; width:100%;">
            @foreach($tickets as $index => $ticket)
            @if($ticket->status == "available")
            <tr class="ticketcat" id="{{ $ticket->id }}">
              <td>
                {{ $ticket->ticket_name }} - {{ $ticket->Category_Ticket }}<br>
                <strong style="font-size: 14px; color:#929292;">Rp&nbsp;<input type="text" class="price" value="{{ $ticket->price }}" disabled="true"></strong>
                <br>
                <strong class="total_price" style="font-size: 14px; color:#929292;">Total : Rp&nbsp;<span id="amount" class="amount">0</span></strong>
              </td>
              <td>
                <input type="number" id="qty" name="qty" min="0" class="qty form-control w-50 float-right" value="0">
                <!-- <select value="" name="qty" class="qty form-control">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select> -->
              </td>
            </tr>
            @else
            <tr>Not Available</tr>
            @endif
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td class="checkOutBox">
                    <div class="priceTotal">
                      <p>GrandTotal</p>
                      <p id="total" class="total">Rp. 0</p>
                    </div>
                    
                </td>
                <td>
                  @if(auth()->user())
                    <div id="buy-btn" class="checkOutButton">
                      <button class="wu-btn" type="submit" style="cursor: default;" data-toggle="modal" data-target="#checkoutModal">Checkout</button>
                    </div>
                  @else
                    <div id="buy-btn" class="">
                      <a class="wu-btn" href="{{ route('login') }}" style="cursor: default;">Login</a>
                    </div>
                  @endif
                </td>
              </tr>
            </tfoot>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section id="detail-container">
    <div class="page-container">
          <div class="card user-activity-card">

              <div class="card-block product-list" id="load-data">
                  <div class="post row m-b-25">
                      <div class="col-auto p-r-0">
                      </div>
                      <div class="col wrap-input100 input100-select bg1">

                              <div class="u-img"> <img class="myImages img-radius cover-img" id="myImg" src="{{ asset('assets3/img/'.$event->event_photo) }}" alt="user image" width="300" height="200"></div>
                              <div id="myModal" class="modal">
                              <!-- The Close Button -->
                              <span class="close">&times;</span>
                              <!-- Modal Content (The Image) -->
                              <img class="modal-content" id="img01">
                              <!-- Modal Caption (Image Text) -->
                              <div id="caption"></div>
                              </div>
                        </div>
                  </div>
              </div>



                  <div class="card-header">
                      <h5>Description</h5>
                      <h6 class="m-b-5">{{ $event->description }}JAVA OPEN AIR is an outdoor music festival that held annually in 2 cities within java island of Indonesia. Year 2020 will be the first year of Java Open Air, Yogyakarta and Surabaya are the cities that will host this phenomenal rock/metal music festival. At least a couple thousands of metal heads / punk rockers / hardcore music fans will crowd the pit.
                      Java Open Air name is taken from 'Java' as in island of java, one of the most populated island in Indonesia, which also known as the central of rock/metal music community in Indonesia and Java Open Air is designed to support the development of rock/metal bands Indonesia and aimed to be one of the most-anticipated festival in Asia/Australia.  Java Open Air also will promote the tourism of Indonesia, especially, the city that will host the festival every year.
                      Along with music stages, Java Open Air will have "Collabs Market" to facilitate local fashion brands and Artists to collaborate and produce special products/creations that only available at the festival.
                      Food trucks, Merch booths and games station will also to spoil the crowds at the festival's venue.
                      On this first edition, Java Open Air 2020 will be lined-up by Indonesia's best metal / hardcore / punk bands.</h6>
                  </div>

                  <div class="card-header">
                      <h5>Announced line up</h5>
                      <h6 class="m-b-5">
                      - BURGER KILL <br>
                      - SERIGALA MALAM <br>
                      - FRAUD<br>
                      - BIAS<br>
                      - RISING THE FALL<br>
                      - ZI FACTOR<br>
                      - D'ARK LEGAL SOCIETY<br>
                      - BLINGSATAN<br>
                      - SERIGALA MALAM<br>
                      - KARAT<br>
                      - DAGING<br>
                      - WOLF FEET<br>
                      <h6>
                  </div>

              </div>
          </div>
    </div>
  </section>

</div>

@endsection

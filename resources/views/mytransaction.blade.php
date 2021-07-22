@extends('layouts.layouttest')

@section('title', 'E-VENT - History Transaction')

@section('content')

<!-- <div class="container justify-content-center"> -->
<section id="detail-container" style="margin-top: 120px; margin-bottom: 100px;">
  <div class="page-container">
    <div class="card user-activity-card">
        <div class="card-block product-list" id="load-data" >
            <div class="post row m-b-25">

              <div class="col wrap-input100 input100-select" style="border: 1px solid transparent;">
                <div class="col-auto p-r-0">

                  <div class="ticket-place">
                    <div class="ticket-header">
                      You have {{-- count($transactions) --}} tickets.
                    </div>
                    <div class="box-category">
                      <div class="ticketPlace">
                        <table id="ticketcheckout" class="table table-responsive table-hover">
                          <tbody style="display:block; overflow:auto;">
							{{--
                            @forelse($transactions as $key => $value)
                            <tr class="ticketcat">
                              <td>
                                <div class="u-img"> <img class="myImages img-radius cover-img" id="myImg" src="{{ asset('assets3/img/'.$value->event_photo) }}" alt="event poster" width="300" height="200"></div>
                                <div id="myModal" class="modal">
                                <!-- The Close Button -->
                                <span class="close">&times;</span>
                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img01">
                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                                </div>
                              </td>
                              <td>
                                Booking ID<br>
                                <strong style="font-size: 14px; color:#929292;">#666</strong>
                              </td>
                              <td>
                                Name<br>
                                <strong style="font-size: 14px; color:#929292;">{{ auth()->user()->name }}</strong>
                              </td>
                              <td>
                                Category<br>
                                <strong style="font-size: 14px; color:#929292;">{{ $value->category_ticket }}</strong>
                              </td>
                              <td>
                                Status<br>
                                <strong style="font-size: 14px; color:#008716;">Check in 1 time</strong>
                              </td>
                              <td style="margin-bottom: -90px;">
                                <a class="wu-btn align-middle" style="text-align: center; height: 67px; width: 166px;" href="">Download Ticket</a>
                              </td>
                            </tr>
                            @empty
                            <div class="container text-center my-5"><h1>Your transactions is empty.</h1></div>
                            @endforelse
							--}}
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
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
<!-- </div> -->
@endsection

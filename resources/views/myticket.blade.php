@extends('layouts.layouttest')

@section('title', 'E-VENT - Ticket')



@section('content')

  <section id="usercontent">
    <div class="container">
      <h1 class="wu-title">Tickets</h1>
  </section>

  <section id="detail-container">
    <div class="page-container">
          <div class="card user-activity-card">
              <div class="card-block product-list" id="load-data" >
                  <div class="post row m-b-25">
                    <div class="col-auto p-r-0">
                    </div>
                      <div class="col wrap-input100 input100-select bg1">


                          <table id="ticketcheckout" class="table table-hover">
                  					<!-- <tfoot>
                  					</tfoot> -->
                  					<tbody>
                  						<tr class="ticketcat">
                  							<td>
                                  <div class="u-img"> <img class="myImages img-radius cover-img" id="myImg" src="{{ asset('assets/img/poster1.jpeg') }}" alt="event poster" width="300" height="200"></div>
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
                                  Event Name<br>
                                  <strong style="font-size: 14px; color:#929292;">Java Open Air 2020</strong>
                                </td>
                                <td>
                                  Event Date<br>
                                  <strong style="font-size: 14px; color:#929292;">Mar 20, 2020 | 19:45:00</strong>
                                </td>
                                <td>
                                  Quantity<br>
                                  <strong style="font-size: 14px; color:#929292;">1</strong>
                                </td>
                  							<td>
                  								<a class="wu-btn align-middle" href="/detailevent">Event Details</a>
                                  <span><a class="wu-btn align-middle" href="/detailticket">Ticket Details</a></span>
                  							</td>
                              </tr>

                  							</tbody>
                  						</table>

                      </div>
                  </div>


              </div>

              <div id="remove-row" class="text-center">
                <p id="btn-more2" class="btn-get-started text-center" style="cursor:pointer" data-id="">Show more ticket</p>
              </div>


          </div>
    </div>
  </section>

@endsection

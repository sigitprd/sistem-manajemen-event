<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">

  <title>E-VENT - Dashboard - Ticket</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="{{ asset('assets2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets2/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/picturetickets.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('indexEo') }}">
        <div class="sidebar-brand-icon">
          <i class="fa fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Event Organizer</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('indexEo') }}">
          <i class="fa fa-tachometer"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item - Data Event -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('eventEo') }}">
          <i class="fa fa-calendar-check-o"></i>
          <span>My Events</span></a>
      </li>

      <!-- Nav Item - Data Ticket -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('ticketEo') }}">
          <i class="fa fa-ticket"></i>
          <span>Tickets</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('assets3/avatar/'.auth()->user()->avatar) }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.eo') }}">
                  <i class="fa fa-user fa-sm fa-fw mr-2 text-dark"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ url('/') }}">
                  <i class="fa fa-backward fa-sm fa-fw mr-2 text-dark"></i>
                  Back To E-VENT
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-dark"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" id="title_ticket">Ticket Management - All Events</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          @if($tickets->isEmpty() == false)
            <div class="row overflow-auto">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ticket Total (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="data_total">{{ count($tickets) }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-ticket fa-2x text-primary"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Available (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="data_available">{{ count($tickets->where('status', 'available')) }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-refresh fa-2x text-success"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sold Out</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="div_sold_out">
                              {{ (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100) }} %
                            </div>
                          </div>
                          <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div id="progressbar_sold_out" class="progress-bar bg-info" role="progressbar" style="width: {{ (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100) }}%" aria-valuenow="{{ (int)($transactions->sum('quantity') / ($tickets->where('status', 'available')->sum('quantity') + $transactions->sum('quantity')) * 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-shopping-cart fa-2x text-info"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          @endif

          <br>
          <form class="form-inline">
              <button class="form-control mr-sm-2 mb-2 btn btn-success d-inline" type="button" href="#" data-toggle="modal" data-target="#addTicketModal">
                <i class="fa fa-plus-circle  fa-sm fa-fw mr-2 text-white-400"></i>
                Add Ticket
              </button>
            <!-- <div class="wrapper position-relative"> -->
              <select class="custom-select mr-sm-2 mb-2 d-flex" id="ctgevent_id" name="event_id" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                  <option value="">Choose Events</option>
                  @foreach( $myevents as $myevent )
                  <option value="{{ $myevent->id }}" id="ctgE{{ $myevent->id }}">{{ $myevent->event_name }}</option>
                  @endforeach
              </select>
            <!-- </div> -->
          </form>
          <!-- <br> -->

          <!-- content table ticket -->
          <div class="row">
            <table class="table table-hover table-responsive-lg" id="tTicket">
              <thead>
                <tr class="text-dark">
                  <th scope="col">No</th>
                  <th scope="col">Ticket Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                  <!-- <th scope="col" class="detailTableEvent text-center d-none">Detail</th> -->
                </tr>
              </thead>
              <tbody id="tbody_ticket">
                @if($tickets->isEmpty() == false)
                  @foreach($tickets as $index => $ticket)
                  <tr>
                    <th scope="row">{{ $index +1 }}</th>
                    <td><a type="button" class="badge badge-light d_id_ticket" data-id="{{ $ticket->id }}" data-ticket_name="{{ $ticket->ticket_name }}" data-ctgt_id="{{ $ticket->ctgT_id }}" data-description="{{ $ticket->description }}" data-price="{{ $ticket->price }}" data-start_sale="{{ date('j F, Y', strtotime($ticket->start_sale)) }}" data-end_sale="{{ date('j F, Y', strtotime($ticket->end_sale)) }}" data-start_time="{!! date('H:i', strtotime($ticket->start_time)) !!}" data-end_time="{!! date('H:i', strtotime($ticket->end_time)) !!}" data-ticket_photo="{{ $ticket->ticket_photo }}" data-quantity="{{ $ticket->quantity }}" data-status="{{ $ticket->status }}"  data-category_ticket="{{ $ticket->Category_Ticket }}" data-event_id="{{ $ticket->event_id }}" title="She Details Ticket" data-toggle="modal" data-target="#detailTicketModal">{{ $ticket->ticket_name }}</a></td>
                    <td>{{ $ticket->Category_Ticket }}</td>
                    <td>Rp. {{ $ticket->price }}</td>
                    <td>{{ $ticket->quantity }}</td>
                    @if($ticket->status == "waiting")
                    <td><p class="badge badge-warning">{{ $ticket->status }}</p></td>
                    @elseif($ticket->status == "available")
                    <td><p class="badge badge-success">{{ $ticket->status }}</p></td>
                    @elseif($ticket->status == "disable")
                    <td><p class="badge badge-secondary">{{ $ticket->status }}</p></td>
                    @elseif($ticket->status == "rejected")
                    <td><p class="badge badge-danger">{{ $ticket->status }}</p></td>
                    @endif
                    <td>
                      <div class="row">
                        <div class="col-2 mx-1 my-1"> 
                          <button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket">
                            <span class="fa fa-cogs">
                          </button>
                          <div class="dropdown-menu">
                            @if($ticket->status == "available")
                            <a class="dropdown-item disableTicket" href="{{ url('/eo_ticket/'.$ticket->id.'/disable') }}">Disable Ticket</a>
                            @elseif($ticket->status == "disable")
                            <a class="dropdown-item enableTicket" href="{{ url('/eo_ticket/'.$ticket->id.'/enable') }}">Enable Ticket</a>
                            @endif
                            <form action="{{ url('/eo_ticket/'.$ticket->id.'/destroy') }}" method="post">
                              @method('delete')
                              @csrf
                              <button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button>
                            </form>
                          </div>
                        </div> 
                        <div class="col-2 mx-1 my-1">  
                          <form action="" method="post" class="form-sm">
                            @method('patch')
                            @csrf
                            <button type="button" class="btn btn-primary py-0 editTicket" data-id="{{ $ticket->id }}" data-ticket_name="{{ $ticket->ticket_name }}" data-ctgt_id="{{ $ticket->ctgT_id }}" data-description="{{ $ticket->description }}" data-price="{{ $ticket->price }}" data-start_sale="{{ $ticket->start_sale }}" data-end_sale="{{ $ticket->end_sale }}" data-start_time="{!! date('H:i', strtotime($ticket->start_time)) !!}" data-end_time="{!! date('H:i', strtotime($ticket->end_time)) !!}" data-ticket_photo="{{ $ticket->ticket_photo }}" data-quantity="{{ $ticket->quantity }}" data-status="{{ $ticket->status }}"  data-category_ticket="{{ $ticket->Category_Ticket }}" data-event_id="{{ $ticket->event_id }}" data-toggle="modal" data-target="#editTicketModal" title="Edit Ticket"><span class="fa fa-pencil"></span></button>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
          
          {{--
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('assets2/img/undraw_posting_photo.svg') }}" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>

            </div>
          </div>
          --}}

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika anda keluar maka aktivitas anda akan di akhiri.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Detail Ticket Modal-->
  <div class="modal fade" id="detailTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ticket_title"> - </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label for="">Start/End Sale</label><label for=""></label> : <label for="" id="d_start_sale"></label>
            </div>
            <div class="col-md-6">
              <label for="">Start/End Time</label><label for=""></label> : <label for="" id="d_start_time"></label>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <label for="">Description</label><label for=""></label> : <label for="" id="d_description"></label>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2">
              <label for="" class="d-block">Ticket Photo</label>
            </div>
            <div class="col-md-8 text-center">
              <img src="" alt="" id="d_ticket_photo" style="width: 20rem;">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Ticket Modal-->
  <div class="modal fade" id="addTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Ticket</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{-- url('/d_balita') --}}" method="post" enctype="multipart/form-data" id="postTicket" autocomplete="off">
            @method('post')
            @csrf
            <div class="row">
              <div class="col-md-4 from-group">
                <label for="event_id">Choice Your Events</label>
                <select class="form-control @error('event_id') is-invalid @enderror" id="event_id" name="event_id">
                    @foreach( $myevents as $myevent )
                    <option value="{{ $myevent->id }}">{{ $myevent->event_name }}</option>
                    @endforeach
                </select>
                @error('ctgT_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4 from-group">
                <label for="ticket_name">Ticket Name</label>
                <input type="text" id="ticket_name" name="ticket_name" class="form-control" placeholder="Enter your Ticket name...">
              </div>
              <div class="col-md-4 from-group">
                <label for="ctgT_id">Category Ticket</label>
                <select class="form-control @error('ctgT_id') is-invalid @enderror" id="ctgT_id" name="ctgT_id">
                    @foreach( $category_tickets as $ctgticket )
                    <option value="{{ $ctgticket->id }}">{{ $ctgticket->name_category }}</option>
                    @endforeach
                </select>
                @error('ctgT_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3 form-group">
                <label for="start_sale">Start Sale</label>
                <input type="date" id="start_sale" name="start_sale" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="end_sale">End Sale</label>
                <input type="date" id="end_sale" name="end_sale" class="form-control" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="start_time">Start Time</label>
                <input type="time" id="start_time" name="start_time" class="form-control" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="end_time">End Time</label>
                <input type="time" id="end_time" name="end_time" class="form-control" placeholder="Enter your Event name...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="price" class="">Price</label>
                <div class="wrapper" style="position:relative;">
                  <input class="form-control" type="text" name="price" style="padding-left: 38px;">
                  <span class="" style="left:6px;top:6px;position:absolute;">Rp.</span>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <label for="quantity" class="">Quantity</label>
                <input class="form-control" type="number" min="0" name="quantity">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="description">Description</label>
                <textarea id="description" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Write the description for event..."></textarea>
              </div>
            </div>
            <h6 for="ticket_photo" class="">Ticket Photo</h6>
            <div class="row">
              <div class="col-md-12 form-group picture picture-container">
                <img src="{{ asset('assets3/validating-ticket.png') }}" class="picture-src d-flex" style="width: 28rem" id="wizardPicturePreview" title="">
                <input type="file" id="wizard-picture" class="" name="ticket_photo" value="{{ old('ticket_photo') }}">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" value="submit" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Ticket Modal-->
  <div class="modal fade" id="editTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Ticket Test</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{--  --}}" enctype="multipart/form-data" method="post" autocomplete="off" id="patchTicket">
            @method('post')
            @csrf
            <div class="row">
              <div class="col-md-4 from-group">
                <label for="event_id">Choice Your Events</label>
                <select class="form-control" id="e_event_id" name="event_id">
                    @foreach( $myevents as $myevent )
                    <option value="{{ $myevent->id }}">{{ $myevent->event_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-4 from-group">
                <label for="ticket_name">Ticket Name</label>
                <input type="text" id="e_ticket_name" name="ticket_name" class="form-control" placeholder="Enter your Ticket name...">
              </div>
              <div class="col-md-4 from-group">
                <label for="ctgT_id">Category Ticket</label>
                <select class="form-control" id="e_ctgT_id" name="ctgT_id">
                    @foreach( $category_tickets as $ctgticket )
                    <option value="{{ $ctgticket->id }}">{{ $ctgticket->name_category }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3 form-group">
                <label for="start_sale">Start Sale</label>
                <input type="date" id="e_start_sale" name="start_sale" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="end_sale">End Sale</label>
                <input type="date" id="e_end_sale" name="end_sale" class="form-control" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="start_time">Start Time</label>
                <input type="time" id="e_start_time" name="start_time" class="form-control" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="end_time">End Time</label>
                <input type="time" id="e_end_time" name="end_time" class="form-control" placeholder="Enter your Event name...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="price" class="">Price</label>
                <div class="wrapper" style="position:relative;">
                  <input class="form-control" type="text" id="e_price" name="price" style="padding-left: 38px;">
                  <span class="" style="left:6px;top:6px;position:absolute;">Rp.</span>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <label for="quantity" class="">Quantity</label>
                <input class="form-control" id="e_quantity" type="text" name="quantity">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="description">Description</label>
                <textarea id="e_description" name="description" class="form-control" placeholder="Write the description for ticket..."></textarea>
              </div>
            </div>
            <h6 for="ticket_photo" class="">Ticket Photo</h6>
            <div class="row">
              <div class="col-md-12 form-group picture-container">
                <img src="" class="picture-src" style="width: 28rem" id="edit_wizardPicturePreview" title="">
                <input type="file" id="edit_wizard-picture" class="d-inline-block" name="ticket_photo">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" value="submit" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/lib/moment.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets2/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets2/vendor/chart.js/Chart.min.js') }}"></script>

  <script src="{{ asset('assets2/vendor/SweetAlert2/sweetalert2.js') }}"></script>

</body>

</html>

<script>
  $(document).ready(function () {
    $("#wizard-picture").change(function() {
      readURL(this);
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#edit_wizard-picture").change(function() {
      readURLEdit(this);
    });

    function readURLEdit(input) {
      // console.log(input);
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#edit_wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $('#ctgevent_id').on('click', function (event) {
      if($('#ctgevent_id').children("option:selected").text() != "Choose Events"){
        let ctgE_text = $('#ctgevent_id').children("option:selected").text();
        $('#title_ticket').text("Ticket Management - " + ctgE_text);

        $.ajax({
          url: "{{ url('/eo_ticket') }}" + "/" + $(this).children('option:selected').val() + "/detail",
          method: "get",
          cache: false,
          success: function(response) {
            appendString = "";
            $('#tbody_ticket').empty();
            let res = response.tickets;
            let data_total = 0, data_available = 0;
            $('#data_total').html(response.data_total);
            $('#div_sold_out').html(response.data_sold_out + ' %');
            $('#data_available').html(response.data_available);
            // console.log(res);
            if(res != null){
              // let index = 0;
              $.each(res, function (key, val) {
                // if(val.status == "available"){
                //   data_available += parseInt(val.quantity);
                // }
                // data_total += parseInt(val.quantity);
                // console.log(data_total);
                let start_sale = new Date(val.start_sale);
                let start_sale1 = moment(start_sale).format('DD MMMM, YYYY');
                let end_sale = new Date(val.end_sale);
                let end_sale1 = moment(end_sale).format('DD MMMM, YYYY');

                let start_time1 = moment(val.start_time, 'HH:mm:ss').format('HH:mm');
                let end_time1 = moment(val.end_time, 'HH:mm:ss').format('HH:mm');

                let drop = "";
                let badgeSt = "";
                if(val.status == "available"){
                  badgeSt = '<td><p class="badge badge-success">'+ val.status +'</p></td>';
                  drop = '<div class="col-2 mx-1 my-1"><button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket"><span class="fa fa-cogs"></span></button><div class="dropdown-menu"><a class="dropdown-item disableTicket" href="http://localhost:8000/eo_ticket/'+ val.id +'/disable">Disable Ticket</a><form action="http://localhost:8000/eo_ticket/'+ val.id +'/destroy" method="post"><input type="hidden" name="_method" value="delete">'+ '{{ csrf_field() }}' +'<button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button></form></div></div>';
                }else if(val.status == "disable"){
                  badgeSt = '<td><p class="badge badge-secondary">'+ val.status +'</p></td>';
                  drop = '<div class="col-2 mx-1 my-1"><button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket"><span class="fa fa-cogs"></span></button><div class="dropdown-menu"><a class="dropdown-item enableTicket" href="http://localhost:8000/eo_ticket/'+ val.id +'/enable">Enable Ticket</a><form action="http://localhost:8000/eo_ticket/'+ val.id +'/destroy" method="post"><input type="hidden" name="_method" value="delete">'+ '{{ csrf_field() }}' +'<button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button></form></div></div>';
                }else{
                  drop = '<div class="col-2 mx-1 my-1"><button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket"><span class="fa fa-cogs"></span></button><div class="dropdown-menu"><form action="http://localhost:8000/eo_ticket/'+ val.id +'/destroy" method="post"><input type="hidden" name="_method" value="delete">'+ '{{ csrf_field() }}' +'<button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button></form></div></div>';
                  if(val.status == "waiting"){
                    badgeSt = '<td><p class="badge badge-warning">'+ val.status +'</p></td>';
                  } else if(val.status == "rejected"){
                    badgeSt = '<td><p class="badge badge-danger">'+ val.status +'</p></td>';
                  }
                }

                appendString += '<tr><th scope="row">' + (key+1) + '</th><td><a type="button" class="badge badge-light d_id_ticket" data-id="'+ val.id +'" data-ticket_name="'+ val.ticket_name +'" data-ctgt_id="'+ val.ctgT_id +'" data-description="'+ val.description +'" data-price="'+ val.price +'" data-start_sale="'+ start_sale1 +'" data-end_sale="'+ end_sale1 +'" data-start_time="'+ start_time1 +'" data-end_time="'+ end_time1 +'" data-ticket_photo="'+ val.ticket_photo +'" data-quantity="'+ val.quantity +'" data-status="'+ val.status +'" data-category_ticket="'+ val.Category_Ticket +'" data-event_id="'+ val.event_id +'" title="She Details Ticket" data-toggle="modal" data-target="#detailTicketModal">'+ val.ticket_name +'</a></td><td>'+ val.Category_Ticket +'</td><td>Rp. '+ val.price +'</td><td>'+ val.quantity +'</td>'+ badgeSt +'<td><div class="row">'+ drop +'<div class="col-2 mx-1 my-1"><form action="" method="post" class="form-sm"><input type="hidden" name="_method" value="patch">' + '{{ csrf_field() }}' + '<button type="button" class="btn btn-primary py-0 editTicket" data-id="'+ val.id +'" data-ticket_name="'+ val.ticket_name +'" data-ctgt_id="'+ val.ctgT_id +'" data-description="'+ val.description +'" data-price="'+ val.price +'" data-start_sale="'+ start_sale1 +'" data-end_sale="'+ end_sale1 +'" data-start_time="'+ start_time1 +'" data-end_time="'+ end_time1 +'" data-ticket_photo="'+ val.ticket_photo +'" data-quantity="'+ val.quantity +'" data-status="'+ val.status +'" data-category_ticket="'+ val.Category_Ticket +'" data-event_id="'+ val.event_id +'" data-toggle="modal" data-target="#editTicketModal" title="Edit Ticket"><span class="fa fa-pencil"></span></button></form></div></div></td></tr>';

                  $('#tbody_ticket').empty().append(appendString);
              });

              // $('#data_total').html(data_total);
              // $('#data_available').html(data_available);
            }
            // console.log(res);
          },
          error: function(xhr) {
            let text = '';
            let res = '';
            res = xhr.responseJSON;
            console.log(res);
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
        });

      }else{
        $('#title_ticket').text("Ticket Management - All Events");

        $.ajax({
          url: "{{ route('eo_ticket.all') }}",
          method: "get",
          cache: false,
          success: function(response) {
            // console.log(response);
            appendString = "";
            $('#tbody_ticket').empty();
            let res = response.tickets;
            let data_total = 0, data_available = 0;
            $('#data_total').html(response.data_total);
            $('#div_sold_out').html(response.data_sold_out + ' %');
            $('#data_available').html(response.data_available);
            // // console.log(res);
            if(res != null){
              $.each(res, function (key, val) {
                let start_sale = new Date(val.start_sale);
                let start_sale1 = moment(start_sale).format('DD MMMM, YYYY');
                let end_sale = new Date(val.end_sale);
                let end_sale1 = moment(end_sale).format('DD MMMM, YYYY');

                let start_time1 = moment(val.start_time, 'HH:mm:ss').format('HH:mm');
                let end_time1 = moment(val.end_time, 'HH:mm:ss').format('HH:mm');

                let drop = "";
                if(val.status == "available"){
                  badgeSt = '<td><p class="badge badge-success">'+ val.status +'</p></td>';
                  drop = '<div class="col-2 mx-1 my-1"><button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket"><span class="fa fa-cogs"></span></button><div class="dropdown-menu"><a class="dropdown-item disableTicket" href="http://localhost:8000/eo_ticket/'+ val.id +'/disable">Disable Ticket</a><form action="http://localhost:8000/eo_ticket/'+ val.id +'/destroy" method="post"><input type="hidden" name="_method" value="delete">'+ '{{ csrf_field() }}' +'<button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button></form></div></div>';
                }else if(val.status == "disable"){
                  badgeSt = '<td><p class="badge badge-secondary">'+ val.status +'</p></td>';
                  drop = '<div class="col-2 mx-1 my-1"><button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket"><span class="fa fa-cogs"></span></button><div class="dropdown-menu"><a class="dropdown-item enableTicket" href="http://localhost:8000/eo_ticket/'+ val.id +'/enable">Enable Ticket</a><form action="http://localhost:8000/eo_ticket/'+ val.id +'/destroy" method="post"><input type="hidden" name="_method" value="delete">'+ '{{ csrf_field() }}' +'<button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button></form></div></div>';
                }else{
                  drop = '<div class="col-2 mx-1 my-1"><button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Ticket"><span class="fa fa-cogs"></span></button><div class="dropdown-menu"><form action="http://localhost:8000/eo_ticket/'+ val.id +'/destroy" method="post"><input type="hidden" name="_method" value="delete">'+ '{{ csrf_field() }}' +'<button class="dropdown-item deleteTicket" type="submit" value="submit">Delete Ticket</button></form></div></div>';
                  if(val.status == "waiting"){
                    badgeSt = '<td><p class="badge badge-warning">'+ val.status +'</p></td>';
                  } else if(val.status == "rejected"){
                    badgeSt = '<td><p class="badge badge-danger">'+ val.status +'</p></td>';
                  }
                }

                appendString += '<tr><th scope="row">' + (key+1) + '</th><td><a type="button" class="badge badge-light d_id_ticket" data-id="'+ val.id +'" data-ticket_name="'+ val.ticket_name +'" data-ctgt_id="'+ val.ctgT_id +'" data-description="'+ val.description +'" data-price="'+ val.price +'" data-start_sale="'+ start_sale1 +'" data-end_sale="'+ end_sale1 +'" data-start_time="'+ start_time1 +'" data-end_time="'+ end_time1 +'" data-ticket_photo="'+ val.ticket_photo +'" data-quantity="'+ val.quantity +'" data-status="'+ val.status +'" data-category_ticket="'+ val.Category_Ticket +'" data-event_id="'+ val.event_id +'" title="She Details Ticket" data-toggle="modal" data-target="#detailTicketModal">'+ val.ticket_name +'</a></td><td>'+ val.Category_Ticket +'</td><td>Rp. '+ val.price +'</td><td>'+ val.quantity +'</td>'+ badgeSt +'<td><div class="row">'+ drop +'<div class="col-2 mx-1 my-1"><form action="" method="post" class="form-sm"><input type="hidden" name="_method" value="patch">' + '{{ csrf_field() }}' + '<button type="button" class="btn btn-primary py-0 editTicket" data-id="'+ val.id +'" data-ticket_name="'+ val.ticket_name +'" data-ctgt_id="'+ val.ctgT_id +'" data-description="'+ val.description +'" data-price="'+ val.price +'" data-start_sale="'+ start_sale1 +'" data-end_sale="'+ end_sale1 +'" data-start_time="'+ start_time1 +'" data-end_time="'+ end_time1 +'" data-ticket_photo="'+ val.ticket_photo +'" data-quantity="'+ val.quantity +'" data-status="'+ val.status +'" data-category_ticket="'+ val.Category_Ticket +'" data-event_id="'+ val.event_id +'" data-toggle="modal" data-target="#editTicketModal" title="Edit Ticket"><span class="fa fa-pencil"></span></button></form></div></div></td></tr>';

                  $('#tbody_ticket').empty().append(appendString);
              });

              // $('#data_total').html(data_total);
              // $('#data_available').html(data_available);
            }
            // console.log(res);
          },
          error: function(xhr) {
            let text = '';
            let res = '';
            res = xhr.responseJSON;
            console.log(res);
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
        });
      }
      // console.log($(this).children('option:selected').val());
    });


    $('#addTicketModal').on('show.bs.modal', function (event) {
      if ($('#ctgevent_id').children("option:selected").val() != "") {
        let ctgE_id = $('#ctgevent_id').children("option:selected").val();
        let modal = $(this);
        modal.find(".modal-body #event_id option[value="+ctgE_id+"]").attr('selected', 'selected');
      }
    });

    $('#postTicket').on('submit', function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      $.ajax({
          url: "{{ route('ticketPostEo') }}",
          method: 'post',
          data: formData,

          // dataType: 'JSON',
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            window.location.href = "{{ route('ticketEo') }}";
          },
          error: function(xhr) {
            let text = '';
            let res = '';
            res = xhr.responseJSON;
            console.log(res);
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
    });

    var get_id;
    var url;
    $('#editTicketModal').on('show.bs.modal', function (event){

      // let classname = $('form.editEvent');
      let button = $(event.relatedTarget);
      let id = button.data('id');
      let ticket_name = button.data('ticket_name');
      let ctgT_id = button.data('ctgt_id');
      let description = button.data('description');
      let price = button.data('price');
      let start_sale = button.data('start_sale');
      let end_sale = button.data('end_sale');
      let start_time = button.data('start_time');
      let end_time = button.data('end_time');
      let ticket_photo = button.data('ticket_photo');
      let quantity = button.data('quantity');
      let event_id = button.data('event_id');

      let modal = $(this);

      modal.find('.modal-body #e_ticket_name').val(ticket_name);
      modal.find(".modal-body #e_ctgT_id option[value="+ctgT_id+"]").attr('selected', 'selected');
      modal.find('.modal-body #e_description').val(description);
      modal.find('.modal-body #e_price').val(price);
      modal.find('.modal-body #e_start_sale').val(start_sale);
      modal.find('.modal-body #e_end_sale').val(end_sale);
      modal.find('.modal-body #e_start_time').val(start_time);
      modal.find('.modal-body #e_end_time').val(end_time);
      modal.find('.modal-body #e_quantity').val(quantity);
      modal.find('.modal-body #edit_wizardPicturePreview').attr('src', ticket_photo);
      modal.find(".modal-body #e_event_id option[value="+event_id+"]").attr('selected', 'selected');

      let className = $('form.editTicket');

      url = "{{ URL::to('/eo_ticket') }}" + "/" + id + "/update";
      modal.find('.modal-body #patchTicket').attr('action', url);
      modal.find('.modal-body #edit_wizardPicturePreview').attr('src', "{{ asset('assets3/ticket_photo') }}" + "/" + ticket_photo);
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#edit_wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      // readURLEdit('#edit_wizardPicturePreview');
    });

    $('#patchTicket').on('submit', function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      $.ajax({
          url: $(this).prop('action'),
          method: 'post',
          data: formData,
          cache: false,
          // enctype: 'multipart/form-data',

          dataType: 'JSON',
          cache: false,
          contentType: false,
          processData: false,
          
          success: function(response) {
            // console.log(response);
            Swal.fire('Updated!', 'Your file has been uodated.', 'success').then(function(){
              location.reload();
            });
          },
          error: function(xhr) {
            let text = '';
            let res = '';
            res = xhr.responseJSON;
            console.log(res);
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
      // return false;
    });

    $('#detailTicketModal').on('show.bs.modal', function (event){
        let button = $(event.relatedTarget);
        let ticket_name = button.data('ticket_name');
        let description = button.data('description');
        let start_sale = button.data('start_sale');
        let end_sale = button.data('end_sale');
        let start_time = button.data('start_time');
        let end_time = button.data('end_time');
        let ticket_photo = button.data('ticket_photo');

        let modal = $(this);
        let url = "{{ asset('/assets3/ticket_photo') }}";

        modal.find('#ticket_title').html(ticket_name);
        modal.find('.modal-body #d_description').html(description);
        modal.find('.modal-body #d_start_sale').html(start_sale + "/" + end_sale);
        modal.find('.modal-body #d_start_time').html(start_time + "/" + end_time);
        modal.find('.modal-body #d_description').html(description);
        modal.find('.modal-body #d_ticket_photo').attr('src', url + "/" + ticket_photo);
    });
    
    

  });

$(document).on('click', '.disableTicket', function (e) {
  e.preventDefault();
  Swal.fire({
    title: 'Are You sure ?',
    text: "Disable this ticket ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Disable',
    cancelButtonText: 'Cancel'
  }).then((result) => {

    if (result.value) {
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: $(this).attr('href'),
          method: 'get',
          cache: false,

          success: function(response) {
            // console.log(response);
            Swal.fire('Disable!', 'Your ticket has been disable.', 'success').then(function(){
              location.reload();
            });
          },

          error: function(xhr) {
            res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
    }
  });
});

$(document).on('click', '.enableTicket', function (e) {
  e.preventDefault();
  Swal.fire({
    title: 'Are You sure ?',
    text: "Enable this ticket ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Enable',
    cancelButtonText: 'Cancel'
  }).then((result) => {

    if (result.value) {
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: $(this).attr('href'),
          method: 'get',
          cache: false,

          success: function(response) {
            // console.log(response);
            Swal.fire('Enable!', 'Your ticket has been enable.', 'success').then(function(){
              location.reload();
            });
          },

          error: function(xhr) {
            res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
    }
  });
});

$(document).on('click', '.deleteTicket', function (e) {
  e.preventDefault();

  Swal.fire({
    title: 'Are You sure ?',
    text: "Delete this ticket ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete',
    cancelButtonText: 'Cancel'
  }).then((result) => {

    if (result.value) {
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: $(this).parents('form').attr('action'),
          method: 'delete',
          cache: false,

          success: function(response) {
            console.log(response);
            Swal.fire('Deleted!', 'Your ticket has been deleted.', 'success').then(function(){
              location.reload();
            });
          },

          error: function(xhr) {
            res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
    }
  });
})
</script>
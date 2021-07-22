<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">

  <title>E-VENT - Dashboard - Event</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="{{ asset('assets2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets2/css/sb-admin-2.min.css') }}" rel="stylesheet">

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
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('eventEo') }}">
          <i class="fa fa-calendar-check-o"></i>
          <span>My Events</span></a>
      </li>

      <!-- Nav Item - Data Ticket -->
      <li class="nav-item">
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" id="search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
            <h1 class="h3 mb-0 text-gray-800">Event Management</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <button class="btn btn-success d-block" type="button" href="#" data-toggle="modal" data-target="#addEventModal">
            <i class="fa fa-plus-circle  fa-sm fa-fw mr-2 text-white-400"></i>
            Add Event
          </button>
          <br>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
              <table class="table table-hover table-responsive-lg" id="tEvent">
                <thead>
                  <tr class="text-dark">
                    <th scope="col">No</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col" class="detailTableEvent text-center d-none">Detail</th> -->
                  </tr>
                </thead>
                <tbody>
                  @if($myevents->isEmpty() == false)
                    @foreach($myevents as $index => $myevent)
                    <tr data-event_name="{{ $myevent->event_name }}" data-event_photo="{{ $myevent->event_photo }}" data-status="{{ $myevent->status }}" data-start_date="{{ $myevent->start_date }}" data-end_date="{{ $myevent->end_date }}" data-category_event="{{ $myevent->Category_Event }}" data-description="{{ $myevent->description }}" data-event_address="{{ $myevent->event_address }}" data-terms_condition="{{ $myevent->terms_condition }}" data-support_doc="{{ $myevent->support_doc }}" data-npwp="{{ $myevent->npwp }}">
                      <th scope="row">{{ ($myevents->currentPage() - 1) * $myevents->perPage() + $loop->iteration }}</th>
                      <td>{{ $myevent->event_name }}</td>
                      @if($myevent->status == "waiting")
                      <td><p class="badge badge-warning">{{ $myevent->status }}</p></td>
                      @elseif($myevent->status == "available")
                      <td><p class="badge badge-success">{{ $myevent->status }}</p></td>
                      @elseif($myevent->status == "disable")
                      <td><p class="badge badge-secondary">{{ $myevent->status }}</p></td>
                      @elseif($myevent->status == "rejected")
                      <td><p class="badge badge-danger">{{ $myevent->status }}</p></td>
                      @endif
                      <td>
                        <div class="row">
                          <div class="col-2 mx-1 my-1"> 
                            <button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Event">
                              <span class="fa fa-cogs">
                            </button>
                            <div class="dropdown-menu">
                              @if($myevent->status == "available")
                              <a class="dropdown-item disableEvent" href="{{ url('/eo_event/'.$myevent->id.'/disable') }}">Disable Event</a>
                              @elseif($myevent->status == "disable")
                              <a class="dropdown-item enableEvent" href="{{ url('/eo_event/'.$myevent->id.'/enable') }}">Enable Event</a>
                              @endif
                              <form action="{{ url('/eo_event/'.$myevent->id.'/destroy') }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="dropdown-item deleteEvent" type="submit" value="submit">Delete Event</button>
                              </form>
                            </div>
                          </div>
                          <div class="col-2 mx-1 my-1">  
                            <form action="{{ url('/eo_event/'.$myevent->id.'/update') }}" method="post" class="">
                              @method('patch')
                              @csrf
                              <button type="button" class="btn btn-primary py-0 editEvent" data-event_name="{{ $myevent->event_name }}" data-event_address="{{ $myevent->event_address }}" data-event_photo="{{ $myevent->event_photo }}" data-status="{{ $myevent->status }}" data-start_date="{{ $myevent->start_date }}" data-end_date="{{ $myevent->end_date }}" data-category_event="{{ $myevent->Category_Event }}" data-ctgE_id="{{ $myevent->ctgE_id }}" data-description="{{ $myevent->description }}" data-terms_condition="{{ $myevent->terms_condition }}" data-support_doc="{{ $myevent->support_doc }}" data-npwp="{{ $myevent->npwp }}" data-toggle="modal" data-target="#editEventModal" title="Edit Event"><span class="fa fa-pencil"></span></button>
                            </form>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              {{ $myevents->links() }}
            </div>
            <div class="col-lg-6">
              <!-- Content Row -->
              @if($myevents->isEmpty() == false)
              <div class="container">
                <div class="row justify-content-center" id="cardEventShow">
                  <div class="card-lg shadow mb-4" style="width: 30rem;">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary d-inline-block" id="d_event_name">
                        {{ $myevents[0]->event_name }}
                      </h6>
                      <h6 class="m-0 font-weight-bold text-primary d-inline-block float-right" id="d_ctg_event">
                        {{ $myevents[0]->Category_Event }}
                      </h6>
                      <div class="clear-fix"></div>
                    </div>
                    <div class="card-body">
                      <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-1 mb-2" id="d_event_photo" style="width: 25rem;" src="{{ asset('assets3/img/'.$myevents[0]->event_photo) }}" alt="">
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Start/End Date</label>
                        </div>
                        <div class="col-md-7">
                          <p id="d_date">: {{ $myevents[0]->start_date }} / {{ $myevents[0]->end_date }}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Location</label>
                        </div>
                        <div class="col-md-7">
                          <p id="d_event_address">: {{ $myevents[0]->event_address }}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Description</label>
                        </div>
                        <div class="col-md-7">
                          <p id="d_description">: {{ $myevents[0]->description }}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="description">T&C</label>
                        </div>
                        <div class="col-md-7">
                          <p id="d_tc">: {{ $myevents[0]->terms_condition }}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Support Doc</label>
                        </div>
                        <div class="col-md-7">
                          <a id="d_supprot_doc" href="{{ asset('assets3/doc/'.$myevents[0]->support_doc) }}">: {{ $myevents[0]->event_name }}</a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">NPWP</label>
                        </div>
                        <div class="col-md-7">
                          @if($myevents[0]->npwp == null)
                          <a id="d_npwp" href="#">: -</a>
                          @else
                          <a id="d_npwp" href="{{ asset('assets3/npwp/'.$myevents[0]->npwp) }}">: NPWP {{ $myevents[0]->event_name }}</a>
                          @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Status</label>
                        </div>
                        <div class="col-md-7" id="statusBadge">
                          @if($myevents[0]->status == "waiting")
                          :<p id="d_status" class="badge badge-warning"> {{ $myevents[0]->status }}</p>
                          @elseif($myevents[0]->status == "available")
                          :<p id="d_status" class="badge badge-success"> {{ $myevents[0]->status }}</p>
                          @elseif($myevents[0]->status == "disable")
                          :<p id="d_status" class="badge badge-secondary"> {{ $myevents[0]->status }}</p>
                          @elseif($myevents[0]->status == "rejected")
                          :<p id="d_status" class="badge badge-danger"> {{ $myevents[0]->status }}</p>
                          @endif
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>

          

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
          <h5 class="modal-title" id="exampleModalLabel">Are You Sure ?</h5>
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

  <!-- Add Event Modal-->
  <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{-- url('/d_balita') --}}" enctype="multipart/form-data"  method="" id="postEvent" autocomplete="off">
            @method('post')
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="event_name">Event Name</label>
                <input type="text" id="event_name" name="event_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-6 form-group">
                <label for="ctgE_id">Category</label>
                <select class="form-control @error('ctgE_id') is-invalid @enderror" id="ctgE_id" name="ctgE_id">
                    @foreach( $category_events as $ctgevent )
                    <option value="{{ $ctgevent->id }}">{{ $ctgevent->name_category }}</option>
                    @endforeach
                </select>
                @error('ctgE_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="start_date" class="">Start Date</label>
                <input class="form-control" type="date" name="start_date">
              </div>
              <div class="col-md-6 form-group">
                <label for="end_date" class="">End Date</label>
                <input class="form-control" type="date" name="end_date">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="event_address">Event Address</label>
                <textarea id="event_address" name="event_address" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Jl Jogjakarta"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="description">Description</label>
                <textarea id="description" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Write the description for event..."></textarea>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4 form-group">
                <label for="event_photo" class="">Event Photo</label>
                <input class="form-control" type="file" name="event_photo">
              </div>
              <div class="col-md-4 form-group">
                <label for="support_doc" class="">Support Document</label>
                <input class="form-control" type="file" name="support_doc">
              </div>
              <div class="col-md-4 form-group">
                <label for="npwp" class="">NPWP Company<sup class="text-danger text-sm">*if a formal event</sup></label>
                <input class="form-control" type="file" name="npwp">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="terms_condition">Terms and Condition</label>
                <textarea id="terms_condition" name="terms_condition" class="form-control" id="exampleFormControlInput1" placeholder="Write the terms_condition for event..."></textarea>
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

  <!-- Edit Event Modal-->
  <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Your Event</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{-- url('/d_balita') --}}" enctype="multipart/form-data" method="post" id="patchEvent" autocomplete="off">
            @csrf
            @method('post')
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="event_name">Event Name</label>
                <input type="text" id="e_event_name" name="event_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-6 form-group">
                <label for="ctgE_id">Category</label>
                <select class="form-control @error('ctgE_id') is-invalid @enderror" id="e_ctgE_id" name="ctgE_id">
                    @foreach( $category_events as $ctgevent )
                    <option value="{{ $ctgevent->id }}">{{ $ctgevent->name_category }}</option>
                    @endforeach
                </select>
                @error('ctgE_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="start_date" class="">Start Date</label>
                <input class="form-control" id="e_start_date" type="date" name="start_date">
              </div>
              <div class="col-md-6 form-group">
                <label for="end_date" class="">End Date</label>
                <input class="form-control" id="e_end_date" type="date" name="end_date">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="event_address">Event Address</label>
                <textarea id="e_event_address" name="event_address" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Jl Jogjakarta"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="description">Description</label>
                <textarea id="e_description" name="description" class="form-control" placeholder="Write the description for event..."></textarea>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="terms_condition">Terms and Condition</label>
                <textarea id="e_terms_condition" name="terms_condition" class="form-control" placeholder="Write the terms_condition for event..."></textarea>
              </div>
            </div>
            <h6 for="ticket_photo" class="">Event Photo</h6>
            <div class="row">
              <div class="col-md-12 form-group picture-container">
                <img src="" class="picture-src" style="width: 28rem" id="edit_wizardPicturePreview" title="">
                <input type="file" id="edit_wizard-picture" class="d-inline-block" name="event_photo">
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

  $("#edit_wizard-picture").change(function() {
    readURLEdit(this);
  });

  function readURLEdit(input) {
    // console.log(input);
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#edit_wizardPicturePreview').attr('src', e.target.result).fadeIn(1);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#postEvent').on('submit', function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      $.ajax({
          url: "{{ route('eventPostEo') }}",
          method: 'post',
          data: formData,

          // dataType: 'JSON',
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            window.location.href = "{{ route('eventEo') }}";
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

  $('#tEvent tr').on('click', function (event){

    try{
      let event_name = $(this).attr('data-event_name');
      let status = $(this).attr('data-status');
      let start_date = $(this).attr('data-start_date');
      let end_date = $(this).attr('data-end_date');
      let ctgE = $(this).attr('data-category_event');
      let description = $(this).attr('data-description');
      let event_address = $(this).attr('data-event_address');
      let terms_condition = $(this).attr('data-terms_condition');
      let support_doc = $(this).attr('data-support_doc');
      let event_photo = $(this).attr('data-event_photo');
      let npwp = $(this).attr('data-npwp');
      // let status = $(this).attr('data-status');
      // console.log(status);

      let url = "{{ asset('assets3') }}"

      $('#cardEventShow').find('.card-header h6#d_event_name').text(event_name);
      $('#cardEventShow').find('.card-header h6#d_ctg_event').text(ctgE);
      $('#cardEventShow').find('.card-body #d_date').text(": " + start_date + " / " + end_date);
      $('#cardEventShow').find('.card-body #d_description').text(": " + description);
      $('#cardEventShow').find('.card-body #d_event_address').text(": " + event_address);
      $('#cardEventShow').find('.card-body #d_tc').text(": " + terms_condition);
      $('#cardEventShow').find('.card-body #d_status').text(": " + status);
      
      $('#cardEventShow').find('.card-body #statusBadge').empty();
      if(status == "waiting"){
        $('#cardEventShow').find('.card-body #statusBadge').append(':<p id="d_status" class="badge badge-warning">'+ status +'</p>');
      }
      else if(status == "available"){
        $('#cardEventShow').find('.card-body #statusBadge').append(':<p id="d_status" class="badge badge-success">'+ status +'</p>');
      }
      else if(status == "disable"){
        $('#cardEventShow').find('.card-body #statusBadge').append(':<p id="d_status" class="badge badge-secondary">'+ status +'</p>');
      }
      else if(status == "rejected"){
        $('#cardEventShow').find('.card-body #statusBadge').append(':<p id="d_status" class="badge badge-danger">'+ status +'</p>');
      }

      $('#cardEventShow').find('.card-body #d_supprot_doc').text(": " + event_name).attr('href', url + "/doc/" +support_doc);
      $('#cardEventShow').find('.card-body #d_event_photo').attr('src', url + "/img/" +event_photo);

      if(npwp === ""){
        $('#cardEventShow').find('.card-body #d_npwp').text(": -").attr('href', "#");
      }else{
        $('#cardEventShow').find('.card-body #d_npwp').text(": NPWP " + event_name).attr('href', url + "/npwp/" +npwp);
      }
    } catch(error){
      console.log(error);
    }
  
  });

  // let get_id;
  $('#editEventModal').on('show.bs.modal', function (event){

    let button = $(event.relatedTarget);
    let event_name = button.data('event_name');
    let event_address = button.data('event_address');
    let event_photo = button.data('event_photo');
    let description = button.data('description');
    let start_date = button.data('start_date');
    let end_date = button.data('end_date');
    let ctgE_id = button.data('ctge_id');
    let terms_condition = button.data('terms_condition');

    let modal = $(this);
    let asset = "{{ asset('assets3') }}"

    modal.find('.modal-body #e_event_name').val(event_name);
    modal.find('.modal-body #e_event_address').val(event_address);
    modal.find('.modal-body #edit_wizardPicturePreview').attr('src', asset + "/img/" +event_photo);
    modal.find('.modal-body #e_description').val(description);
    modal.find('.modal-body #e_start_date').val(start_date);
    modal.find('.modal-body #e_end_date').val(end_date);
    modal.find(".modal-body #e_ctgE_id option[value="+ctgE_id+"]").attr('selected', 'selected');

    let className = $('form.editEvent');
    let url = $('.editEvent').parents(className).attr('action');

    modal.find('.modal-body #e_terms_condition').val(terms_condition);
    modal.find('.modal-body #patchEvent').attr('action', url);
    var reader = new FileReader();
      reader.onload = function(e) {
        $('#edit_wizardPicturePreview').attr('src', e.target.result);
      }
  });

  $('#patchEvent').on('submit', function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      $.ajax({
          url: $(this).attr('action'),
          method: 'post',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            Swal.fire('success!', 'Update success.', 'success').then(function(){
              location.reload();
            });
          },
          error: function(xhr) {
            let text = '';
            let res = '';
            res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
  });

  $('.disableEvent').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are You sure ?',
      text: "Disable this event ? ticket for this event will be disable.",
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
              Swal.fire('Disable!', 'Your event has been disable.', 'success').then(function(){
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

  $('.enableEvent').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are You sure ?',
      text: "Enable this event ? ticket for this event will be enable.",
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
              Swal.fire('Enable!', 'Your event has been enable.', 'success').then(function(){
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

  $('.deleteEvent').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
      title: 'Are You sure ?',
      text: "Delete this event ? ticket for this event will be deleted.",
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
              // console.log(response);
              Swal.fire('Deleted!', 'Your event has been deleted.', 'success').then(function(){
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

});
</script>

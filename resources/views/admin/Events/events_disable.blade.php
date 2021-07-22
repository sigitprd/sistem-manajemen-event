<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Super Admin - Events Disable</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin_index') }}">
        <div class="sidebar-brand-icon">
          <i class="fa fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Super Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin_index') }}">
          <i class="fa fa-tachometer"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesEo" aria-expanded="true" aria-controls="collapsePagesEo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Event Organizer</span>
        </a>
        <div id="collapsePagesEo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin_eo_waiting') }}">
              <i class="fas fa-fw fa-clock-o"></i>
              <span>Waiting</span>
            </a>
            <a class="collapse-item" href="{{ route('admin_eo_confirmed') }}">
              <i class="fas fa-fw fa-check"></i>
              <span>Confirmed</span>
            </a>
            <a class="collapse-item" href="{{ route('admin_eo_rejected') }}">
              <i class="fas fa-fw fa-times"></i>
              <span>Rejected</span>
            </a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesEvents" aria-expanded="true" aria-controls="collapsePagesEvents">
          <i class="fas fa-fw fa-folder"></i>
          <span>Events</span>
        </a>
        <div id="collapsePagesEvents" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin_events_waiting') }}">
              <i class="fas fa-fw fa-clock-o"></i>
              <span>Waiting</span>
            </a>
            <a class="collapse-item" href="{{ route('admin_events_available') }}">
              <i class="fas fa-fw fa-check"></i>
              <span>Available</span>
            </a>
            <a class="collapse-item" href="{{ route('admin_events_disable') }}">
              <i class="fas fa-fw fa-minus-circle"></i>
              <span>Disable</span>
            </a>
            <a class="collapse-item" href="{{ route('admin_events_rejected') }}">
              <i class="fas fa-fw fa-times"></i>
              <span>Rejected</span>
            </a>
          </div>
        </div>
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
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
                <a class="dropdown-item" href="{{ url('/profile_admin') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
            <h1 class="h3 mb-0 text-gray-800">Events Disable</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
              <table class="table table-hover table-responsive-lg" id="tEvent">
                <thead>
                  <tr class="text-dark">
                    <th scope="col">No</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">EO Name</th>
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
                      <td>{{ $myevent->name_eo }}</td>
                      <td><p class="badge badge-secondary">{{ $myevent->status }}</p></td>
                      <td>
                        <div class="row">
                          <div class="col-2 mx-1 my-1"> 
                            <button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Event">
                              <span class="fa fa-cogs">
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item enableEvent" href="{{ url('/admin_events/disable/'.$myevent->id.'/enable') }}">Enable Event</a>
                              <form action="{{ url('/admin_events/disable/'.$myevent->id.'/destroy') }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="dropdown-item deleteEvent" type="submit" value="submit">Delete Event</button>
                              </form>
                            </div>
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
    <i class="fas fa-angle-up"></i>
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
        <div class="modal-body">If you leave, your activity will be end.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
        </div>
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
  <script src="{{ asset('assets/lib/moment.js') }}"></script>

  <script src="{{ asset('assets2/vendor/SweetAlert2/sweetalert2.js') }}"></script>

</body>

</html>

<script>
$(document).ready(function () {

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

  $('.deleteEvent').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are You sure ?',
      text: "Delete this event ? ticket for this event will be delete.",
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
            data: $(this).parents('form').serialize(),
            cache: false,

            success: function(response) {
              Swal.fire('Deleted!', 'This event has been deleted.', 'success').then(function(){
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
  });

});
</script>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-VENT - Dashboard</title>

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
      <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Your Profile</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row Akun -->
          <div class="row">

            <!-- Content Column -->
            <div class="container justify-content-center d-flex">

             <!-- Project Card Example -->
            <!-- <div class="row justify-content-center"> -->
              <!-- <div class="container justify-content-center"> -->
                <div class="card-sm shadow mb-4 w-75">
                  <!-- <div class="card"> -->
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile Event Organizer</h6>
                  </div>
                  <div class="card-body">
                    <form action="{{ url('/eo_profile/'.$eo->id.'/update_p_eo') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label for="name_eo" class="bmd-label-floating">EO Name</label>
                                <input type="text" id="name_eo" name="name_eo" class="form-control @error('name_eo') is-invalid @enderror" value="{{ old('name_eo', $eo->name_eo) }}" required>
                                @error('name_eo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="phone_number_eo" class="bmd-label-floating">Phone Number Eo</label>
                                <input type="text" id="phone_number_eo" name="phone_number_eo" class="form-control @error('phone_number_eo') is-invalid @enderror" value="{{ old('phone_number_eo', $eo->phone_number_eo) }}" required>
                                @error('phone_number_eo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="address_eo" class="bmd-label-floating">Address</label>
                            <textarea rows="5" type="text" id="address_eo" name="address_eo" class="form-control @error('address_eo') is-invalid @enderror" value="{{ old('address_eo') }}" required>{{ old('address_eo', $eo->address_eo) }}</textarea>
                            @error('address_eo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="identity_card_eo" class="bmd-label-floating">Identity Card</label>
                            <div class="text-center">
                              <img class="img-fluid px-3 px-sm-4 mt-1 mb-2" id="edit_wizardPicturePreview" style="width: 25rem;" src="{{ asset('assets3/identity_card/'.$eo->identity_card_eo) }}" alt="">
                            </div>
                            <div class="text-center">
                              <input type="file" class="@error('identity_card_eo') is-invalid @enderror" id="edit_wizard-picture" name="identity_card_eo">
                            </div>
                            @error('identity_card_eo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary float-right">Update Akun</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              <!-- </div> -->
            <!-- </div> -->

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
          $('#edit_wizardPicturePreview').attr('src', e.target.result).fadeIn();
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  })
</script>

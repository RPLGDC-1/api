@php
  $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="{{ url('images/logo-white.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('images/logo-white.png') }}" type="image/x-icon" />
    <title>{{ "DuniaBelanja" }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    {{-- Icons --}}
    <link href="{{ url('/icons/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/date-picker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/photoswipe.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/bootstrap.css') }}" />
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link id="color" rel="stylesheet" href="{{ url('/css/color-1.css') }}" media="screen" />
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.css') }}" />

    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />

    <style>
      .cursor-pointer {
        cursor: pointer;
      }
    </style>
    @yield('css')
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader">
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-ball"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
              <a href="index.html"><img class="img-fluid" src="{{  url('images/logo-white.png') }}" alt="" /></a>
            </div>
            <div class="toggle-sidebar">
              <div class="status_toggle sidebar-toggle d-flex">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg>
              </div>
            </div>
          </div>
          <div class="left-side-header col ps-0 d-none d-md-block">
          </div>
          <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <div class="media profile-media">
                  <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->name }} ({{ $user->type }})</span>
                  </a>
                </div>
                <ul class="profile-dropdown onhover-show-div" style="left: auto;">
                  {{-- <li>
                    <a class="dropdown-item" href="{{ route('admin.users.profile') }}">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                  </li> --}}
                  <li>
                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
              <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
              <div class="ProfileCard-details">
                <div class="ProfileCard-realName">Indra Mahesa</div>
              </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
          </script>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper d-flex align-items-center">
              <a href="index.html"><img class="img-fluid for-light rounded" src="{{ url('images/logo-white.png') }}" alt="" /><img class="img-fluid for-dark" src="../assets/images/logo/small-white-logo.png" alt="" /></a>
              <h4 class="mt-2 mx-2">{{ "DuniaBelanja" }}</h4>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            </div>
            <div class="logo-icon-wrapper">
              <a href="index.html"><img class="img-fluid" src="{{ url('/assets/images/logo-icon.png') }}" alt="" /></a>
            </div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn">
                    <a href="index.html"><img class="img-fluid" src="{{ url('/assets/images/logo-icon.png') }}" alt="" /></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"> </i></div>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav {{ request()->path() == 'dashboard' ? 'active' : '' }}" href="">
                      <i class="fa-light fa-house fa-fw fa-lg"></i>
                      <span class="mx-2">Dashboard</span>
                    </a>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ in_array(request()->segment(2), ['users', 'profile']) ? 'active' : '' }}" href="#">
                      <i class="fa-light fa-images-user fa-fw fa-lg"></i>
                      <span class="mx-2">Manajemen User</span>
                    </a>
                    <ul class="sidebar-submenu" style="{{ in_array(request()->segment(2), ['users', 'profile']) ? 'display: block;' : 'display: none;' }}">
                      @can('user.user')
                        <li><a class="{{ request()->segment(2) == 'users' && request()->segment(3) == 'users' ? 'active' : '' }}" href="{{ route('admin.users.users.index') }}">Data Admin</a></li>
                      @endcan
                      @can('user.role')
                        <li><a class="{{ request()->segment(2) == 'users' && request()->segment(3) == 'roles' ? 'active' : '' }}" href="{{ route('admin.users.roles.index') }}">Hak Akses</a></li>
                      @endcan
                      @can('user.permission')
                        <li><a class="{{ request()->segment(2) == 'users' && request()->segment(3) == 'permissions' ? 'active' : '' }}" href="{{ route('admin.users.permissions.index') }}">Level</a></li>
                      @endcan
                      <li><a class="{{ request()->segment(2) == 'profile' ? 'active' : '' }}" href="{{ route('admin.users.profile') }}">Profile</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright {{ date('Y') }} © DuniaBelanja</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    @yield('modal')

    <!-- Logout Modal -->
    <form method="GET" action="{{ route('logout') }}">
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Logout?</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin keluar dari akun ini?</div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Logout</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- latest jquery-->
    <script src="{{ url('/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ url('/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ url('/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ url('/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ url('/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ url('/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ url('/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ url('/js/sidebar-menu.js') }}"></script>
    <script src="{{ url('/js/notify/bootstrap-notify.min.js') }}"></script>
    {{-- <script src="{{ url('/js/dashboard/default.js') }}"></script> --}}
    <script src="{{ url('/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ url('/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ url('/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ url('/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ url('/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ url('/js/photoswipe/photoswipe.js') }}"></script>
    <script src="{{ url('/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ url('/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ url('/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ url('/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ url('/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ url('/js/height-equal.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Daterange picker-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{ url('vendor/datetime-picker/datetime-picker.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="{{ url('/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
      $('.dataTable').DataTable();
    </script>
    <script>
      function formatPrice(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
    </script>
    <script src="{{ url('vendor/autonumeric/autonumeric.min.js') }}"></script>
    <script>
      AutoNumeric.multiple('.numeric', { digitGroupSeparator: '.', decimalCharacter: ',', decimalPlaces: '0', unformatOnSubmit: true });
    </script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ url('/js/script.js') }}"></script>
    <script src="{{ url('/js/theme-customizer/customizer.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    @include('components.izitoast')
    @yield('script')
  </body>
</html>


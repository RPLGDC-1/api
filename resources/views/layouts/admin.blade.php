<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="{{ url('/images/logo.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('/images/logo.png') }}" type="image/x-icon" />
    <title>DuniaBelanja</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/font-awesome.css') }}" />
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/icofont.css') }}" />
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/themify.css') }}" />
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/flag-icon.css') }}" />
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/feather-icon.css') }}" />
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/scrollbar.css') }}" />
    @yield('css')
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/bootstrap.css') }}" />
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link id="color" rel="stylesheet" href="{{ url('/css/color-1.css') }}" media="screen" />
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.css') }}" />
  </head>
  <body>
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
              <a href="index.html"><img class="img-fluid" src="{{ url('/images/logo.png') }}" alt="" /></a>
            </div>
            <div class="toggle-sidebar">
              <div class="status_toggle sidebar-toggle d-flex">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
              <li>
                <div class="mode animated backOutRight">
                  <svg class="lighticon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <g>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1377 13.7902C19.2217 14.8742 16.3477 21.0542 10.6517 21.0542C6.39771 21.0542 2.94971 17.6062 2.94971 13.3532C2.94971 8.05317 8.17871 4.66317 9.67771 6.16217C10.5407 7.02517 9.56871 11.0862 11.1167 12.6352C12.6647 14.1842 17.0537 12.7062 18.1377 13.7902Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </g>
                  </svg>
                  <svg class="darkicon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z"></path>
                    <path d="M18.3117 5.68834L18.4286 5.57143M5.57144 18.4286L5.68832 18.3117M12 3.07394V3M12 21V20.9261M3.07394 12H3M21 12H20.9261M5.68831 5.68834L5.5714 5.57143M18.4286 18.4286L18.3117 18.3117" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
              </li>
              <li class="maximize">
                <a class="text-dark" href="#" onclick="javascript:toggleFullScreen(); javascript:void(0)">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <g>
                        <path d="M2.99609 8.71995C3.56609 5.23995 5.28609 3.51995 8.76609 2.94995" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8.76616 20.99C5.28616 20.41 3.56616 18.7 2.99616 15.22L2.99516 15.224C2.87416 14.504 2.80516 13.694 2.78516 12.804" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21.2446 12.804C21.2246 13.694 21.1546 14.504 21.0346 15.224L21.0366 15.22C20.4656 18.7 18.7456 20.41 15.2656 20.99" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.2661 2.94995C18.7461 3.51995 20.4661 5.23995 21.0361 8.71995" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </g></svg
                ></a>
              </li>
              <li class="profile-nav onhover-dropdown pe-0 py-0 me-0">
                <div class="media profile-media">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <g>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55851 21.4562C5.88651 21.4562 2.74951 20.9012 2.74951 18.6772C2.74951 16.4532 5.86651 14.4492 9.55851 14.4492C13.2305 14.4492 16.3665 16.4342 16.3665 18.6572C16.3665 20.8802 13.2505 21.4562 9.55851 21.4562Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55849 11.2776C11.9685 11.2776 13.9225 9.32356 13.9225 6.91356C13.9225 4.50356 11.9685 2.54956 9.55849 2.54956C7.14849 2.54956 5.19449 4.50356 5.19449 6.91356C5.18549 9.31556 7.12649 11.2696 9.52749 11.2776H9.55849Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.8013 10.0789C18.2043 9.70388 19.2383 8.42488 19.2383 6.90288C19.2393 5.31488 18.1123 3.98888 16.6143 3.68188" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.4608 13.6536C19.4488 13.6536 21.1468 15.0016 21.1468 16.2046C21.1468 16.9136 20.5618 17.6416 19.6718 17.8506" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </g>
                  </svg>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li>
                    <a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a>
                  </li>
                  <li>
                    <a href="login.html"><i data-feather="log-out"> </i><span>Log out</span></a>
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
            <div class="logo-wrapper">
              <h2 class="text-lg mx-2 mt-2">Dunia Belanja</h2>
            </div>
            <div class="logo-icon-wrapper">
              <a href="index.html"><img class="img-fluid" src="{{ url('/images/logo-icon.png') }}" alt="" /></a>
            </div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn">
                    <a href="index.html"><img class="img-fluid" src="{{ url('/images/logo-icon.png') }}" alt="" /></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"> </i></div>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g>
                            <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g></svg>
                      <span class="">Dashboard</span>
                    </a>
                  </li>
                  @canany(['product', 'category'])
                    <li class="sidebar-list">
                      <a class="sidebar-link sidebar-title active" href="javascript:void(0)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.75024 12C2.75024 5.063 5.06324 2.75 12.0002 2.75C18.9372 2.75 21.2502 5.063 21.2502 12C21.2502 18.937 18.9372 21.25 12.0002 21.25C5.06324 21.25 2.75024 18.937 2.75024 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M15.2045 13.8999H15.2135" stroke="#130F26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M12.2045 9.8999H12.2135" stroke="#130F26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.19557 13.8999H9.20457" stroke="#130F26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                          </g></svg
                        ><span> Product</span></a
                      >
                      <ul class="sidebar-submenu" style="display: block">
                        @can('product')
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                        @endcan
                        @can('category')
                          <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        @endcan
                      </ul>
                    </li>
                  @endcan
                  @can('sales')
                    <li class="sidebar-list">
                      <a class="sidebar-link sidebar-title link-nav" href="{{ route('sales.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <g>
                              <path d="M7.4831 10.261V16.9547" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M12.0368 7.05737V16.9553" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M16.5158 13.7983V16.9552" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.30005 12.0369C2.30005 4.73479 4.73479 2.30005 12.0369 2.30005C19.339 2.30005 21.7737 4.73479 21.7737 12.0369C21.7737 19.339 19.339 21.7737 12.0369 21.7737C4.73479 21.7737 2.30005 19.339 2.30005 12.0369Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                          </g></svg
                        >
                        <span class="">Sales</span>
                      </a>
                    </li>
                  @endcan
                  @canany(['recent_order', 'popular_product'])
                    <li class="sidebar-list">
                      <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <g>
                              <path d="M14.3053 15.45H8.90527" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M12.2604 11.4387H8.90442" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1598 8.3L14.4898 2.9C13.7598 2.8 12.9398 2.75 12.0398 2.75C5.74978 2.75 3.64978 5.07 3.64978 12C3.64978 18.94 5.74978 21.25 12.0398 21.25C18.3398 21.25 20.4398 18.94 20.4398 12C20.4398 10.58 20.3498 9.35 20.1598 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M13.9342 2.83276V5.49376C13.9342 7.35176 15.4402 8.85676 17.2982 8.85676H20.2492" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                          </g></svg
                        ><span> Transactions</span></a
                      >
                      <ul class="sidebar-submenu">
                        @can('recent_order')
                        <li><a href="{{ route('recent_orders.index') }}">Recent Orders</a></li>
                        @endcan
                        @can('popular_product')
                          <li><a href="{{ route('product_populars.index') }}">Produk Terpopuler</a></li>
                        @endcan
                      </ul>
                    </li>
                  @endcan
                  @can('customer')
                    <li class="sidebar-list">
                      <a class="sidebar-link sidebar-title link-nav" href="{{ route('customers.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9724 20.3683C8.73343 20.3683 5.96643 19.8783 5.96643 17.9163C5.96643 15.9543 8.71543 14.2463 11.9724 14.2463C15.2114 14.2463 17.9784 15.9383 17.9784 17.8993C17.9784 19.8603 15.2294 20.3683 11.9724 20.3683Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9725 11.4488C14.0985 11.4488 15.8225 9.72576 15.8225 7.59976C15.8225 5.47376 14.0985 3.74976 11.9725 3.74976C9.84645 3.74976 8.12245 5.47376 8.12245 7.59976C8.11645 9.71776 9.82645 11.4418 11.9455 11.4488H11.9725Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M18.3622 10.3915C19.5992 10.0605 20.5112 8.93254 20.5112 7.58954C20.5112 6.18854 19.5182 5.01854 18.1962 4.74854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M18.9431 13.5444C20.6971 13.5444 22.1951 14.7334 22.1951 15.7954C22.1951 16.4204 21.6781 17.1014 20.8941 17.2854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M5.58372 10.3915C4.34572 10.0605 3.43372 8.93254 3.43372 7.58954C3.43372 6.18854 4.42772 5.01854 5.74872 4.74854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M5.00176 13.5444C3.24776 13.5444 1.74976 14.7334 1.74976 15.7954C1.74976 16.4204 2.26676 17.1014 3.05176 17.2854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                          </g></svg
                        >
                        <span class="">Customer</span>
                      </a>
                    </li>
                  @endcan
                  @canany(['admin', 'role', 'permission'])
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.92234 21.8083C6.10834 21.8083 2.85034 21.2313 2.85034 18.9213C2.85034 16.6113 6.08734 14.5103 9.92234 14.5103C13.7363 14.5103 16.9943 16.5913 16.9943 18.9003C16.9943 21.2093 13.7573 21.8083 9.92234 21.8083Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.92231 11.2159C12.4253 11.2159 14.4553 9.1859 14.4553 6.6829C14.4553 4.1789 12.4253 2.1499 9.92231 2.1499C7.41931 2.1499 5.38931 4.1789 5.38931 6.6829C5.38031 9.1769 7.39631 11.2069 9.89031 11.2159H9.92231Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M19.1313 8.12891V12.1389" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M21.1776 10.1338H17.0876" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g></svg
                      ><span> Admin</span></a
                    >
                    <ul class="sidebar-submenu">
                      @can('admin')
                      <li><a href="{{ route('admins.index') }}">Users Admin</a></li>
                      @endcan
                      @can('role')
                      <li><a href="{{ route('roles.index') }}">Role Management</a></li>
                      @endcan
                      @can('permission')
                      <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                      @endcan
                    </ul>
                  </li>
                  @endcanany
                  @can('payment_log')
                    <li class="sidebar-list">
                      <a class="sidebar-link sidebar-title link-nav" href="{{ route('paymentlogs.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2498 12C21.2498 17.108 17.1088 21.25 11.9998 21.25C6.89176 21.25 2.74976 17.108 2.74976 12C2.74976 6.891 6.89176 2.75 11.9998 2.75C17.1088 2.75 21.2498 6.891 21.2498 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M16.1906 12.7672L11.6606 12.6932V7.84619" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                          </g></svg
                        >
                        <span class="">Payment Logs</span>
                      </a>
                    </li>
                  @endcan
                  @can('setting')
                    <li class="sidebar-list">
                      <a class="sidebar-link sidebar-title link-nav" href="{{ route('settings.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <g>
                              <path d="M11.1437 17.8829H4.67114" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M15.205 17.8839C15.205 19.9257 15.8859 20.6057 17.9267 20.6057C19.9676 20.6057 20.6485 19.9257 20.6485 17.8839C20.6485 15.8421 19.9676 15.1621 17.9267 15.1621C15.8859 15.1621 15.205 15.8421 15.205 17.8839Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M14.1765 7.39439H20.6481" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1153 7.39293C10.1153 5.35204 9.43436 4.67114 7.39346 4.67114C5.35167 4.67114 4.67078 5.35204 4.67078 7.39293C4.67078 9.43472 5.35167 10.1147 7.39346 10.1147C9.43436 10.1147 10.1153 9.43472 10.1153 7.39293Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                          </g></svg
                        >
                        <span class="">Setting</span>
                      </a>
                    </li>
                  @endcan
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">@yield('content')</div>
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
    @yield('js')
    <script src="{{ url('/js/notify/bootstrap-notify.min.js') }}"></script>
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
    @include('components.alert')
  </body>
</html>

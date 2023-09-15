@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/animate.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/chartist.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/owlcarousel.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/prism.css') }}" />
@endsection

@section('js')
  <script src="{{ url('/js/chart/chartjs/chart.min.js') }}"></script>
  <script src="{{ url('/js/chart/chartist/chartist.js') }}"></script>
  <script src="{{ url('/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
  <script src="{{ url('/js/chart/apex-chart/apex-chart.js') }}"></script>
  <script src="{{ url('/js/chart/apex-chart/stock-prices.js') }}"></script>
  <script src="{{ url('/js/prism/prism.min.js') }}"></script>
  <script src="{{ url('/js/counter/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('/js/counter/jquery.counterup.min.js') }}"></script>
  <script src="{{ url('/js/counter/counter-custom.js') }}"></script>
  <script src="{{ url('/js/owlcarousel/owl.carousel.js') }}"></script>
  <script src="{{ url('/js/owlcarousel/owl-custom.js') }}"></script>
  <script src="{{ url('/js/dashboard/dashboard_2.js') }}"></script>
  <script src="{{ url('/js/tooltip-init.js') }}"></script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3>
            Dashboard</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid ecommerce-dash">
    <div class="row">
      <div class="col-xl-3 col-md-6 dash-xl-33 dash-lg-50">
        <div class="card sales-state">
          <div class="row m-0">
            <div class="col-12 p-0"> 
              <div class="card bg-primary">
                <div class="card-header card-no-border bg-primary"> 
                  <div class="media media-dashboard">
                    <div class="media-body"> 
                      <h5 class="mb-0 text-light">Sales Stats</h5>
                    </div>
                    <div class="icon-box"><i data-feather="more-horizontal"></i></div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div id="sales-state-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-4 p-0">
              <div class="sales-small-chart">
                <div class="card-body p-0 m-auto">
                  <div class="sales-small sales-small-1"></div>
                  <h6>300</h6><span>Watch Sale  </span>
                </div>
              </div>
            </div>
            <div class="col-4 p-0">
              <div class="sales-small-chart">
                <div class="card-body p-0 m-auto">
                  <div class="sales-small sales-small-2"></div>
                  <h6>1120</h6><span>Phone Sale</span>
                </div>
              </div>
            </div>
            <div class="col-4 p-0">
              <div class="sales-small-chart">
                <div class="card-body p-0 m-auto">
                  <div class="sales-small sales-small-3"></div>
                  <h6>530</h6><span>Tablet Sale </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-md-6 dash-xl-33 dash-lg-50">
        <div class="card pb-0 invoice-overviwe">                
          <div class="card-header card-no-border">
            <div class="header-top">
              <h5 class="m-0">Invoice Overview</h5>
              <div class="icon-box onhover-dropdown"><i data-feather="more-horizontal"></i>
                <div class="icon-box-show onhover-show-div">
                  <ul> 
                    <li> <a>
                        Today</a></li>
                    <li> <a>
                        Yesterday</a></li>
                    <li> <a>
                        Tommorow</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div id="invoice-overviwe-chart"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 dash-lgorder-1 dash-xl-33 dash-lg-50">
        <div class="card hot-selling">
          <div class="card-header card-no-border">
            <div class="header-top">
              <h5 class="m-0">Hot Selling Products</h5>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="table-responsive">        
              <table class="table table-bordernone">                          
                <tbody> 
                  @foreach ($hot_products as $row)
                    <tr>
                      <td>
                        <div class="media"><img class="img-fluid me-3 b-r-5" width="50" src="{{ $row->image }}" alt="">
                          <div class="media-body"><a href="product-page.html">
                              <h5>{{ $row->name }}</h5></a>
                            <p>{{ $row->sold }} Sales</p>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge badge-light-theme-light font-theme-light">Rp. {{ number_format($row->selling_price) }}</span></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-md-12 dash-xl-50 dash-lg-100 dash-39">
        <div class="card ongoing-project recent-orders">
          <div class="card-header card-no-border">
            <div class="media media-dashboard">
              <div class="media-body"> 
                <h5 class="mb-0">Recent Orders</h5>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="table-responsive">
              <table class="table table-bordernone">
                <thead> 
                  <tr> 
                    <th> <span>Product Name</span></th>
                    <th> <span>Customer</span></th>
                    <th> <span>Price  </span></th>
                    <th> <span>Quantity</span></th>
                    <th> <span>Status</span></th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach ($recent_orders as $row)
                    <tr>
                      <td>
                        <div class="media">
                          <div class="square-box me-2"><img class="img-fluid b-r-5" src="{{ $row->product->image }}" alt=""></div>
                          <div class="media-body ps-2">
                            <div class="avatar-details"><a href="product-page.html">
                              <h6>{{ $row->product->name }}</h6></a><span> Rp. {{ number_format($row->shipping_price) }} delivery</span></div>
                          </div>
                        </div>
                      </td>
                      <td class="img-content-box">
                        <h6>{{ $row->user->name }}</h6><span>{{ $row->user->email }}</span>
                      </td>
                      <td>
                        <h6>Rp. {{ number_format($row->subtotal) }}</h6>
                      </td>
                      <td> 
                        <h6>{{ $row->quantity }}</h6>
                      </td>
                      <td>
                        @if ($row->status == 'pending')
                          <div class="badge badge-light-secondary">Pending</div>
                        @elseif($row->status == 'success')
                          <div class="badge badge-light-primary">Done</div>
                        @elseif($row->status == 'cancel')
                          <div class="badge badge-light-danger">Rejected</div>
                        @else
                          <div class="badge badge-light-info">Expired</div>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 dash-xl-50 dash-29">
        <div class="card our-activities">
          <div class="card-header card-no-border">
            <div class="media media-dashboard">
              <div class="media-body"> 
                <h5 class="mb-0">Our Activities      </h5>
              </div>
              <div class="icon-box onhover-dropdown"><i data-feather="more-horizontal"></i>
                <div class="icon-box-show onhover-show-div">
                  <ul> 
                    <li> <a>
                        Latest </a></li>
                    <li> <a>
                        Earlist</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="table-responsive">
              <table class="table table-bordernone">                          
                <tbody> 
                  <tr>
                    <td>
                      <div class="media">
                        <div class="icon-wrappar"><i class="fa fa-trophy font-primary">                                    </i></div>
                        <div class="media-body"><a href="dashboard-02.html#">
                            <h5>Win best seller of the year awaed </h5></a>
                          <p>Company, San Francisco</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge badge-light-theme-light font-theme-light">1 day ago</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="icon-wrappar"><i class="fa fa-check-circle font-secondary">                                   </i></div>
                        <div class="media-body"><a href="dashboard-02.html#">
                            <h5>Apporved our product</h5></a>
                          <p>Elisse joson, San Francisco</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge badge-light-theme-light font-theme-light">2 weeks ago</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="icon-wrappar"><i class="fa fa-bookmark font-success">                                    </i></div>
                        <div class="media-body"><a href="dashboard-02.html#">
                            <h5>Win best seller of the year awaed </h5></a>
                          <p>Company, San Francisco</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge badge-light-theme-light font-theme-light">3 day ago</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="icon-wrappar"><i class="fa fa-shopping-basket font-warning">                                     </i></div>
                        <div class="media-body"><a href="dashboard-02.html#">
                            <h5>Apporved our product in checking</h5></a>
                          <p>35k Sales</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge badge-light-theme-light font-theme-light">2 hours ago</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 dash-xl-50 dash-32">
        <div class="card revenue-category">
          <div class="card-header card-no-border">
            <div class="media">
              <div class="media-body"> 
                <h5 class="mb-0">Revenue by Category</h5>
              </div>
              <div class="icon-box onhover-dropdown"><i data-feather="more-horizontal"></i>
                <div class="icon-box-show onhover-show-div">
                  <ul> 
                    <li> <a>
                        Done</a></li>
                    <li> <a>
                        Pending</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="donut-inner">
              <h5>16,349</h5>
              <h6>2,174 in pending</h6>
            </div>
            <div id="revenue-chart">            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
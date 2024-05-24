@extends('layouts.sellerMaster' )
@section('panel-seller.content')

<div class="main-panel">
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard template.</span>
        </h3>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
            <div class="row">
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Sales</p>
                                    <h2 class="text-white"> $8,753.<span class="h5">00</span>
                                    </h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                            </div>
                            <h6 class="text-white">18.33% Since last month</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Margin</p>
                                    <h2 class="text-white"> $5,300.<span class="h5">00</span>
                                    </h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                            </div>
                            <h6 class="text-white">13.21% Since last month</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Orders</p>
                                    <h2 class="text-white"> $1,753.<span class="h5">00</span>
                                    </h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                            </div>
                            <h6 class="text-white">67.98% Since last month</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                            <div class="card-body px-0 overflow-auto">
                                <h4 class="card-title pl-4">سفارش های در حال انجام</h4>
                                @if($orders->isEmpty())
                                    <p>سفارش در حال انجام نداریم فعلا ....</p>
                                @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <tr>
                                            <th>شماره سفارش</th>
                                            <th>وضعیت سفارش</th>
                                            <th>قیمت</th>
                                            <th>تاریخ ثبت</th>
                                            <th>تغیر وضعیت</th>
                                        </tr>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->price}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <form action="{{ route('order.changeStatus',$order['id']) }}" method="post">
                                                        @csrf
                                                       <select name="status">
                                                           <option value="در حال آماده سازی">در حال آماده سازی</option>
                                                           <option value="ارسال به مقصد">ارسال به مقصد</option>
                                                           <option value="تحویل گرفته شده">تحویل گرفته شده</option>
                                                       </select>
                                                        <input type="submit" name="submit">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {{$orders->links()}}
                                @endif
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-black">To do Task List</h4>
                    <p class="text-muted">Created by anonymous</p>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Meeting with Alisa </label>
                                    <span class="list-time">4 Hours Ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Create invoice </label>
                                    <span class="list-time">6 Hours Ago</span>
                                </div>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked /> Prepare for presentation </label>
                                    <span class="list-time">2 Hours Ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Pick up kids from school </label>
                                    <span class="list-time">8 Hours Ago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="add-items d-flex flex-wrap flex-sm-nowrap">
                        <input type="text" class="form-control todo-list-input flex-grow" placeholder="Add task name" />
                        <button class="add btn btn-primary font-weight-regular text-nowrap" id="add-task"> Add Task </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-black">Recent Customers</h4>
                    <p class="text-muted">All contacts</p>
                    <div class="row pt-2 pb-1">
                        <div class="col-12 col-sm-7">
                            <div class="row">
                                <div class="col-4 col-md-4">
                                    <img class="customer-img" src="assets/images/faces/face22.jpg" alt="" />
                                </div>
                                <div class="col-8 col-md-8 p-sm-0">
                                    <h6 class="mb-0">Cecelia Cooper</h6>
                                    <p class="text-muted font-12">05:58AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 pl-0">
                            <canvas id="areaChart1"></canvas>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-4 col-sm-4">
                                    <img class="customer-img" src="assets/images/faces/face25.jpg" alt="" />
                                </div>
                                <div class="col-8 col-sm-8 p-sm-0">
                                    <h6 class="mb-0">Victor Watkins</h6>
                                    <p class="text-muted font-12">05:28AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 pl-0">
                            <canvas id="areaChart2"></canvas>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-4 col-sm-4">
                                    <img class="customer-img" src="assets/images/faces/face15.jpg" alt="" />
                                </div>
                                <div class="col-8 col-sm-8 p-sm-0">
                                    <h6 class="mb-0">Ada Burgess</h6>
                                    <p class="text-muted font-12">05:57AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 pl-0">
                            <canvas id="areaChart3"></canvas>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-4 col-sm-4">
                                    <img class="customer-img" src="assets/images/faces/face5.jpg" alt="" />
                                </div>
                                <div class="col-8 col-sm-8 p-sm-0">
                                    <h6 class="mb-0">Dollie Lynch</h6>
                                    <p class="text-muted font-12">05:59AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 pl-0">
                            <canvas id="areaChart4"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-4 col-sm-4">
                                    <img class="customer-img" src="/assets/images/faces/face2.jpg" alt="" />
                                </div>
                                <div class="col-8 col-sm-8 p-sm-0">
                                    <h6 class="mb-0">Harry Holloway</h6>
                                    <p class="text-muted font-12 mb-0">05:13AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 pl-0">
                            <canvas id="areaChart5" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-black">Business Survey</h4>
                    <p class="text-muted pb-2">Jan 01 2019 - Dec 31 2019</p>
                    <canvas id="surveyBar"></canvas>
                    <div class="row border-bottom pb-3 pt-4 align-items-center mx-0">
                        <div class="col-sm-9 pl-0">
                            <div class="d-flex">
                                <img src="assets/images/dashboard/img_4.jpg" alt="" />
                                <div class="pl-2">
                                    <h6 class="m-0">Red Chair</h6>
                                    <p class="m-0">Home Decoration</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pl-0 pl-sm-3">
                            <div class="badge badge-inverse-success mt-3 mt-sm-0"> +7.7% </div>
                        </div>
                    </div>
                    <div class="row py-3 align-items-center mx-0">
                        <div class="col-sm-9 pl-0">
                            <div class="d-flex">
                                <img src="assets/images/dashboard/img_5.jpg" alt="" />
                                <div class="pl-2">
                                    <h6 class="m-0">Gray Sofa</h6>
                                    <p class="m-0">Home Decoration</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pl-0 pl-sm-3">
                            <div class="badge badge-inverse-success mt-3 mt-sm-0"> +7.7% </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 grid-margin stretch-card">
            <div class="card card-calender">
                <div class="card-body">
                    <div class="row pt-4">
                        <div class="col-sm-6">
                            <h1 class="text-white">10:16PM</h1>
                            <h5 class="text-white">Monday 25 October, 2016</h5>
                            <h5 class="text-white pt-2 m-0">Precipitation:50%</h5>
                            <h5 class="text-white m-0">Humidity:23%</h5>
                            <h5 class="text-white m-0">Wind:13 km/h</h5>
                        </div>
                        <div class="col-sm-6 text-sm-right pt-3 pt-sm-0">
                            <h3 class="text-white">Clear Sky</h3>
                            <p class="text-white m-0">London, UK</p>
                            <h3 class="text-white m-0">21°C</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <ul class="d-flex pl-0 overflow-auto">
                                <li class="weakly-weather-item text-white font-weight-medium text-center active">
                                    <p class="mb-0">TODAY</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">MON</p>
                                    <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">TUE</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">WED</p>
                                    <i class="mdi mdi-weather-fog"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">THU</p>
                                    <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">FRI</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">SAT</p>
                                    <i class="mdi mdi-weather-hail"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                                <li class="weakly-weather-item text-white font-weight-medium text-center">
                                    <p class="mb-0">SUN</p>
                                    <i class="mdi mdi-weather-cloudy"></i>
                                    <p class="mb-0">21<span class="symbol">°c</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
            <!--activity-->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
              <span class="d-flex justify-content-between">
                <span>Activity</span>
                <span class="dropdown dropleft d-block">
                  <span id="dropdownMenuButton1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span><i class="mdi mdi-dots-horizontal"></i></span>
                  </span>
                  <span class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item" href="#">Contact</a>
                    <a class="dropdown-item" href="#">Helpdesk</a>
                    <a class="dropdown-item" href="#">Chat with us</a>
                  </span>
                </span>
              </span>
                    </h4>
                    <ul class="gradient-bullet-list border-bottom">
                        <li>
                            <h6 class="mb-0"> It's awesome when we find a new solution </h6>
                            <p class="text-muted">2h ago</p>
                        </li>
                        <li>
                            <h6 class="mb-0">Report has been updated</h6>
                            <p class="text-muted">
                                <span>2h ago</span>
                                <span class="d-inline-block">
                    <span class="d-flex d-inline-block">
                      <img class="ml-1" src="assets/images/faces/face1.jpg" alt="" />
                      <img class="ml-1" src="assets/images/faces/face10.jpg" alt="" />
                      <img class="ml-1" src="assets/images/faces/face14.jpg" alt="" />
                    </span>
                  </span>
                            </p>
                        </li>
                        <li>
                            <h6 class="mb-0"> Analytics dashboard has been created#Slack </h6>
                            <p class="text-muted">2h ago</p>
                        </li>
                        <li>
                            <h6 class="mb-0"> It's awesome when we find a new solution </h6>
                            <p class="text-muted">2h ago</p>
                        </li>
                    </ul>
                    <a class="text-black mt-3 mb-0 d-block h6" href="#">View all <i class="mdi mdi-chevron-right"></i></a>
                </div>
            </div>
            <!--activity ends-->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 grid-margin stretch-card">
            <div class="card card-invoice">
                <div class="card-body">
                    <h4 class="card-title pb-3">Pending invoices</h4>
                    <div class="list-card">
                        <div class="row align-items-center">
                            <div class="col-7 col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <img src="/assets/images/faces/face2.jpg" alt="" />
                                    </div>
                                    <div class="col-sm-8 pr-0 pl-sm-0">
                                        <span>06 Jan 2019</span>
                                        <h6 class="mb-1 mb-sm-0">Isabel Cross</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 col-sm-4">
                                <div class="d-flex pt-1 align-items-center">
                                    <div class="reload-outer bg-info">
                                        <i class="mdi mdi-reload"></i>
                                    </div>
                                    <div class="dropdown dropleft pl-1 pt-3">
                                        <div id="dropdownMenuButton2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <p><i class="mdi mdi-dots-vertical"></i></p>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item" href="#">Sales</a>
                                            <a class="dropdown-item" href="#">Track Invoice</a>
                                            <a class="dropdown-item" href="#">Payment History</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-card">
                        <div class="row align-items-center">
                            <div class="col-7 col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <img src="/assets/images/faces/face3.jpg" alt="" />
                                    </div>
                                    <div class="col-sm-8 pr-0 pl-sm-0">
                                        <span>18 Mar 2019</span>
                                        <h6 class="mb-1 mb-sm-0">Carrie Parker</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 col-sm-4">
                                <div class="d-flex pt-1 align-items-center">
                                    <div class="reload-outer bg-primary">
                                        <i class="mdi mdi-reload"></i>
                                    </div>
                                    <div class="dropdown dropleft pl-1 pt-3">
                                        <div id="dropdownMenuButton3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <p><i class="mdi mdi-dots-vertical"></i></p>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <a class="dropdown-item" href="#">Sales</a>
                                            <a class="dropdown-item" href="#">Track Invoice</a>
                                            <a class="dropdown-item" href="#">Payment History</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-card">
                        <div class="row align-items-center">
                            <div class="col-7 col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <img src="assets/images/faces/face11.jpg" alt="" />
                                    </div>
                                    <div class="col-sm-8 pr-0 pl-sm-0">
                                        <span>10 Apr 2019</span>
                                        <h6 class="mb-1 mb-sm-0">Don Bennett</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 col-sm-4">
                                <div class="d-flex pt-1 align-items-center">
                                    <div class="reload-outer bg-warning">
                                        <i class="mdi mdi-reload"></i>
                                    </div>
                                    <div class="dropdown dropleft pl-1 pt-3">
                                        <div id="dropdownMenuButton4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <p><i class="mdi mdi-dots-vertical"></i></p>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                            <a class="dropdown-item" href="#">Sales</a>
                                            <a class="dropdown-item" href="#">Track Invoice</a>
                                            <a class="dropdown-item" href="#">Payment History</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-card">
                        <div class="row align-items-center">
                            <div class="col-7 col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <img src="/assets/images/faces/face3.jpg" alt="" />
                                    </div>
                                    <div class="col-sm-8 pr-0 pl-sm-0">
                                        <span>18 Mar 2019</span>
                                        <h6 class="mb-1 mb-sm-0">Carrie Parker</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 col-sm-4">
                                <div class="d-flex pt-1 align-items-center">
                                    <div class="reload-outer bg-info">
                                        <i class="mdi mdi-reload"></i>
                                    </div>
                                    <div class="dropdown dropleft pl-1 pt-3">
                                        <div id="dropdownMenuButton5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <p><i class="mdi mdi-dots-vertical"></i></p>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                            <a class="dropdown-item" href="#">Sales</a>
                                            <a class="dropdown-item" href="#">Track Invoice</a>
                                            <a class="dropdown-item" href="#">Payment History</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 grid-margin stretch-card">
            <!--datepicker-->
            <div class="card">
                <div class="card-body">
                    <div id="inline-datepicker" class="datepicker table-responsive"></div>
                </div>
            </div>
            <!--datepicker ends-->
        </div>
        <div class="col-xl-4 col-md-6 stretch-card grid-margin stretch-card">
            <!--browser stats-->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Browser stats</h4>
                    <div class="row py-2">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between pb-3 border-bottom">
                                <div>
                                    <img class="mr-2" src="assets/images/browser-logo/opera-logo.png" alt="" />
                                    <span class="p">opera mini</span>
                                </div>
                                <p class="mb-0">23%</p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between pb-3 border-bottom">
                                <div>
                                    <img class="mr-2" src="assets/images/browser-logo/safari-logo.png" alt="" />
                                    <span class="p">Safari</span>
                                </div>
                                <p class="mb-0">07%</p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between pb-3 border-bottom">
                                <div>
                                    <img class="mr-2" src="assets/images/browser-logo/chrome-logo.png" alt="" />
                                    <span class="p">Chrome</span>
                                </div>
                                <p class="mb-0">33%</p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between pb-3 border-bottom">
                                <div>
                                    <img class="mr-2" src="assets/images/browser-logo/firefox-logo.png" alt="" />
                                    <span class="p">Firefox</span>
                                </div>
                                <p class="mb-0">17%</p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img class="mr-2" src="assets/images/browser-logo/explorer-logo.png" alt="" />
                                    <span class="p">Explorer</span>
                                </div>
                                <p class="mb-0">05%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

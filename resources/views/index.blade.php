@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet"/>
    <!-- Maps css -->
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
   
    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بعودتك!</h2>
                <p class="mg-b-0">نتمى لك يوماً سعيداً.</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
           
            <a href="{{ url('patient/add') }}" class="btn btn-success">اضف مريض</a>
            <a href="{{ url('body/add') }}" class="btn btn-info">الجسم</a>
            <a href="{{ url('physical/add') }}" class="btn btn-primary">القياسات البدنية او الجسمية</a>
            <a href="{{ url('heightweight/add') }}" class="btn btn-warning">الطول والوزن</a>
                             
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">عدد الكشوفات</label>
                <h5> {{\App\Models\Booking::where('type', 'كشف')->count()}} </h5>
            </div>
            <div>
                <label class="tx-13">عدد الخدمات</label>
                <h5>{{\App\Models\Service::count()}}</h5>
            </div>
            <div>
                <label class="tx-13">عدد الاقسام</label>
                <h5>{{\App\Models\Department::count()}}</h5>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
   
@endsection
@section('content')
    <!-- row -->
    <form action="{{ url('search/patient') }}" method="get" id="search">
    <div class="col-lg-6 mg-t-20 mg-b-20 mg-lg-t-0">
        <div class="input-group">
            <input class="form-control" name="search" placeholder="البحث عن طريق رقم الملف  او رقم الهاتف او اسم المريض" type="text">
             <span class="input-group-btn">
                 <button class="btn btn-primary"  form="search"  type="submit">
                     <span class="input-group-btn"><i class="fa fa-search"></i></span>
                    </button></span>
        </div><!-- input-group -->
    </div><!-- col-4 -->
</form>
    <div class="row row-sm">
        
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد كشوفات اليوم</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{\App\Models\Booking::where('type', 'كشف')->whereDay('date', date('d'))->count()}}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">كشف</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد المتابعة اليوم</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{\App\Models\Booking::where('type', 'متابعة')->whereDay('date', date('d'))->count()}}

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">متابعة اليوم</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد الدكاترة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{\App\Models\Doctor::count()}}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">دكتور</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد المرضي</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{\App\Models\Patient::count()}}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">المرضى</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">احصائيات الكشف خلال السنة</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">احصئايات الكشف خلال هذا السنة تقرير شامل.</p>
                </div>
                <div class="card-body">
                    <div class="total-revenue">
                        <div>
                            <h4>{{\App\Models\Booking::where('type', 'كشف')->count()}}</h4>
                            <label><span class="bg-primary"></span>كشف</label>
                        </div>
                        <div>
                            <h4>{{\App\Models\Booking::where('type', 'متابعة')->count()}}</h4>
                            <label><span class="bg-warning"></span>متابعة</label>
                        </div>
                    </div>
                    <div id="bar" class="sales-bar mt-4"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">اخر مرضى تم اضافتهم</h3>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">

                        <?php
                        $patients = DB::table('patients')->orderBy('id', 'desc')->limit(5)->get();
                        ?>

                        @if($patients->count() > 0)
                            @foreach($patients as $patient)
                                <div class="list-group-item list-group-item-action" href="#">
                                    <div class="media mt-0">
                                        <img class="avatar-lg rounded-circle ml-3 my-auto"
                                             src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-0">
                                                    <h5 class="mb-1 tx-15">{{$patient->therapy}}</h5>
                                                    <p class="mb-0 tx-13 text-muted">رقم المريض: #1234 <span
                                                            class="text-success ml-2">
{{--                                                            @if ($patient->booking->type == 'كشف')--}}
                                                            {{--   <span class="text-success">كشف</span>--}}
                                                            {{--         @else--}}
                                                            {{--        <span class="text-warning">متابعة</span>--}}
                                                            {{--    @endif--}}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">اخر الحجوزات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">اخر الحجوزات التى تم اضافتها.</span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">التاريخ</th>
                            <th class="wd-lg-25p tx-right">الوقت</th>
                            <th class="wd-lg-25p tx-right">المريض</th>
                            <th class="wd-lg-25p tx-right">الخدمة</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $bookings = DB::table('bookings')->orderBy('id', 'desc')->limit(5)->get();
                        ?>

                        @if($bookings->count() > 0)
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{$booking->date}}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{$booking->time}}</td>
                                    <td class="tx-right tx-medium tx-inverse">
                                        {{--            {{$booking->patient->therapy}}--}}
                                    </td>
                                    <td class="tx-right tx-medium tx-danger">
                                        {{--       {{$booking->service->name}}--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row close -->

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('assets/js/index-dark.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection

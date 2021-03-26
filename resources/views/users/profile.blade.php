@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="d-flex my-xl-auto right-content">
			
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">

										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h2>الاسم:</h2>
												<h5 class="main-profile-name">{{$patient->name}}</h5>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">للتواصل:</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fas fa-phone"></i>
												</div>
												<div class="media-body">
													<span>رقم الهاتف:</span>
													<h1>{{$patient->phone}}</h1>
													<a href=""></a>
												</div>
											</div>
												<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fas fa-envelope-square"></i>
												</div>
												<div class="media-body">
													
													<span>البريد الاكترونى:</span>
													<h2>{{$patient->email}}</h2>
													<a href=""></a>
												</div>
											</div>
										</div>
										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-layers text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">عدد الكشوفات</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">{{$countbooking}}</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>جنية</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent">
												<i class="icon-paypal text-danger"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">مجموع الاموال</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">{{ $pricebooking }}</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-rocket text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">عدد المتابعة</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">0</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>متابعة</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> 
											<span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> 
											<span class="hidden-xs">الحجوزات</span> </a>
										</li>
										<li class="">
											<a href="#profile" data-toggle="tab" aria-expanded="false"> 
											<span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> 
											<span class="hidden-xs">الروشته</span> </a>

										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
								<div class="tab-pane active" id="home">
									@foreach($bookings as $booking)
										
											<h2 class="tx-15 text-uppercase mb-3">حاله المريض:</h2>
											<p class="m-b-5">{{$booking->status}}</p>	
										
											
											<h4 class="tx-15 text-uppercase mb-3">المدفوع:</h4>
											<p class="m-b-5"> {{ $booking->price }} </p>
										
											
											<h4 class="tx-15 text-uppercase mb-3">الوقت:</h4>
											<p class="m-b-5">{{$booking->time}}</p>
									
											<h4 class="tx-15 text-uppercase mb-3">الموعد:</h4>
											<p class="m-b-5">{{$booking->date}}</p>
									@endforeach	
									</div>										
									<div class="tab-pane" id="profile">
										@foreach($reports as $report)
											<h4 class="tx-15 text-uppercase mb-3">الملاحظات:</h4>
											<p class="m-b-5">{{$report->note}}</p>

											<h4 class="tx-15 text-uppercase mb-3">المعاد:</h4>
											<p class="m-b-5">{{$report->appointment}}</p>
										@endforeach	
									</div>
									</div>
								</div>
							</div>
					
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
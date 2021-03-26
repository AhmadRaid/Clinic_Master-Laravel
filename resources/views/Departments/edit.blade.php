@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">تعديل القسم</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
            {!! Form::open(['url'=>url('department/'.$department->id),'method'=>'put'])!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name',trans('اسم القسم',['class'=>'form-control-label col-sm-2']))!!}
                                    {!! Form::text('name',$department->name,['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('description',trans('الوصف',['class'=>'form-control-label col-sm-2']))!!}
                                    {!! Form::text('description',$department->description,['class'=>'form-control'])!!}
                                </div>
                            </div>       
                                    <br>
                                    <hr><!-- col-4 -->          
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])!!}
                            {!! Form::close()!!}
                          </div>
                        </div>


            </div>
        </div>
    </div>
</div>
<!-- row -->



@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection

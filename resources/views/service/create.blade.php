
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
                <h4 class="card-title mb-1">انشاء خدمة</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                {!! Form::open(['url'=>url('service')])!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name',trans('admin.name',['class'=>'form-control-label col-sm-2']))!!}
                                    {!! Form::text('name',old('name'),['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('description',trans('admin.description',['class'=>'form-control-label col-sm-2']))!!}
                                    {!! Form::textarea('des',null, ['class'=>"form-control mg-t-20",'id' => 'des', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p class="mg-b-10">القسم</p>
                                <select class="form-control select2-no-search" name="department_id">
                                    <option label="Choose one">
                                    </option>
                                    @foreach( $departments as $department)
                                    <option value="{{$department -> id }}">
                                        {{$department -> name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p class="mg-b-10">الدكتور</p>
                                <select class="form-control select2-no-search" name="doctor_id">
                                    <option label="Choose one">
                                    </option>
                                    @foreach( $doctors as $doctor)
                                    <option value="{{$doctor -> id }}">
                                        {{$doctor -> name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="detection_price" class="form-control-label col-sm-2">سعر الكشف</label>
                                    <input type="number" value="" class="form-control" name="detection_price">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="return_price" class="form-control-label col-sm-2">سعر الاعادة</label>
                                    <input type="number" value="" class="form-control" name="return_price">
                                </div>
                            </div>

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

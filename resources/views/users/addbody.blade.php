
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
    <div class="col-lg-12 col-xl-12 col-md-3 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">بيانات جسم المريض</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>

            <div class="card-body pt-0">
                {!! Form::open(['url'=>url('body/add')])!!}
                        <div class="row">
                            @if (!empty($user))
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label for="" class="form-control-label ">المريض</label>    
                                <input class="form-control" value="{{$user->name}}" disabled="disabled">
                                <input type="hidden" name="user_id" value="{{$user->id}}">                                                         
                            </div>                           
                            @else
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label for="" class="form-control-label ">المريض</label>                             
                                <select class="form-control select2-no-search" name="user_id">
                                    <option label="Choose one">
                                    </option>
                                    @foreach( $users as $user)
                                    <option value="{{$user -> id }}">
                                        {{$user -> name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            @endif
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">ضغط الدم</label>
                                    <input type="text" name="bloodPressure" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">نبضات الاقلب</label>
                                    <input type="text" name="heartBeats" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الحرارة</label>
                                    <input type="text" name="heat" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">معدل التنفس</label>
                                    <input type="text" name="respiratoryRate" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الانسولين</label>
                                    <input type="text" name="insulinRatio" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الوزن  كجم</label>
                                    <input type="text" name="weight" class="form-control">
                                </div>
                            </div>                         
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الطول سم</label>
                                    <input type="text" name="length"  class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">كتلة الجسم</label>
                                    <input type="text" name="mass" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">شكوي المريض</label>
                                    <textarea  name="PatientComplaint"  class="form-control" rows="3" cols="50"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">تشخيص المريض</label>
                                    <textarea  name="diagnosePatient"  class="form-control" rows="3" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">ملاحظات اخرى</label>
                                    <textarea  name="note"  class="form-control" rows="3" cols="50"></textarea>
                                </div>
                            </div>  
           
                                    <br>
                                    <hr><!-- col-4 -->          
                        <div class="col-xs-12 col-sm-12 col-md-3 text-center">
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

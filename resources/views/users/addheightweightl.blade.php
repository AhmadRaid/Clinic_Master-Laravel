
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
    <div class="col-lg-12 col-xl-12 col-md-2 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">الطول والوزن</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                {!! Form::open(['url'=>url('heightweight/add')])!!}
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
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الطول سم</label>
                                    <input type="text" name="length" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الوزن كجم</label>
                                    <input type="text" name="weight" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">نسبة الماء</label>
                                    <input type="text" name="waterRatio" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">نسبة الدهون</label>
                                    <input type="text" name="fatRatio" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">نسبة العضلات</label>
                                    <input type="text" name="muscleRatio" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">نسبة العظام</label>
                                    <input type="text" name="boneRatio" class="form-control">
                                </div>
                            </div>                         
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">وزن الدهون</label>
                                    <input type="text" name="fatWeight"  class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">وزن مثالى 1</label>
                                    <input type="text" name="idealWeightFirst" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">وزن مثالى 2</label>
                                    <input type="text" name="idealWeightSecond" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">BMI</label>
                                    <input type="text" name="bim" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">ك الماء المطلوب لتر</label>
                                    <input type="text" name="waterRequired" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">البروتين</label>
                                    <input type="text" name="proteinRequired" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الملح</label>
                                    <input type="text" name="salt" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">معدل الاحتراق</label>
                                    <input type="text" name="burnRate" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">Body Shape</label><br>
                                    <div class="row">
                                    <div class="col-lg-4">    
                                    <label class="ckbox">
                                    <input type="checkbox" name="bodyShape[]" value="أعلى">
                                    <span>اعلى</span>
                                    </label>
                                    </div>
                                    <div class="col-lg-4">    
                                    <label class="ckbox">
                                    <input type="checkbox" name="bodyShape[]" value="وسط">
                                    <span>وسط</span>
                                    </label>
                                    </div>
                                    <div class="col-lg-4">
                                    <label class="ckbox">
                                    <input type="checkbox" name="bodyShape[]" value="اسفل">
                                    <span>وسط</span>
                                    </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">Phisycal Age</label>
                                    <input type="text" name="phisycalAge" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">Health Ass</label>
                                    <input type="text" name="healthAss" class="form-control">
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
                        <div class="col-xs-12 col-sm-12 col-md-2 text-center">
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

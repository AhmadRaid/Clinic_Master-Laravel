
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
                <h4 class="card-title mb-1">انشاء مريض</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                {!! Form::open(['url'=>url('patient/add')])!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('name',trans('admin.name',['class'=>'form-control-label ']))!!}
                                    {!! Form::text('name',old('name'),['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">رقم الهوية</label>
                                    <input type="text" name="idNumber" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">تاريخ الميلاد</label>
                                    <input type="date" name="birthday" onchange="submitBirthday()" id="myBirthday" value="dd-mm-yyyy" class="form-control">
                                    <hr>
                                    <div id="displayBirthday">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">العمر</label>
                                    <div id="age">
                                </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">ت المنزل</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">موبايل</label>
                                    <input type="text" name="mobile" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">التعليم</label>
                                    <input type="text" name="education" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الوظيفة</label>
                                    <input type="text" name="job" class="form-control">
                                </div>
                            </div>                         
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">النوع</label>
                                        <select class="form-control select2-no-search" name="genders">
                                            <option label="Choose one">
                                            </option>                                          
                                            <option value="ذكر">
                                              ذكر
                                            </option>
                                            <option value="انثي">
                                                انثي
                                              </option>          
                                        </select>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الايميل</label>
                                    <input type="text" name="email"  class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">المحافظة</label>
                                    <input type="text" name="governorate" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">المدينة</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">العنوان</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label for="" class="form-control-label ">الطبيب المعالج</label>
                                <select class="form-control select2-no-search" name="Physician">
                                    <option label="Choose one">
                                    </option>
                                    @foreach( $doctors as $doctor)
                                    <option value="{{$doctor -> id }}">
                                        {{$doctor -> name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">تاريخ التسجيل</label>
                                    <input type="date" name="dateOfRegistration" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">تاريخ اخر زيارة</label>
                                    <input type="date" name="dateLastVisit" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label "> عدد الزيارات</label>
                                    <input type="text" name="numberOfVisit" value="0" class="form-control">
                                </div>
                            </div>     
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الوزن كم </label>
                                    <input type="text" name="weight" class="form-control">
                                </div>
                            </div>  
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">يعانى من الضغط</label>
                                        <select class="form-control select2-no-search" name="pressure">
                                            <option label="Choose one">
                                            </option>                                          
                                            <option value="نعم">
                                              نعم
                                            </option>
                                            <option value="لا">
                                                لا
                                              </option>          
                                        </select>        
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">يعانى من السكر</label>
                                        <select class="form-control select2-no-search" name="sugar">
                                            <option label="Choose one">
                                            </option>                                          
                                            <option value="نعم">
                                              نعم
                                            </option>
                                            <option value="لا">
                                                لا
                                              </option>          
                                        </select>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">الانسولين</label>
                                    <input type="text" name="insulin" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">يتناول ادوية</label>
                                        <select class="form-control select2-no-search" name="medicines">
                                            <option label="Choose one">
                                            </option>                                          
                                            <option value="نعم">
                                              نعم
                                            </option>
                                            <option value="لا">
                                                لا
                                              </option>          
                                        </select>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label ">يقوم بالتدخين</label>
                                        <select class="form-control select2-no-search" name="smoking">
                                            <option label="Choose one">
                                            </option>                                          
                                            <option value="نعم">
                                              نعم
                                            </option>
                                            <option value="لا">
                                                لا
                                              </option>          
                                        </select>        
                                </div>
                            </div>     
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label "> ملاحظات</label>
                                    <input type="text" name="notes"  class="form-control">
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

<script>
    function submitBirthday() {
    var minutes = 1000 * 60;
    var hours = minutes * 60;
    var days = hours * 24;
    var years = days * 365;

    var birthday = Date.parse(document.getElementById("myBirthday").value);
    var dateNow = new Date();
    var YearsOld = Math.round((dateNow-birthday)/ years);
    document.getElementById("displayBirthday").innerHTML = ("يبلغ من العمر " + YearsOld + " سنين.");
  //  $('#age').append($('#hiddenContainer').html());  
    $('#age').append($('<input type="text" name="age" value="' + YearsOld +'" class="form-control">'));    
}
</script>

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

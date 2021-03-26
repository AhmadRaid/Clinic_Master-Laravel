@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}"
          rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}"
          rel="stylesheet">
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
                    <h4 class="card-title mb-1">تعديل الحجز</h4>
                    {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
                </div>
                <div class="card-body pt-0">
                    {!! Form::open(['url'=>url('booking/' . $booking->id), 'method' => 'put'])!!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('patient_id', 'اسم المريض',['class'=>'form-control-label col-sm-2'])!!}
                                {!! Form::select('patient_id', App\Models\User::where('roles_name','User')->pluck('name', 'id'),$booking->patient_id,['class'=>'form-control select2', 'placeholder' => '..............'])!!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('service_id', 'اسم الخدمة',['class'=>'form-control-label col-sm-2'])!!}
                                {!! Form::select('service_id', App\Models\Service::pluck('name', 'id'), $booking->service_id,['class'=>'form-control select2 id', 'placeholder' => '..............'])!!}
                            </div>
                        </div>                                         
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('date','موعد الحجز',['class'=>'form-control-label col-sm-2'])!!}
                                {!! Form::date('date', $booking->date,['class'=>'form-control', 'placeholder' => 'موعد الحجز'])!!}
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('time','وقت الحجز',['class'=>'form-control-label col-sm-2'])!!}
                                {!! Form::time('time', $booking->time,['class'=>'form-control', 'placeholder' => 'موعد الحجز'])!!}
                            </div>
                        </div> 
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p class="mg-b-10">نوع الحجز </p>
                        <select class="form-control select2-no-search typea" name="type">
                            <option  {{  $booking->type === 'كشف' ? 'selected' : '' }} value="كشف">
                                كشف
                            </option>
                            <option {{ $booking->type === 'متابعة' ? 'selected' : '' }} value="متابعة">
                                متابعة
                            </option>                                                                  
                        </select>
                    </div>
                    <br>    
                   <div class="hidden"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="label" for="">السعر :{{ $booking->price }}ج</label>
                            </div>
                        </div>                        
                                {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
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
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.typea').change(function() {
            var id = $('.id').val();
            var typea = $(".typea").val();
            if (id) {
                $.ajax({
                    type: "get",
                    url: "{{url('/service')}}/" + id + "/" + typea,
                    success: function(data) {
                            if (data.count > 0) {                               
                                var hidden = '';  
                                var label = '';
                                $('.label').html('');                             
                                $('.label').append("<label>السعر : " + data.result + " ج</label>");                                                                                                                                      
                                $('.label').append(label);
                                $('.hidden').html('');                             
                                $('.hidden').append("<input type='hidden' name='price' value='" + data.result + "'>");                                                                                                                                      
                                $('.hidden').append(hidden);                                                                                                                                                     
                        }
                    }
                });
            }
        });
        });
                        
        </script>
@endsection

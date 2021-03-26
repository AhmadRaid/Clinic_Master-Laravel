
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
                <h4 class="card-title mb-1">انشاء روشتة</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                {!! Form::open(['url'=>url('patient')])!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('booking_id', 'رقم الحجز',['class'=>'form-control-label col-sm-2'])!!}
                                    {!! Form::select('booking_id', App\Models\Booking::pluck('id', 'id'), old('booking_id'),['class'=>'form-control select2', 'placeholder' => '..............'])!!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! Form::label('foodsystem_id',trans('النظام الغذائي',['class'=>'form-control-label col-sm-2']))!!}
                                    {!! Form::select('foodsystem_id', App\Models\Foodsystem::pluck('name', 'id'), old('foodsystem_id'),['class'=>'form-control select2 id', 'placeholder' => 'اختر النظام الغذائي المطلوب المطلوب'])!!}
                                </div>
                            </div>


                            <div class="div_inputs col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                {!! Form::label('therapy','العلاج') !!}
                                {!! Form::text('therapy[]',old('therapy'),['class'=>'form-control']) !!}
                             </div>
                            </div>




                            <hr><!-- col-4 -->
                            <div class="clearfix"></div>
                             <br>
                            <a href="#" class="add_input btn btn-info mt-2"><i class="fa fa-plus"></i></a>
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
    <script type="text/javascript" >
        var x = 1;
     $(document).on('click','.add_input',function(){
        var max_input = 20;
        if (x < max_input) {
        $('.div_inputs').append('<div>'+
      '<div class="form-group">'+
         '{!! Form::label('therapy','العلاج') !!}'+
         '{!! Form::text('therapy[]','',['class'=>'form-control']) !!}'+
      '</div>'+
     '<div class="clearfix"></div>'+
        '<br>'+
     '<a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>'+
  '</div>');
        x++;
        } else {
        return false;
        }
     });
     $(document).on('click','.remove_input',function(){
        $(this).parent('div').remove();
        x--;
        return false;
     });
  </script>
@endsection

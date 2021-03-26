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
                    <h4 class="card-title mb-1">تعديل الدكتور</h4>
                    {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
                </div>

                <div class="card-body pt-0">
                    {!! Form::open(['url'=>url('doctor/' . $doctor->id), 'method' => 'put'])!!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">إسم الطبيب :</label>
                                <input type="text" class="form-control" name="name" value="{{ $doctor->name }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">البريد الالكتروني :</label>
                                <input type="email" class="form-control" name="email" value="{{ $doctor->email }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">الهاتف :</label>
                                <input type="text" class="form-control" name="phone" value="{{ $doctor->phone }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">العنوان :</label>
                                <input type="text" class="form-control" name="address" value="{{ $doctor->address }}" autocomplete="on">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">التخصص :</label>
                                {!! Form::select('department_id', App\Models\Department::pluck('name', 'id'), $doctor->department_id, ['class'=>'form-control', 'placeholder' => '--حدد تخصص--'])!!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">معلومات خاصة بالطبيب :</label>
                                <textarea class="form-control" id="profile" name="profile"
                                          title="يرجي ادخال معلومات الطبيب "
                                          rows="1"> {{  $doctor->profile  }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
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
@endsection

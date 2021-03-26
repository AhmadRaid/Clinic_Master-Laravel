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
                    <h4 class="card-title mb-1">{{$title}}</h4>
                    {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
                </div>

                <div class="card-body pt-0">
                    {!! Form::open(['url'=>route('patientreports.store')])!!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="patient_id" class="col-form-label">المريض</label>
                                <select class="form-control patient" name="patient_id" id="name">
                                    <option value="">................</option>
                                    @foreach(App\Models\Patient::all() as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 booking_id" style="display: none">
                                <div class="form-group">
                                    <label for="appointment" class="col-form-label">موعد حجز المريض</label>
                                    <input type="text" class="form-control booking" value="{{ old('appointment') }}" name="appointment">
                                </div>
                            </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="attachments" class="col-form-label">المرفقات</label>
                                <input type="text" class="form-control" name="attachments"
                                       value="{{ old('attachments') }}"
                                       autocomplete="off">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="note" class="col-form-label">الملاحظات </label>
                                <input type="text" class="form-control" name="note" value="{{ old('note') }}"
                                       autocomplete="off">
                            </div>
                        </div>

                        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
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
    <script
        src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script
        src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

    <script>
        $(document).on('change', '.patient', function () {
            var patient_id = $('.patient').val();
            $.ajax({
                url: '{{ route('get-appointment') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    patient_id: patient_id
                },success: function(data) {
                    if(data.status === true) {
                        $('.booking').val(data.appointment);
                        $('.booking_id').css('display', 'block');
                    }else {
                        $('.booking').val('');
                        $('.booking_id').css('display', 'none');
                    }
                }
            });
        });
    </script>
@endsection

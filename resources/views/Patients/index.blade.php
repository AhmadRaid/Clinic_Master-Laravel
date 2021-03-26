@extends('layouts.master')
@section('css')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection
@section('content')
@include('partial.page-header')
@include('msg.status')

<div class="row row-sm">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
      <div class="card">
          <div class="card-header pb-0">
              <div class="d-flex justify-content-between">
                  <h4 class="card-title mg-b-0">المرضي</h4>
                  <i class="mdi mdi-dots-horizontal text-gray"></i>
              </div>
              <!--                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>-->
          </div>
          <div class="card-body">
              <div class="table-responsive border-top userlist-table">
                  <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                    {!! $dataTable->table() !!}
                  </table>
              </div>

          </div>
      </div>
  </div><!-- COL END -->
</div>
{!! $dataTable->scripts() !!}

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https:///cdn.datatables.net/select/1.3.0/js/select.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection

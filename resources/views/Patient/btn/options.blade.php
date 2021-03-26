<td>
    <a href="{{url('patient/'.$id.'/edit')}}" class="btn btn-sm btn-info">
        <i class="las la-pen"></i>
    </a>
    <a href="#"   data-toggle="modal" data-target="#del_admin{{$id}}" class="btn btn-sm btn-danger">
        <i class="las la-trash"></i>
    </a>
</td>

<div id="del_admin{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">


    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ trans('admin.delete')}}</h4>
      </div>
      {!! Form::open(['route'=>['patient.destroy',$id],'method'=>'delete'])!!}
      <div class="modal-body">
        <h4>{{ trans('admin.delete_this',['name'=>$booking_id])}}</h4>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">{{ trans('admin.close')}}</button>
      {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger'])!!}
    </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>

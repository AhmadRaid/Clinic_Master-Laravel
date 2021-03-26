@if (session('status'))
    <div class="alert alert-{{$danger??'success'}}" role="alert">
        {{ session('status') }}
    </div>
@endif
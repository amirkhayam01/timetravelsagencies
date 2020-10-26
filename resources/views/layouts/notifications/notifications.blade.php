@push('js')
<script>


@if(Session::has('create'))
    $.notify({
        icon: "done",
        message: "{{Session::get('create')}} created successfully."
    }, {
        type: 'success'
    });
    @php
       Session::forget('create');
    @endphp
  
@endif

@if(Session::has('update'))
    $.notify({
        icon: "done",
        message: "{{Session::get('update')}} updated successfully."
    }, {
        type: 'primary'
    });
    @php
       Session::forget('update');
    @endphp
  
@endif

@if(Session::has('delete'))
    $.notify({
        icon: "done",
        message: "{{Session::get('delete')}} deleted successfully."
    }, {
        type: 'danger'
    });
    @php
       Session::forget('delete');
    @endphp
  
@endif

@if(Session::has('deletefailed'))
    $.notify({
        icon: "clear",
        message: "Cannot delete record."
    }, {
        type: 'danger'
    });
    @php
       Session::forget('deletefailed');
    @endphp
  
@endif

</script>



@endpush
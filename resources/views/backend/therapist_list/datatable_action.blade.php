@if(isset($status))
    @if($row->admin_status==1)
    <span class="badge badge-success p-2">Accept</span>
    @else
    <span class="badge badge-danger p-2">Reject</span>
    @endif
@else
    <button class="btn btn-sm btn-primary btn-edit" data-id="{{$row->id}}">Change Status</button>
    
@endif
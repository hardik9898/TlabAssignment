@if(isset($status))
    @if($row->status==1)
    <span class="badge badge-success p-2">Active</span>
    @else
    <span class="badge badge-danger p-2">De-Active</span>
    @endif
@else
    <button class="btn btn-sm btn-primary btn-edit" data-id="{{$row->id}}">Edit</button>
    <button class="btn btn-sm btn-danger btn-delete" data-id="{{$row->id}}">Delete</button>
@endif
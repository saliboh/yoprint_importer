<div  class="row">
<table class="table table-striped table-bordered" style="margin-top:20px;" >
    <tr>
        <td>Time</td>
        <td>File name</td>
        <td>Status</td>
    </tr>
    <div wire:poll.50ms>
    @foreach($data as $row)
        <tr>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->status }}</td>
        </tr>
    @endforeach
    </div>
</table>
</div>

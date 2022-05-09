<form wire:submit.prevent="submit" enctype="multipart/form-data">
    <div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <input type="file" class="form-control" wire:model="file">
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>

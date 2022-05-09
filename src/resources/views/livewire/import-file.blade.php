<form wire:submit.prevent="submit" enctype="multipart/form-data" class="padding-15 black round-5 form-inline">
    <div class="form-group">
        <input type="file" class="form-control input-lg" wire:model="files" multiple >
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </div>
</form>

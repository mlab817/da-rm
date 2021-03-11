<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UploadListing extends Component
{
    public $upload_id;

    public $confirmDeleteDialog = false;

    public $status;

    public $message;

    public function confirmDelete($id)
    {
        $this->upload_id = $id;
        $this->confirmDeleteDialog = true;
    }

    public function cancelDelete()
    {
        $this->upload_id = null;
        $this->confirmDeleteDialog = false;
    }

    public function delete()
    {
        $upload = Upload::findOrFail($this->upload_id);
        $fileToDelete = $upload->path;
        Storage::disk('google')->delete($fileToDelete);
        if ($upload->delete()) {
            $this->status = 'success';
            $this->message = 'Successfully deleted file';
        } else {
            $this->status = 'error';
            $this->message = 'Failed to delete file';
        }
        $this->confirmDeleteDialog = false;
    }

    public function render()
    {
        return view('livewire.upload-listing', [
            'uploads' => Upload::paginate(10),
        ]);
    }
}

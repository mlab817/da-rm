<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Livewire\Component;

class Offices extends Component
{
    public $offices, $isOpen, $name, $short_name, $office_id;

    public function render()
    {
        $this->offices = Office::all();

        return view('livewire.offices.index');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->short_name = '';
        $this->office_id = '';
    }

    public function store()
    {
        $this->validate([
            'name'          => 'required',
            'short_name'    => 'required|max:20'
        ]);

        Office::updateOrCreate([
            'id' => $this->office_id,
        ], [
            'name'          => $this->name,
            'short_name'    => $this->short_name,
        ]);

        session()->flash('message',
            $this->office_id ? 'Office updated successfully' : 'Office created successfully'
        );

        $this->closeModal();

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $office = Office::findOrFail($id);
        $this->office_id = $id;
        $this->name = $office->name;
        $this->short_name = $office->short_name;

        $this->openModal();
    }

    public function delete($id)
    {
        $office = Office::findOrFail($id);

        if ($office->delete()) {
            session()->flash('message', 'Office deleted successfully');
        } else {
            session()->flash('message', 'Office may have already been deleted');
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Office;
use Livewire\Component;

class Commodities extends Component
{
    public $offices, $name, $office_id, $commodity_id;

    public $isOpen = false;

    public function render()
    {
        $this->offices = Office::select('id','name')->get();

        return view('livewire.commodities.index', [
            'commodities' => Commodity::paginate(10),
        ]);
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
        $this->commodity_id = '';
        $this->name = '';
        $this->office_id = '';
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'office_id' => 'required',
        ]);

        Commodity::updateOrCreate([
            'id' => $this->commodity_id
        ], [
            'name' => $this->name,
            'office_id' => $this->office_id,
        ]);

        session('message',
            $this->commodity_id ? 'Commodity updated successfully' : 'Commodity created successfully'
        );

        $this->closeModal();
    }

    public function edit($id)
    {
        $commodity          = Commodity::findOrFail($id);
        $this->commodity_id = $commodity->id;
        $this->name         = $commodity->name;
        $this->office_id    = $commodity->office_id;

        $this->openModal();
    }

    public function delete($id)
    {
        $commodity = Commodity::findOrFail($id);
        $commodity->delete();

        session('message',
            'Commodity deleted successfully'
        );
    }
}

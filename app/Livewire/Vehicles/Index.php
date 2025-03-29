<?php

namespace App\Livewire\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class Index extends Component
{
    use WithPagination;

    public $per_page = [5, 10, 15];
    public $per_page_selected = 15;
    public $search = "";
    public $order_by = 'id';
    public $order_type = 'asc';

    public function order_by($order_by)
    {
        if ($order_by == $this->order_by) {
            if ($this->order_type == 'asc') {
                $this->order_type = 'desc';
            } else {
                $this->order_type = 'asc';
            }
        } else {
            $this->order_by = $order_by;
            $this->order_type = 'asc';
        }
    }

    public function render()
    {
        Log::info('Render method called - Search:', ['search' => $this->search]);
        $vehicles = Vehicle::where('brand', 'like', '%' . $this->search . '%')
            ->OrWhere('model', 'like', '%' . $this->search . '%')
            ->OrWhere('vin', 'like', '%' . $this->search . '%')
            ->OrWhere('registration', 'like', '%' . $this->search . '%')
            ->OrWhere('fuel', 'like', '%' . $this->search . '%')
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.vehicles.index', ['vehicles' => $vehicles]);
    }
}

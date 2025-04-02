<?php

namespace App\Livewire\Vehicles;

use App\Models\User;
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
    public $order_by = 'user';
    public $order_type = 'asc';

    public function orderBy($order_by)
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
        // $vehicles = Vehicle::where('brand', 'like', '%' . $this->search . '%')
        //     ->OrWhere('model', 'like', '%' . $this->search . '%')
        //     ->OrWhere('vin', 'like', '%' . $this->search . '%')
        //     ->OrWhere('registration', 'like', '%' . $this->search . '%')
        //     ->OrWhere('fuel', 'like', '%' . $this->search . '%')
        //     ->OrWhereHas('user', function ($query) {
        //         $query->where('name', 'like', '%' . $this->search . '%');
        //     })
        //     ->orderBy($this->order_by, $this->order_type)
        //     ->paginate($this->per_page_selected);

        $query = Vehicle::query();

        $query->where('brand', 'like', '%' . $this->search . '%')
            ->OrWhere('model', 'like', '%' . $this->search . '%')
            ->OrWhere('vin', 'like', '%' . $this->search . '%')
            ->OrWhere('registration', 'like', '%' . $this->search . '%')
            ->OrWhere('fuel', 'like', '%' . $this->search . '%')
            ->OrWhereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });

        if ($this->order_by == 'user') {
            $query->orderBy(User::select('name')->whereColumn('users.id', 'vehicles.user_id'), $this->order_type);
        } else {
            $query->orderBy($this->order_by, $this->order_type);
        }

        // dd($query->toSql());
        $vehicles = $query->paginate($this->per_page_selected);

        return view('livewire.vehicles.index', ['vehicles' => $vehicles]);
    }
}

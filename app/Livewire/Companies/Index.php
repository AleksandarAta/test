<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $companies = Company::with('cities')->get();

        return view('livewire.companies.index', [
            'companies' => $companies,
        ]);
    }
}

<?php

namespace App\Livewire\User;

use Livewire\Component;

class AdvancedSearch extends Component
{
    public $advancedSearch;
    public function render()
    {
        return view('livewire.user.advanced-search');
    }
}

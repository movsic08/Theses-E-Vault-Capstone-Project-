<?php

namespace App\Http\Livewire;

use App\Models\BachelorDegree;
use Livewire\Component;

class EditProfile extends Component
{
    public $bachelor_degree;
     
    public function render()
    {
        return view('livewire.edit-profile')->layout('layout.app');
    }

    public function mount(){
         $this->bachelor_degree = BachelorDegree::all();
    }
}
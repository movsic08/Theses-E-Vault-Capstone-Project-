<?php

namespace App\Http\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\User;
use Livewire\Component;

class AddNewUser extends Component
{
    public $bachelor_degree, $users;
    public function mount()
    {
        $this->bachelor_degree = BachelorDegree::all(); // Fetch data from your model
        $this->users = User::all(); // Fetch data from your model

    }

    public $username, $email, $password, $account_level;

    public function addNewUser($fields)
    {
        $this->validateOnly($fields, [
            "username" => ['required', 'min:4'],
            "email" => ['required', 'email', 'unique:users,email'],
            'password' => 'required|confirmed|min:8',
            'account_level' => 'required',
        ]);

        dd([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'account_level' => $this->account_level,
            // Add other fields here if needed
        ]);

    }
    public function render()
    {
        return view('livewire.admin.add-new-user')->layout('layout.admin');
    }
}
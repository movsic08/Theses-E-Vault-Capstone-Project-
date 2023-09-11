<?php

namespace App\Livewire\Admin;

use App\Models\BachelorDegree;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUsers extends Component
{
    public $bachelor_degree, $users;
    public $username, $email, $password, $password_confirmation, $account_level;
    public $showForm = false; // Add this property

    public function toggleFormVisibility()
    {
        $this->showForm = true;
    }
    
    public function closeForm()
    {
        $this->showForm = false;
        $this->reset(['username', 'email', 'password', 'password_confirmation', 'account_level']);
        $this->resetErrorBag();
    }

    public function createNewUsers()
    {
        $this->validate([
            'username' => ['required', 'min:5', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required|confirmed|min:8',
            'account_level' => 'required',
        ], 
    [
        
    ]);

        // dd($this->validate()->all());

        if ($this->account_level === 'admin') {
            $is_admin = true;
        } else {
            $is_admin = false;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->is_admin = $is_admin;

        $user->save();
        $this->users = User::orderBy('created_at', 'desc')->get();

        $this->reset(['username', 'email']);

        session()->flash('message', 'Creating account success!');
        $this->dispatch('contentRefreshed');
        $this->showForm = false;
    }

    public function mount()
    {
        $this->account_level = 'user';
        $this->bachelor_degree = BachelorDegree::all(); // Fetch data from your model
        $this->users = User::orderBy('created_at', 'desc')->get();

    }
    public function render()
    {
        return view('livewire.admin.create-users')->layout('layout.admin');
    }
}
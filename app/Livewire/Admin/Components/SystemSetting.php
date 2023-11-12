<?php

namespace App\Livewire\Admin\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class SystemSetting extends Component
{
    #[Url()]
    public $activeTab = 'profile';

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
        // $this->dispatch('popstate', $tab);
    }

    public $first_name, $last_name, $phone_no, $staff_id, $username, $bio, $address, $email;
    public function mount()
    {
        $user = auth()->user();
        $this->username = $user->username;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone_no = $user->phone_no;
        $this->staff_id = $user->staff_id;
        $this->username = $user->username;
        $this->bio = $user->bio;
        $this->address = $user->address;
        $this->email = $user->email;
    }
    // public function boot()
    // {
    //     $user = auth()->user();
    //     if ($user->first_name && $user->last_name) {
    //         // session()->flash('message', 'User details are incomplete, edit in setting now.');
    //         request()->session()->flash('success', 'Comment violation confirm success.');
    //     }
    // }
    public function editProfile()
    {

        $user = auth()->user();
        $this->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'phone_no' => ['required', 'min:11', 'max:11', 'regex:/^09\d{9}$/', ($this->phone_no == $user->phone_no) ? '' : 'unique:users,phone_no'],
            'staff_id' => ['required', 'min:2', 'regex:/^\d{2}-AC-\d{4}$/', ($this->staff_id == $user->staff_id) ? '' : 'unique:users,staff_id'],
            'username' => ['required', 'min:2'],
            'bio' => ['required', 'min:2'],
            'address' => ['required', 'min:5'],
            // 'email' => 'required|email|unique:users,email,' . Auth::id(),
        ], [
            'staff_id.regex' => 'The staff ID must be in the format "XX-AC-XXXX".',
            'phone_no.regex' => 'This phone number must start with "09" and have 11 digits.',
            'phone_no.unique' => 'This phone number has already been taken.',
            'staff_id.unique' => 'This staff ID has already been taken, if you think this is mistaken contact admin.',
        ]);

        // dd('dito 2');

        $isUpdated = Auth::user()->update([
            'first_name' => ucfirst($this->first_name),
            'last_name' => ucfirst($this->last_name),
            // 'email' => $this->email,
            'bio' => $this->bio,
            'phone_no' => $this->phone_no,
            'staff_id' => $this->staff_id,
            'username' => $this->username,
            'address' => $this->address,
        ]);

        if ($isUpdated) {
            return session()->flash('message', 'Edit profile success!');
        } else {
            return session()->flash('error', 'Cannot update information, contact developer.');
        }


    }
    public function render()
    {
        // $this->getUserData();
        $user = auth()->user();
        return view('livewire.admin.components.system-setting', [
            'user' => $user,
        ]);
    }
}

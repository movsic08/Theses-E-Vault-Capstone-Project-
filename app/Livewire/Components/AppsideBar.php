<?php

namespace App\Livewire\Components;

use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class AppsideBar extends Component
{
    #[On('notification-read')]
    public function render()
    {
        $numberOfNotification = 0; // Initialize the variable with a default value

        if (auth()->check()) {
            $numberOfNotification = Notification::where('user_id', auth()->user()->id)
                ->where('is_read', 0)
                ->count();
        }

        return view('livewire.components.appside-bar', [
            'numberOfNotification' => $numberOfNotification
        ]);
    }

}
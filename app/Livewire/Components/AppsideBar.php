<?php

namespace App\Livewire\Components;

use App\Models\Notification;
use Livewire\Component;

class AppsideBar extends Component {
    public function render() {

        $numberOfNotification = 0;
        // Default value for the number of notifications

        if ( auth()->check() ) {
            // Check if the user is authenticated
            $numberOfNotification = Notification::where( 'user_id', auth()->user()->id )
            ->where( 'is_read', 0 )
            ->count();
        }

        return view( 'livewire.components.appside-bar', [
            'numberOfNotification' => $numberOfNotification,
        ] );
    }
}
<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifications extends Component {

    public function clickedNotification( $id ) {
        Notification::where( 'id', $id )->update( [ 'is_read' => 1 ] );
        $this->dispatch( 'notificationClicked' );
    }

    #[ On( 'new-notification' ) ]
    public function updateCount() {

    }

    public function render() {
        $notificationItems = Notification::where( 'user_id', auth()->user()->id )
        ->orderBy( 'created_at', 'desc' )
        ->get();

        return view( 'livewire.notifications', [
            'notificationItems' => $notificationItems
        ] );
    }
}
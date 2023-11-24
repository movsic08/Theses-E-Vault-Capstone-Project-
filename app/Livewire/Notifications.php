<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifications extends Component
{

    public function clickedNotification($id)
    {
        Notification::where('id', $id)->update(['is_read' => 1]);
        $this->dispatch('notificationClicked');
    }

    #[On('new-notification')]
    public function updateCount()
    {

    }

    public function markAsRead($id)
    {
        Notification::where('id', $id)->update(['is_read' => 1]);
        $this->dispatch('notificationClicked');
    }

    public function deleteNotification($id)
    {
        Notification::where('id', $id)->delete();
    }

    public $loadData = 5;

    public function loadMore()
    {
        $this->loadData += 5;
    }

    public function readAll()
    {
        Notification::where('user_id', auth()->user()->id)->update(['is_read' => 1]);
    }
    public function unreadAll()
    {
        Notification::where('user_id', auth()->user()->id)->update(['is_read' => 0]);
    }

    public function deleteAll()
    {
        Notification::where('user_id', auth()->user()->id)->delete();
    }

    public function render()
    {
        $notificationItems = Notification::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->take($this->loadData)
            ->get();
        $totalItems = Notification::where('user_id', auth()->user()->id)->count();

        return view('livewire.notifications', [
            'notificationItems' => $notificationItems,
            'totalItems' => $totalItems,
        ]);
    }
}
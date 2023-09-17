<?php

namespace App\Livewire\Components;

use Livewire\Component;

class UserTableRows extends Component {
    public $smallMenu = false;
    public $currentListDataValue;

    public function showMenu() {
        $this->smallMenu = !$this->smallMenu;
    }

    public $selectedUserId;
    public $showDeleteConfirmation = false;

    public function showDeleteBoxUser( $userId ) {
        // dd( $userId );
        $this->selectedUserId = $userId;
        $this->showDeleteConfirmation = true;
    }

    public function cancelDeleteBoxUser() {
        $this->showDeleteConfirmation = false;
    }

    public function confirmDelete() {
        // Implement the delete logic here using $this->selectedUserId
        // Once the delete is done, you can reset properties and update your data

        // For example:
        // User::find( $this->selectedUserId )->delete();

        // Reset properties
        $this->selectedUserId = null;
        $this->showDeleteConfirmation = false;
    }

    public function render() {
        return view( 'livewire.components.user-table-rows' );
    }
}
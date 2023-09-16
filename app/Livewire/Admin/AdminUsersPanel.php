<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminUsersPanel extends Component {

    public $currentListData, $currentQuery;

    public function mount() {
        $this->currentListData = User::get();
        $this->currentQuery = 'allUsers';
    }

    public function switchToVerifiedUsersData() {
        $this->currentListData = User::where( 'is_verified', 1 )->get();
        $this->currentQuery = 'verifiedUsers';
    }

    public function switchToAllUsersData() {
        $this->currentListData = User::get();
        $this->currentQuery = 'allUsers';
    }

    public function switchToUnverifiedUsers() {
        $this->currentListData = User::where( 'is_verified', 0 )
        ->get();
        $this->currentQuery = 'unverifiedUsers';
    }

    public function switchToAdminUsers() {
        $this->currentListData = User::where( 'is_admin', 1 )
        ->get();
        $this->currentQuery = 'adminUsers';
    }

    public function render() {

        return view( 'livewire.admin.admin-users-panel' )->layout( 'layout.admin' );
    }
}
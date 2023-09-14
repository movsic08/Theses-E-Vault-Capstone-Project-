<?php

namespace App\Livewire\Admin;

use App\Models\DocuPost;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component {
    public $latestAccounts, $userCount, $adminUserCount, $verifiedAccountCount, $uploadFilesCount, $latestDocuPostData;
    // public $pollInterval = 1000;
    // // Refresh every 5 seconds ( adjust as needed )

    // protected $listeners = [ 'newUserCreated' => 'refreshUserList' ];

    // public function mount() {
    //     $this->latestAccounts = User::orderBy( 'created_at', 'desc' )
    //     ->where( 'is_admin', 0 )
    //     ->limit( 5 )
    //     ->get();
    // }

    public function loadDashboard() {
        $this->latestAccounts = User::orderBy( 'created_at', 'desc' )
        ->where( 'is_admin', 0 )
        ->limit( 5 )
        ->get();
        $this->userCount = User::count();
        $this->adminUserCount = User::where( 'is_admin', 1 )
        ->count();
        $this->verifiedAccountCount = User::where( 'is_verified', 1 )
        ->count();

        $this->verifiedAccountCount = User::where( 'is_verified', 1 )
        ->count();
        $this->uploadFilesCount = DocuPost::whereIn( 'status', [ 1, 2 ] )
        ->count();

        $this->latestDocuPostData = DocuPost::latest()->take( 5 )->get();
    }

    public function render() {
        $this->loadDashboard();
        return view( 'livewire.admin.dashboard' )->layout( 'layout.admin' );
    }
}
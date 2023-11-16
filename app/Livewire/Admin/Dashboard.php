<?php

namespace App\Livewire\Admin;

use App\Models\DocuPost;
use App\Models\ReportedComment;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    // public $latestAccounts, $userCount, $adminUserCount, $verifiedAccountCount, $uploadFilesCount, $latestDocuPostData;
    // public $pollInterval = 1000;
    // // Refresh every 5 seconds ( adjust as needed )

    // protected $listeners = [ 'newUserCreated' => 'refreshUserList' ];

    // public function mount() {
    //     $this->latestAccounts = User::orderBy( 'created_at', 'desc' )
    //     ->where( 'is_admin', 0 )
    //     ->limit( 5 )
    //     ->get();
    // }

    // public function loadDashboard() {


    // }

    public function render()
    {
        // $this->loadDashboard();
        $latestAccounts = User::orderBy('created_at', 'desc')
            ->where('is_admin', 0)
            ->limit(5)
            ->get();
        $userCount = User::count();
        $adminUserCount = User::where('is_admin', 1)
            ->count();
        $verifiedAccountCount = User::where('is_verified', 1)
            ->count();

        $uploadFilesCount = DocuPost::whereIn('status', [1, 2])
            ->count();
        $reportedComments = ReportedComment::where('report_status', 0)->count();

        $pendingPost = DocuPost::where('status', 0)->count();

        $latestDocuPostData = DocuPost::latest()->take(5)->get();

        return view('livewire.admin.dashboard', [
            'latestAccounts' => $latestAccounts,
            'userCount' => $userCount,
            'adminUserCount' => $adminUserCount,
            'verifiedAccountCount' => $verifiedAccountCount,
            'uploadFilesCount' => $uploadFilesCount,
            'latestDocuPostData' => $latestDocuPostData,
            'reportedComments' => $reportedComments,
            'pendingPost' => $pendingPost,
        ])->layout('layout.admin');
    }
}
<?php

namespace App\Livewire\Admin;

use App\Charts\SampleChart;
use App\Charts\UserLogInsChart;
use App\Models\DocuPost;
use App\Models\ReportedComment;
use App\Models\User;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{

    public function render()
    {

        $data = DB::table('login_logs')
            ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as total_logins'))
            ->groupBy('date')
            ->get();



        //     $chart = Charts::create('line', 'highcharts')
        //         ->title('Total Logins Per Day')
        //         ->labels($data->pluck('date'))
        //         ->values($data->pluck('total_logins'))
        //         ->responsive(true);

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
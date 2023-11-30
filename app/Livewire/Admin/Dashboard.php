<?php

namespace App\Livewire\Admin;

use App\Models\LoginLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\DocuPost;
use App\Models\ReportedComment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Component;


class Dashboard extends Component
{
    public function getFolderInfoInPublic()
    {
        $directory = 'public'; // or your desired subdirectory within the public disk

        $folderInfo = $this->getFolderInfo($directory);

        return $folderInfo;
    }

    private function getFolderInfo($directory)
    {
        $folderInfo = [];

        $directories = Storage::directories($directory);

        foreach ($directories as $dir) {
            $folderName = basename($dir);

            // Get the file count for the folder
            $files = Storage::files($dir);
            $fileCount = count($files);

            // Add folder name and file count to the array
            $folderInfo[] = [
                'folderName' => $folderName,
                'fileCount' => $fileCount,
            ];
        }

        return $folderInfo;
    }
    public function getTotalFilesInPublicStorage()
    {
        $directory = 'public'; // or your desired subdirectory within the public disk

        $files = $this->getFilesRecursively($directory);

        $totalFiles = count($files);

        return $totalFiles;
    }

    private function getFilesRecursively($directory)
    {
        $allFiles = [];

        $files = Storage::files($directory);

        foreach ($files as $file) {
            $allFiles[] = $file;
        }

        $directories = Storage::directories($directory);

        foreach ($directories as $subDirectory) {
            $allFiles = array_merge($allFiles, $this->getFilesRecursively($subDirectory));
        }

        return $allFiles;
    }


    public function render()
    {

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


        $pendingPost = DocuPost::where('status', 0)->count();

        $latestDocuPostData = DocuPost::latest()->take(5)->get();

        $totalFiles = $this->getTotalFilesInPublicStorage();

        $folderInfo = $this->getFolderInfoInPublic();
        $fixedReportedComment = ReportedComment::where('report_status', 1)->count();
        $notFixedReportedComments = ReportedComment::where('report_status', 0)->count();

        $thisWeekMonday = Carbon::now()->startOfWeek()->format('Y-m-d');
        $thisWeekTuesday = Carbon::now()->startOfWeek()->addDays(1)->format('Y-m-d');
        $thisWeekWednesday = Carbon::now()->startOfWeek()->addDays(2)->format('Y-m-d');
        $thisWeekThursday = Carbon::now()->startOfWeek()->addDays(3)->format('Y-m-d');
        $thisWeekFriday = Carbon::now()->startOfWeek()->addDays(4)->format('Y-m-d');
        $thisWeekSaturday = Carbon::now()->startOfWeek()->addDays(5)->format('Y-m-d');
        $thisWeekSunday = Carbon::now()->startOfWeek()->addDays(6)->format('Y-m-d');

        // Get the count of logins for each day of the week
        $loginCountMonday = LoginLog::whereDate('login_time', $thisWeekMonday)->count();
        $loginCountTuesday = LoginLog::whereDate('login_time', $thisWeekTuesday)->count();
        $loginCountWednesday = LoginLog::whereDate('login_time', $thisWeekWednesday)->count();
        $loginCountThursday = LoginLog::whereDate('login_time', $thisWeekThursday)->count();
        $loginCountFriday = LoginLog::whereDate('login_time', $thisWeekFriday)->count();
        $loginCountSaturday = LoginLog::whereDate('login_time', $thisWeekSaturday)->count();
        $loginCountSunday = LoginLog::whereDate('login_time', $thisWeekSunday)->count();

        return view('livewire.admin.dashboard', [
            'latestAccounts' => $latestAccounts,
            'userCount' => $userCount,
            'adminUserCount' => $adminUserCount,
            'verifiedAccountCount' => $verifiedAccountCount,
            'uploadFilesCount' => $uploadFilesCount,
            'latestDocuPostData' => $latestDocuPostData,
            'notFixedReportedComments' => $notFixedReportedComments,
            'pendingPost' => $pendingPost,
            'totalFiles' => $totalFiles,
            'fixedReportedComment' => $fixedReportedComment,
            'folderInfo' => $folderInfo,
            'loginCountMonday' => $loginCountMonday,
            'loginCountTuesday' => $loginCountTuesday,
            'loginCountWednesday' => $loginCountWednesday,
            'loginCountThursday' => $loginCountThursday,
            'loginCountFriday' => $loginCountFriday,
            'loginCountSaturday' => $loginCountSaturday,
            'loginCountSunday' => $loginCountSunday
        ])->layout('layout.admin');
    }
}
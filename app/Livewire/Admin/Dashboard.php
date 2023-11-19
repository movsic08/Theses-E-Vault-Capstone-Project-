<?php

namespace App\Livewire\Admin;

use App\Charts\SampleChart;
use App\Charts\UserLogInsChart;
use App\Models\DocuPost;
use App\Models\ReportedComment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

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
        $reportedComments = ReportedComment::where('report_status', 0)->count();

        $pendingPost = DocuPost::where('status', 0)->count();

        $latestDocuPostData = DocuPost::latest()->take(5)->get();

        $totalFiles = $this->getTotalFilesInPublicStorage();

        $folderInfo = $this->getFolderInfoInPublic();

        return view('livewire.admin.dashboard', [
            'latestAccounts' => $latestAccounts,
            'userCount' => $userCount,
            'adminUserCount' => $adminUserCount,
            'verifiedAccountCount' => $verifiedAccountCount,
            'uploadFilesCount' => $uploadFilesCount,
            'latestDocuPostData' => $latestDocuPostData,
            'reportedComments' => $reportedComments,
            'pendingPost' => $pendingPost,
            'totalFiles' => $totalFiles,

            'folderInfo' => $folderInfo,


        ])->layout('layout.admin');
    }
}
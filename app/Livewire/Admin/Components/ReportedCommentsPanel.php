<?php

namespace App\Livewire\Admin\Components;

use App\Models\ReportedComment;
use Livewire\Component;
use Livewire\WithPagination;

class ReportedCommentsPanel extends Component
{
    use WithPagination;
    public function placeholder()
    {
        return view('livewire.placeholder.reported_comment_list_skeleton');
    }

    public $currentData, $resolving = false, $updateStatus = 0;

    public function showBox($itemID)
    {
        $this->currentData = ReportedComment::where('id', $itemID)->first();
        $this->dispatch('open-box');
    }

    public function showResolving()
    {
        $this->resolving = true;
    }

    public function closeBox()
    {
        $this->dispatch('close-box');
        // return $this->currentData = '';
    }


    public $search, $paginate = 10, $commentStatus = 'all', $selectedDate, $category_report = 'all';
    public function render()
    {
        sleep(1); // Optional sleep

        $query = ReportedComment::with('comment')->latest();

        if (isset($this->search)) {
            $query->whereHas('comment', function ($subquery) {
                $subquery->where('comment_content', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->commentStatus != 'all') {
            $reportCommentList = $query->where('report_status', $this->commentStatus);
        }

        if ($this->category_report != 'all') {
            $reportCommentList = $query->where('report_title', $this->category_report);
        }

        if ($this->selectedDate) {
            $reportCommentList = $query->whereDate('created_at', $this->selectedDate);
        }

        $reportCommentList = $query->paginate($this->paginate);

        return view('livewire.admin.components.reported-comments-panel', [
            'reportCommentList' => $reportCommentList,
        ]);
    }
}

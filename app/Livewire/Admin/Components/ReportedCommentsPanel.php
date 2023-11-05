<?php

namespace App\Livewire\Admin\Components;

use App\Models\DocuPost;
use App\Models\DocuPostComment;
use App\Models\Notification;
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

    private function somethingWentWrong()
    {
        request()->session()->flash('error', 'Something went wrong in removing the comment.');
    }
    public function saveUpdate($id)
    {
        $isUpdatedReportedComment = ReportedComment::where('id', $id)->first();
        $mainDocuPost = DocuPost::where('id', $isUpdatedReportedComment->docu_post_id)->first();
        $mainDocuPostComment = DocuPostComment::where('id', $isUpdatedReportedComment->reported_comment_id)->first();
        if (!$mainDocuPost) {
            $this->closeBox();
            $isUpdatedReportedComment->delete();
            return request()->session()->flash('success', 'DocuPost is not found, comment report is now considered deleted.');
        }
        if (!$mainDocuPostComment) {
            $this->closeBox();
            $isUpdatedReportedComment->delete();
            return request()->session()->flash('success', 'DocuPost is not found, comment report is now considered deleted.');
        }

        if ($this->updateStatus == 2) {
            $createNotification = Notification::create([
                'user_id' => $isUpdatedReportedComment->reporter_user_id,
                'header_message' => '📝 Feedback on Reported Comment',
                'content_message' => 'Your reported comment "<strong>' . $mainDocuPostComment->comment_content . '</strong>" has been reviewed by an admin. It has been found not to be in violation of our guidelines. Please feel free to continue participating in our community discussions.',
                'link' => route('view-document', ['reference' => $mainDocuPost->reference]),
                'category' => 'comment_report_feedback',
            ]);
            if ($createNotification) {
                $this->dispatch('close-box');
                request()->session()->flash('success', 'Comment report is deleted.');
                $this->currentData = '';
                $this->updateStatus = 0;
                $this->resolving = false;
                $isUpdatedReportedComment->delete();
            } else {
                $this->somethingWentWrong();
            }
        } elseif ($this->updateStatus == 0) {
            $isUpdatedReportedComment->update([
                'report_status' => 0,
            ]);

            if ($isUpdatedReportedComment) {
                ReportedComment::where('reported_comment_id', $isUpdatedReportedComment->reported_comment_id)->update([
                    'report_status'
                    => 0
                ]);
                $mainCommentData = DocuPostComment::where('id', $isUpdatedReportedComment->reported_comment_id)->first();
                if ($mainCommentData) {
                    $isHidden = $mainCommentData->update([
                        'status' => 0,
                    ]);
                    if ($isHidden) {
                        request()->session()->flash('success', 'Na update na din sa document comment');

                    } else {
                        $this->somethingWentWrong();
                    }
                } else {
                    $this->somethingWentWrong();
                }

            } else {
                request()->session()->flash('error', 'Resolving reported comment failed, contact devs.');
            }
        } else {
            $isUpdatedReportedComment->update([
                'report_status' => 1,
            ]);

            if ($isUpdatedReportedComment) {
                ReportedComment::where('reported_comment_id', $isUpdatedReportedComment->reported_comment_id)->update([
                    'report_status'
                    => 1
                ]);
                $mainCommentData = DocuPostComment::where('id', $isUpdatedReportedComment->reported_comment_id)->first();
                if ($mainCommentData) {
                    $isHidden = $mainCommentData->update([
                        'status' => 1,
                    ]);
                    if ($isHidden) {
                        $sendNotifcationViolationConfirm = Notification::create([
                            'user_id' => $isUpdatedReportedComment->reporter_user_id,
                            'header_message' => '🚫 Comment Report Violation Notice',
                            'content_message' => 'We have reviewed your reported comment on the document. It has been found to be in violation of our community guidelines. Here is your comment for reference: "<strong>' . $mainDocuPostComment->comment_content . '</strong>". Please review our guidelines and ensure compliance for future comments.',
                            'link' => route('view-document', ['reference' => $mainDocuPost->reference]),
                            'category' => 'comment_report_feedback',
                        ]);
                        if ($sendNotifcationViolationConfirm) {
                            $this->dispatch('close-box', function () {
                                $this->currentData = '';
                                $this->updateStatus = 0;
                                $this->resolving = false;
                            });
                            request()->session()->flash('success', 'Comment violation confirm success.');
                            $isUpdatedReportedComment->delete();
                        } else {
                            $this->somethingWentWrong();
                        }
                        request()->session()->flash('success', 'Na update na din sa document comment');
                    } else {
                        $this->somethingWentWrong();
                    }
                } else {
                    $this->somethingWentWrong();
                }

            } else {
                request()->session()->flash('error', 'Resolving reported comment failed, contact devs.');
            }
        }

        $this->closeBox();
    }


    public function addMarkReport($id)
    {
        $this->showBox($id);
        $this->showResolving($id);
    }
    public function showResolving($id)
    {
        $getData = ReportedComment::where('id', $id)->first();
        $this->updateStatus = $getData->report_status;
        $this->resolving = true;
    }

    public function closeBox()
    {
        $this->dispatch('close-box', function () {
            $this->resolving = false;
            $this->updateStatus = '';
            $this->currentData = null;
        });
    }

    public $delData = null;
    public function showDel($id)
    {
        $checkData = ReportedComment::where('id', $id)->first();
        if ($checkData) {
            $this->delData = $checkData;
        } else {
            $this->somethingWentWrong();
        }
        $this->dispatch('open-rem');
    }

    public function confirmDelete($id)
    {
        $isDeleted = ReportedComment::where('id', $id)->delete();
        if ($isDeleted) {
            $this->closeDel();
            request()->session()->flash('success', 'Deleting success.');
        } else {
            $this->closeDel();
            $this->somethingWentWrong();
        }
        return;
    }

    public function closeDel()
    {
        $this->dispatch('close-rem', function () {
            $this->delData = null;
        });
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

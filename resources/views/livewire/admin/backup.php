<?php
if ('') {

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
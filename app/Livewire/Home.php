<?php

namespace App\Livewire;

use App\Models\BachelorDegree;
use App\Models\BookmarkList;
use App\Models\DocuPost;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    public $bachelorDegree, $latestDocuPostData;

    public $skeletonData = null, $bookmarkItemChecker, $authenticatedUser;

    public function mount()
    {
        $this->authenticatedUser = auth()->user();
        // dd( $this->authenticatedUser );
    }

    public function bookmarkItem($id, $reference)
    {
        if (!auth()->check()) {
            request()->session()->flash('message', 'You need to sign in first');
        } else {
            $checkInfoData = empty($this->authenticatedUser->last_name && $this->authenticatedUser->first_name && $this->authenticatedUser->last_name &&
                $this->authenticatedUser->address &&
                $this->authenticatedUser->phone_no &&
                $this->authenticatedUser->student_id &&
                $this->authenticatedUser->bachelor_degree);
            if ($checkInfoData) {
                request()->session()->flash('message', 'Account information details are incomplete, fill out now here.');
            } else {
                if ($this->authenticatedUser->is_verified == 0) {
                    request()->session()->flash('message', 'Verify your account now, to enjoy the full features for free.');
                } else {
                    $userID = Auth::id();
                    $checkBookmarkItem = BookmarkList::where('user_id', $userID)
                        ->where('docu_post_id', $id)
                        ->count();
                    if ($checkBookmarkItem > 0) {
                        BookmarkList::where('user_id', $userID)
                            ->where('docu_post_id', $id)
                            ->delete();

                    } else {
                        BookmarkList::create([
                            'user_id' => $userID,
                            'docu_post_id' => $id,
                            'reference' => $reference,
                        ]);
                    }
                }
            }
        }
        return;
    }

    public function placeholder()
    {
        return view('skeletons.home-data-skeleton');
    }

    public function render()
    {

        $docuPostData = DocuPost::where('status', 1)
            ->inRandomOrder()->paginate(10);
        $this->bachelorDegree = BachelorDegree::all();
        $this->latestDocuPostData = DocuPost::latest()->take(5)->get();
        return view('livewire.home', [
            'docuPostData' => $docuPostData
        ])->layout('layout.app');
    }

}
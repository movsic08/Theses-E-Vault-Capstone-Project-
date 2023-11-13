<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\Component;

class DocuSearchResult extends Component
{

    #[Url()]
    public $search;
    public $results, $resultsCount, $authenticatedUser;



    public function mount()
    {
        $this->search = Route::current()->parameter('search');
        // dd($this->search);
        $this->results = DocuPost::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_1', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_2', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_3', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_4', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_5', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_6', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_7', 'like', '%' . $this->search . '%')
            ->orWhere('keyword_8', 'like', '%' . $this->search . '%')
            ->get();

        $this->resultsCount = count($this->results);
        $this->authenticatedUser = auth()->user();
    }

    public $newSearch;
    public function searchNewDocu()
    {
        $this->search = $this->newSearch;
        $this->results = DocuPost::where('title', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_1', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_2', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_3', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_4', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_5', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_6', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_7', 'like', '%' . $this->newSearch . '%')
            ->orWhere('keyword_8', 'like', '%' . $this->newSearch . '%')
            ->get();

        $this->resultsCount = count($this->results);
        $this->dispatch('formSubmitted');
    }

    public $isBookmarked;

    public function bookmark($id, $reference)
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

    public function render()
    {
        return view('livewire.docu-search-result')->layout('layout.app');
    }
}
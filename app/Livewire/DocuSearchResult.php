<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\Component;

class DocuSearchResult extends Component
{

    public $query, $authenticatedUser;

    public function mount()
    {
        $this->query = Request::get('q');
        $this->authenticatedUser = auth()->user();
    }

    // #[Url(keep: true)]
    public $search = '', $oldSearch;

    // public $results, $resultsCount;
    // public $newSearch;
    public function searchNewDocu()
    {
        $this->oldSearch = $this->query;
        return redirect()->route('search-result-page', ['q' => $this->search]);
    }

    public $isBookmarked;

    public function bookmark($id, $reference)
    {
        // dd($this->authenticatedUser);
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
        $results = DocuPost::where('keyword_1', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_2', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_3', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_4', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_5', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_6', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_7', 'like', '%' . $this->query . '%')
            ->orWhere('keyword_8', 'like', '%' . $this->query . '%')
            ->orWhere('title', 'like', '%' . $this->query . '%')
            ->get();
        // dd($results);
        $resultsCount = count($results);
        // $this->searchNewDocu($this->search);
        return view('livewire.docu-search-result', [
            'resultsCount' => $resultsCount,
            'results' => $results,
        ])->layout('layout.app');
    }
}
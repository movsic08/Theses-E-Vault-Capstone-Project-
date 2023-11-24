<?php

namespace App\Livewire;

use App\Models\BookmarkList;
use App\Models\DocuPost;
use App\Models\DocuPostView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DocuSearchResult extends Component
{
    use WithPagination;

    public $query, $authenticatedUser;

    public function mount()
    {
        $this->query = Request::get('q');
        $this->authenticatedUser = auth()->user();
        $this->search = $this->query;
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

    public $isBookmarked, $sort_by = 'relevance', $items = 5;

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

    public $shareLink;
    public function share($reference)
    {
        $this->shareLink = route('view-document', ['reference' => $reference]);
        return $this->dispatch('open-shr');
    }

    public function viewsCount($postId)
    {

        $postView = DocuPostView::where('post_id', $postId)->first();

        if ($postView) {
            $postView->increment('views_count');
        } else {
            DocuPostView::create([
                'post_id' => $postId,
                'views_count' => 1,
            ]);
        }

    }
    public function render()
    {
        // dd(phpinfo());
        $results = DocuPost::where('status', 1)
            ->where(function ($query) {
                $query->where('document_type', '=', $this->query)
                    ->orWhere('course', '=', $this->query)
                    ->orWhere('keyword_1', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_2', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_3', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_4', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_5', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_6', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_7', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_8', 'like', '%' . $this->query . '%')
                    ->orWhere('title', 'like', '%' . $this->query . '%');
            })
            ->when($this->sort_by === 'a-z', function ($query) {
                $query->orderBy('title', 'asc');
            })
            ->when($this->sort_by === 'z-a', function ($query) {
                $query->orderBy('title', 'desc');
            })
            ->when($this->sort_by === 'newest', function ($query) {
                $query->orderBy('date_of_approval', 'desc');
            })
            ->when($this->sort_by === 'oldest', function ($query) {
                $query->orderBy('date_of_approval', 'asc');
            })
            ->when($this->sort_by === 'most_cited', function ($query) {
                $query->orderBy('citation_count', 'desc');
            })
            ->paginate($this->items);


        $resultsCount = count($results);

        $trendingPosts = DocuPost::orderBy('view_count', 'desc')->take(5)->get();

        $documentTypes = DocuPost::pluck('document_type')->unique();

        $documentTypeCounts = [];

        foreach ($documentTypes as $type) {
            $count = DocuPost::where('document_type', $type)->count();
            $documentTypeCounts[$type] = $count;
        }



        // $this->searchNewDocu($this->search);
        return view('livewire.docu-search-result', [
            'resultsCount' => $resultsCount,
            'results' => $results,
            'trendingPosts' => $trendingPosts,
            'count' => count($trendingPosts),
            'documentTypeCounts' => $documentTypeCounts,
        ])->layout('layout.app');
    }



}
<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\BookmarkList;
use App\Models\DocuPost;
use App\Models\DocuPostView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class AdvancedSearchResults extends Component
{
    use WithPagination;

    public $query, $authenticatedUser, $dateMYOnly, $language, $datepicker, $dateRangeStart, $dateRangeEnd;
    #[Url]
    public $docuTypeInput;
    public function mount()
    {
        $this->query = Request::get('q');
        $this->authenticatedUser = auth()->user();
        $this->search = $this->query;
        $this->dateMYOnly = Request::get('dateMYOnly');
        $this->docuTypeInput = Request::get('documentType');
        $this->language = Request::get('lang');
        $this->datepicker = Request::get('datePicked');
        $this->dateRangeStart = Request::get('dateRangeStart');
        $this->dateRangeEnd = Request::get('dateRangeEnd');
    }
    protected $rules = [
        'search' => 'required|min:1',
        'dateMYOnly' => 'nullable|required_if:datepicker,month-and-year-only|date',
        'dateRangeStart' => 'nullable|required_if:datepicker,date-range|date',
        'dateRangeEnd' => 'nullable|required_if:datepicker,date-range|date',
    ];

    protected $messages = [
        'search.required' => 'The search field is required.',
        'search.min' => 'The search field must be at least :min characters.',
        'dateMYOnly.required_if' => 'The Date month and year field is required when datepicker is month-and-year-only.',
        'dateMYOnly.date' => 'The Date month and year field must be a valid date.',
        'dateRangeEnd.required_if' => 'The Date range field is required when datepicker is date-range.',
        'dateRangeEnd.date' => 'The Date range field must be a valid date.',
        'dateRangeStart.required_if' => 'The Date range field is required when datepicker is date-range.',
        'dateRangeStart.date' => 'The Date range field must be a valid date.',
    ];
    public function searchNewDocu()
    {

        $this->validate();

        return redirect()->route('advanced-search-result-page', [
            'q' => $this->search,
            'datePicked' => $this->datepicker,
            'dateMYOnly' => $this->dateMYOnly,
            'dateRangeStart' => $this->dateRangeStart,
            'dateRangeEnd' => $this->dateRangeEnd,
            'documentType' => $this->docuTypeInput,
            'lang' => $this->language,
        ]);

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
    public $search = '', $oldSearch;
    public function render()
    {
        // dd(phpinfo());
        $results = DocuPost::where('status', 1)
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_1', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_2', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_3', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_4', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_5', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_6', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_7', 'like', '%' . $this->query . '%')
                    ->orWhere('keyword_8', 'like', '%' . $this->query . '%');
            })
            ->when($this->docuTypeInput !== 'all', function ($query) {
                $query->where('document_type', $this->docuTypeInput);
            })
            ->when($this->datepicker == 'month-and-year-only', function ($query) {
                if ($this->dateMYOnly) {
                    list($year, $month) = explode('-', $this->dateMYOnly);
                    $query->whereYear('date_of_approval', $year)
                        ->whereMonth('date_of_approval', $month);
                }
            })
            ->when($this->datepicker == 'date-range', function ($query) {
                if ($this->dateRangeStart && $this->dateRangeEnd) {
                    list($startYear, $startMonth) = explode('-', $this->dateRangeStart);
                    list($endYear, $endMonth) = explode('-', $this->dateRangeEnd);
                    $query->whereBetween('date_of_approval', ["$startYear-$startMonth", "$endYear-$endMonth"]);
                }
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


        $documentTypes = DocuPost::distinct('document_type')->pluck('document_type');
        $documentLanguage = DocuPost::distinct('language')->pluck('language');

        $documentTypeCounts = [];

        foreach ($documentTypes as $type) {
            $count = DocuPost::where('document_type', $type)->count();
            $documentTypeCounts[$type] = $count;
        }

        // return view('livewire.user.advanced-search-results');

        // $this->searchNewDocu($this->search);
        return view('livewire.user.advanced-search-results', [
            'resultsCount' => $resultsCount,
            'results' => $results,
            'trendingPosts' => $trendingPosts,
            'count' => count($trendingPosts),
            'documentTypeCounts' => $documentTypeCounts,
            'documentTypes' => $documentTypes,
            'documentLanguage' => $documentLanguage,
        ])->layout('layout.app');
    }

}

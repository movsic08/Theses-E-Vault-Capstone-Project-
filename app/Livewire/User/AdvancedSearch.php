<?php

namespace App\Livewire\User;

use App\Models\DocuPost;
use Livewire\Component;

class AdvancedSearch extends Component
{
    public $search, $datepicker = 'month-and-year-only', $dateMYOnly, $dateRangeStart, $dateRangeEnd, $docuTypeInput = 'all', $language = 'all';
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

    public function findResult()
    {
        // dd($this->docuTypeInput);   
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

    public $advancedSearch;
    public function render()
    {
        $documentTypes = DocuPost::distinct('document_type')->pluck('document_type');

        return view('livewire.user.advanced-search', [
            'documentTypes' => $documentTypes,
        ]);
    }
}

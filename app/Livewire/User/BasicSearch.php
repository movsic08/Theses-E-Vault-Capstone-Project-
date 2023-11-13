<?php

namespace App\Livewire\User;

use App\Models\DocuPost;
use Livewire\Component;

class BasicSearch extends Component
{


    public $search;

    public function findResult()
    {

        $this->validate([
            "search" => 'min:1',
        ]);

        return redirect()->route('search-result-page', ['q' => $this->search]);
    }

    public function render()
    {
        $latestDocu = DocuPost::latest()
            ->where('status', 1)
            ->take(5)
            ->get();
        return view('livewire.user.basic-search', [
            'latestDocu' => $latestDocu,
        ]);
    }
}

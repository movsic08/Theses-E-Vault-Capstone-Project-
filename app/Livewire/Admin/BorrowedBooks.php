<?php

namespace App\Livewire\Admin;

use App\Models\BorrowersLogbook;
use Livewire\Component;

class BorrowedBooks extends Component
{
    public function render()
    {
        $today = now();
        $borrowerBooksLists = BorrowersLogbook::whereDate('created_at', $today)->get();
        return view('livewire.admin.borrowed-books', compact('borrowerBooksLists'));

    }
}
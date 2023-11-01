<?php

namespace App\Livewire\Admin;

use App\Models\BorrowersLogbook;
use Livewire\Component;

class BorrowedBooks extends Component
{
    public $findByDate;
    public function render()
    {
        $today = now();
        $query = BorrowersLogbook::query(); // Create a query builder instance
        $borrowerBooksLists = $query->get(); // Get all records first

        if ($this->findByDate) {
            $query->whereDate('created_at', $this->findByDate); // Apply the date filter
            $borrowerBooksLists = $query->get(); // Get the filtered results
        } else {
            $query->whereDate('created_at', $today);
            $borrowerBooksLists = $query->get();
        }
        return view('livewire.admin.borrowed-books', compact('borrowerBooksLists'));
    }

}
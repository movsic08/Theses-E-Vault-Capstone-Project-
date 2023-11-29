<?php

namespace App\Livewire\Admin;

use App\Models\BorrowersLogbook;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class BorrowedBooks extends Component
{
    public $findByDate, $categoryQuery = 'all';
    public function render()
    {
        $today = now();
        $query = BorrowersLogbook::query(); // Create a query builder instance
        $borrowerBooksLists = $query->get();

        if ($this->findByDate) {
            $query->whereDate('created_at', $this->findByDate); // Apply the date filter
        } else {
            $query->whereDate('created_at', $today);
            $borrowerBooksLists = $query->get();
        }

        if ($this->categoryQuery != 'all') {
            $query->where('collection', $this->categoryQuery);
            $borrowerBooksLists = $query->get();
        }

        return view('livewire.admin.borrowed-books', compact('borrowerBooksLists'));
    }


    public function exportFilev2()
    {
        //file name
        $filename = 'logbook.xlsx';
        $today = now();
        $query = BorrowersLogbook::query(); // Create a query builder instance
        $borrowerBooksLists = $query->get(); // Get all records first


        // If a specific date is selected, apply the date filter
        if ($this->findByDate) {
            $filename = 'Logbook_' . $this->findByDate . '.xlsx';
            $query->whereDate('created_at', $this->findByDate);
            $borrowerBooksLists = $query->get(); // Get the filtered results
        } else {
            $filename = 'Logbook_' . $today->format('m-d-Y') . '.xlsx';
            $query->whereDate('created_at', $today);
            $borrowerBooksLists = $query->get();
        }


        // Create an array for data to be exported
        $dataToDump = [];

        // Populate the data array
        if ($borrowerBooksLists->count() != 0) {
            foreach ($borrowerBooksLists as $borrower) {
                $dataToDump[] = [
                    'Date' => $borrower->created_at->format('M d Y'),
                    'Name' => $borrower->name,
                    'Course and Year Level' => 'N/A', // Replace with the actual value from your data
                    'Category of Collections' => $borrower->category,
                    'Title' => $borrower->title,
                    'Authors' => $borrower->author,
                    'Reference' => $borrower->reference,
                ];
            }
        }

        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setTitle('My Sheet');

        // Sample column names
        $columnNames = [
            'Date',
            'Name',
            'Course and Year Level',
            'Category of Collections',
            'Title',
            'Authors',
            'Reference',
        ];

        // Add column names and make them bold
        $row = 1;
        $col = 'A';
        $boldFontStyle = [
            'font' => [
                'bold' => true,
            ],
        ];

        foreach ($columnNames as $columnName) {
            $worksheet->setCellValue($col . $row, $columnName);
            $worksheet->getStyle($col . $row)->applyFromArray($boldFontStyle);
            $col++;
        }

        // Add the data to the worksheet
        $row = 2;
        foreach ($dataToDump as $data) {
            $col = 'A';
            foreach ($data as $value) {
                $worksheet->setCellValue($col . $row, $value);
                $col++;
            }
            $row++;
        }

        // Auto-expand column widths to fit the content
        foreach (range('A', $col) as $columnID) {
            $worksheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Create a writer to save the spreadsheet
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');


        // Define the response
        $response = response()
            ->stream(
                function () use ($writer) {
                    $writer->save('php://output');
                },
                200, // HTTP status code
                [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Content-Disposition' => 'attachment;filename=' . $filename,
                ]
            );

        return $response;
    }

}
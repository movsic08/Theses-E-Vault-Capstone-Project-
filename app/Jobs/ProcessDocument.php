<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessDocument implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $component;

    public function __construct( $component ) {
        $this->component = $component;
    }

    public function handle() {
        $this->component->updateProgress( 10, 'Checking inputs' );
        // Your document processing logic here

        $this->component->updateProgress( 20, 'Validating information' );
        // More processing and validation

        $this->component->updateProgress( 50, 'No error found' );
        // Additional processing

        $this->component->updateProgress( 99, 'Success' );
        // Complete the processing

        $this->component->showProgressBox = false;
    }
}
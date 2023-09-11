<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileEditTab extends Component {

    public $tab = 2;

    public $count = 0;

    public function up() {
        $this->count++;
    }

    public function down() {
        $this->count--;
    }

    public function switchTab( $tabNum ) {
        if ( $tabNum == 1 ) {
            $this->tab = 1;
        }
        if ( $tabNum == 2 ) {
            $this->tab = 2;
        }
        if ( $tabNum == 3 ) {
            $this->tab = 3;
        }
        if ( $tabNum == 4 ) {
            $this->tab = 4;
        }
    }

    public function render() {
        return view( 'livewire.profile-edit-tab' );
    }
}
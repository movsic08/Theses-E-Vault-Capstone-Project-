<?php

namespace App\Livewire\Admin\Components;

use Livewire\Attributes\Url;
use Livewire\Component;

class SystemSetting extends Component
{
    #[Url()]
    public $activeTab = 'tab1';

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
        // $this->dispatch('popstate', $tab);
    }

    public function render()
    {
        return view('livewire.admin.components.system-setting');
    }
}

<?php

namespace App\Http\Livewire\SavedTemplates;

use App\Models\SaveResumePage;
use Illuminate\Http\Request;
use Livewire\Component;

class SavedResumes extends Component
{
    public
    $RequestedPageID;

    public function mount(Request $Req)
    {
        $this->RequestedPageID = $Req->ID;
    }

    public function render(Request $Req)
    {
        $SavedPageCode = SaveResumePage::getSavedPageByID($this->RequestedPageID)->page_code;
        return view('livewire.saved-templates.saved-resumes', compact('SavedPageCode'));
    }
}

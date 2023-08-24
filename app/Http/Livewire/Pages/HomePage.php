<?php

namespace App\Http\Livewire\Pages;

use App\Models\Resume;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $Resumes = Resume::getResumes()->paginate(6);
        return view('livewire.pages.home-page',compact('Resumes'));
    }
}

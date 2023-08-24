<?php

namespace App\Http\Livewire\Pages;

use App\Models\Resume;
use Livewire\Component;
use Livewire\WithPagination;
class ResumeTemplates extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $Resumes = Resume::getResumes()->paginate(10);
        return view('livewire.pages.resume-templates',compact('Resumes'));
    }
}

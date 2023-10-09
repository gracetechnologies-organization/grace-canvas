<?php

namespace App\Http\Livewire\FrontPages;

use App\Models\Resume;
use Livewire\Component;
use Livewire\WithPagination;

class ResumeTemplates extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $Resumes = Resume::getResumes()->paginate(12);
        return view('livewire.front-pages.resume-templates', compact('Resumes'));
    }
}

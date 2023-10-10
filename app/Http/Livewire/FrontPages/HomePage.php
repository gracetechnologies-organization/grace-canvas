<?php

namespace App\Http\Livewire\FrontPages;

use App\Models\Resume;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $Resumes = Resume::getResumes()->inRandomOrder()->limit(6)->get();
        return view('livewire.front-pages.home-page', compact('Resumes'));
    }
}

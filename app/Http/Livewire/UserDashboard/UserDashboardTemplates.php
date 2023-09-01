<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardTemplates extends Component
{
    public function render()
    {
        $Resumes = Resume::getResumes()->paginate(3);
        return view('livewire.user-dashboard.user-dashboard-templates' ,['Resumes' => $Resumes]);
    }
}

<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\Resume;
use App\Models\SaveResumePage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Exception;

class UserDashboardTemplates extends Component
{
    public 
        $ResumePagesID,
        $cancelSuccessMessage,
        $deleteSuccessMessage,
        $UserID;

    public function mount()
    {
        $this->UserID = auth()->user()->id;
    }

    public function destroy($ResumePagesID)
    {
        try {
                $Destroy = SaveResumePage::find($ResumePagesID);
                $Destroy->forceDelete();

            if (!$Destroy) {
                return redirect()->back()->with('error', 'ResumePages not found.');
            }
            sleep(1);
            if ($Destroy) {
                session()->flash('success', config('messages.DELETION_SUCCESS'));
            } else {
                session()->flash('error', config('messages.DELETION_FAILED'));
            }
        } catch (Exception $error) {
            report($error);
            session()->flash('error', config('messages.EMPTY_ROW_DELETION'));
        }
    }

    public function render()
    {
        $SaveResumePages = SaveResumePage::getSavedPageByUserID($this->UserID);
        return view('livewire.user-dashboard.user-dashboard-templates' ,['SaveResumePages' => $SaveResumePages]);
    }
}

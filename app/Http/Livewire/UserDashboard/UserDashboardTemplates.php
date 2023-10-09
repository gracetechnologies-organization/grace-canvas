<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\SaveResumePage;
use Livewire\Component;
use Exception;
class UserDashboardTemplates extends Component
{
    public
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
            $Deleted = SaveResumePage::deletePage($ResumePagesID);
            sleep(1);
            if ($Deleted) {
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

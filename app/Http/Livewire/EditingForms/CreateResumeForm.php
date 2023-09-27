<?php

namespace App\Http\Livewire\EditingForms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateResumeForm extends Component
{
    public
        $ExperienceForm = [],
        $QualificationForm = [],
        $SkillForm = [],
        $AchievementForm = [],
        $ProjectForm = [],
        $InterestForm = [],
        $LanguageForm = [],
        $ReferenceForm = [],
        $RequestedTemplateID,
        $SavedTemplate = 'null';

    public function mount(Request $Req)
    {
        $this->RequestedTemplateID = $Req->ID;
    }

    public function addNewExperience()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->ExperienceForm) === 2) ? session()->flash('ExperienceForm', config('messages.EXPERIENCES_LIMIT_REACHED')) : $this->ExperienceForm[] = [];
    }

    public function addNewQualification()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->QualificationForm) === 2) ? session()->flash('QualificationForm', config('messages.QUALIFICATIONS_LIMIT_REACHED')) : $this->QualificationForm[] = [];
    }

    public function delForm($FormName, $Index)
    {
        unset($this->$FormName[$Index]);
    }

    public function render()
    {
        $DirectoryName = $this->RequestedTemplateID;
        $FileName = $this->RequestedTemplateID . '_resumes';
        $ResumeFile = 'resumes.' . $DirectoryName . '.' . $FileName;
        return view('livewire.editing-forms.create-resume-form', ['ResumeFile' => $ResumeFile]);
    }
}

<?php

namespace App\Http\Livewire\EditingForms;

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
        $ReferenceForm = [];


    public function mount()
    {
        $this->ExperienceForm = [1];
        $this->QualificationForm = [1];
        $this->SkillForm = [1];
        $this->AchievementForm = [1];
        $this->ProjectForm = [1];
        $this->InterestForm = [1];
        $this->LanguageForm = [1];
        $this->ReferenceForm = [1];
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

    public function addNewSkill()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->SkillForm) === 4) ? session()->flash('SkillForm', config('messages.SKILLS_LIMIT_REACHED')) : $this->SkillForm[] = [];
    }

    public function addNewAchievement()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->AchievementForm) === 4) ? session()->flash('AchievementForm', config('messages.ACHIEVEMENT_LIMIT_REACHED')) : $this->AchievementForm[] = [];
    }

    public function addNewProject()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->ProjectForm) === 4) ? session()->flash('ProjectForm', config('messages.PROJECTS_LIMIT_REACHED')) : $this->ProjectForm[] = [];
    }

    public function addNewInterest()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->InterestForm) === 3) ? session()->flash('InterestForm', config('messages.INTERESTS_LIMIT_REACHED')) : $this->InterestForm[] = [];
    }

    public function addNewLanguage()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->LanguageForm) === 4) ? session()->flash('LanguageForm', config('messages.LANGUAGES_LIMIT_REACHED')) : $this->LanguageForm[] = [];
    }

    public function addNewReference()
    {
        /*
        |--------------------------------------------------------------------------
        | The following code will show an error message
        | Otherwise it will add a new index into the array   
        |--------------------------------------------------------------------------
        */
        (count($this->ReferenceForm) === 2) ? session()->flash('ReferenceForm', config('messages.REFERENCES_LIMIT_REACHED')) : $this->ReferenceForm[] = [];
    }

    public function delForm($FormName, $Index)
    {
        unset($this->$FormName[$Index]);
    }

    public function render()
    {
        return view('livewire.editing-forms.create-resume-form');
    }
}

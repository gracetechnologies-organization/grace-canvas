<?php

namespace App\Http\Controllers;

use app\Contracts\DefaultMethods;
use Illuminate\Http\Request;

class TestModelController extends Controller
{

    public $DefaultMethods;

    public function __construct(DefaultMethods $DefaultMethods)
    {
        $this->DefaultMethods = $DefaultMethods;
    }

    public function show()
    {
        return $this->DefaultMethods->getAll();
    }

    public function showBirthdayTemplates()
    {
        return $this->DefaultMethods->getAll();
    }
}



<?php

namespace App\Services;


final class StripeHelpers {

    public static function createUserIntent()
    {
        return auth()->user()->createSetupIntent() ;
    }
}


<?php

namespace App\Services;

use App\Models\Country;

class CategoriesService
{
    public function get()
    {
        return Country::all();
    }

}
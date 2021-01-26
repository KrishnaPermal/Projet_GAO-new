<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function search() 
    {
        $customers = CustomersModel::get();

        return $customers;
    }
}

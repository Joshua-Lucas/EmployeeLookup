<?php

namespace App\Http\Controllers;

use App\employee;
use App\Http\Resources\Employee as ResourcesEmployee;
use App\Http\Resources\EmployeeCollection;
use App\location;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = employee::all();


        return $employees;
    }
}

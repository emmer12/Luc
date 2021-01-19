<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCom;
use App\UserRes;

class AdminController extends Controller
{
    public function dashboard()
    {
        $properties=UserRes::paginate(10);
        return view("admin.adminDashboard")->with([
            'properties'=>$properties
        ]);
    }

    public function commercialShow()
    {
        $properties=UserCom::paginate(10);
        return view("admin.adminDashcom")->with([
            'properties'=>$properties
        ]);
    }
}

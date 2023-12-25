<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    //
    public function index(){


        if(Auth::user()){
            // $data = $this->dashboardData();

            return view('admin.pages.dashboard');
        }
        return view('admin.auth.login');
    }

    public function dashboardData(): array
    {
        //last day visit
        //last month visit
        //today visit
        //team members
        //products for admin only

       return [];
    }

}

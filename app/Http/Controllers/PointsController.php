<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;
use App\Point;
use App\Customer;
use DB;


class PointsController extends Controller
{
    public function index()
    {
    	return view('offerlist');
    }
    public function calculate(Request $request)
    {
		$customers = DB::table('customerinfo')->get();
		$amount = $request->input('amount');
		$name = $request->input('name');
		$mobile_number = $request->input('mobile_number');
		
		$points = DB::table('point_rule')->get();
		$pointamt = DB::table('point_rule')->select('point', '100');
		$mobile_found = DB::table('customerinfo')->select('mobile_number', 'mobile_number as mobile_number');
		if($amount > 100 && $customers->mobile_number == $mobile_found && $name == $points->name)
		{
			$firstname = "";
			$pointamt = 1 + $pointamt;
			$success_msg = "Customer got " + $point;
		}
		//return redirect()->to('/offerlist/calculate');
  		return view('calculate', compact($points));
  		//return view('calculate');
  	}
}

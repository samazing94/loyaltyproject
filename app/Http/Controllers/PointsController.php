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

		
		$amount = $request->input('amount');
		$name = $request->input('name');
		
		$mobile_number = $request->input('mobile_number');
		$customers = DB::table('customerinfo')->where('mobile_number', $mobile_number)->first();		
		$points = DB::table('point_rule')->where('name', $name)->first();		


		$pointamt = DB::table('point_rule')->select('point')->first();
		//dd($points->name);
		if($amount > 100 && $customers->mobile_number == $mobile_number && $name == $points->name)
		{
			$firstname = "";
			$pointamt = 1 + $pointamt->point;
			// DB::table('point_rule')->where('name', $name)->update('point', $pointamt);
			// DB::table('point_rule')->where('name', $name)->update('min_amount', $amount);
			DB::table('point_rule')
            ->where('name', $name)
            ->update(['point' => $pointamt, 'min_amount' => $request->input('amount')]);
			//$success_msg = "Customer got " + $point;
		}
		//return redirect()->to('/offerlist/calculate');
  		return view('calculate', compact('points'));
  		//return view('calculate');
  	}
}

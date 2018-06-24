<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use Carbon\Carbon;
use App\Customer;
use DB;

class CustomerController extends Controller
{

   public function customer()
	{
		$title = 'Loyalty Customer';
		$customers = \App\Customer::all();
		return view('\customer\index', compact('title', 'customers'));
	}
	public function register()
	{
		$title = 'Loyalty Sign Up';
		return view('\customer\register', compact('title'));
	}

	 // public function success($rst) 
	 // {
	 // 	//return "Thank you for registering to " + $rst->hotkey + " for "+ $rst->subhotkey + " \n You got 100 Points!";
	 // }
	public function create(Request $request)
	{
		$hotkey = $request->input('hotkey');
		$subhotkey = $request->input('subhotkey');
		$dob = $request->input('dob');
		$profession = $request->input('profession');
		$location = $request->input('location');
		$phone = $request->input('phone');
		
		$rst = array('hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'dob' => $dob, 'profession' => $profession, 'location' => $location, 'phone' => $phone);
		DB::table('customers')->insert($rst);
		//success($rst);
		//return redirect()->to('/customer/success');
		//return 'xyz';
		return  "Thank you for registering.  You got 100 Points!";
	}

	public function getPosts()
	{
		return \DataTables::of(Customer::query())->make(true);
		//return datatables()->of(Restaurant::query())->toJson();
	}
}

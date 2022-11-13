<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\students;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('check_role');
    }
    
    //Dashboard index view
    function dashboard_index(){
        return view('Admin.index');
    }
    
    //Registration report
    function registration_report(){
        $all_registration_info = students::all();
        $totalAmount=students::where('status','=',1)->sum('Amount');
        $totalDonation=students::where('status','=',1)->sum('AmountExt');

        $total = (int)$totalAmount + (int)$totalDonation;
        return view('Admin.registration_report', compact('all_registration_info','totalAmount','totalDonation','total'));
    }
    //Student detail for making BR
    function student_detail()
    {
        $all_students = students::all();
        return view('Admin.student_detail_for_br', compact('all_students'));
    }
    //edit br status
    function edit_br_status($id)
    {
        $single_br_status = students::findOrFail($id);
        return view('Admin.edit_br_status', compact('single_br_status'));
    }
    // update br status
    function br_status_update(Request $request)
    {
        students::findOrFail($request->id)->update([
            'br_status' => $request->br_status,
        ]);
        return redirect(route('student_detail'))->with('Maked', 'BR!');
    }
}
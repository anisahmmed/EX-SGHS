<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\students;
use Illuminate\Support\Facades\File;


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
    function registration_report(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $all_registration_info = students::where('Batch', 'LIKE', "%$search%")->orwhere('BloodGroup', 'LIKE', "%$search%")->get();
        }else{
            $all_registration_info = students::all();
        }
        $totalAmount=students::where('status','=',1)->sum('Amount');
        $totalDonation=students::where('status','=',1)->sum('AmountExt');

        $total = (int)$totalAmount + (int)$totalDonation;
        return view('Admin.registration_report', compact('all_registration_info','totalAmount','totalDonation','total','search'));
    }
    //Registered student edit
    function student_edit($id)
    {
        $single_student_info = students::findOrFail($id);
        return view('Admin.manage.registered_student_edit', compact('single_student_info'));
    }
    //registered student update
    function registered_student_update(Request $request)
    {
        $request->validate([
            'FilePath' => 'image|max:800'
        ]);
        $single_registered_info = students::findOrFail($request->id);
        $single_registered_info->FullName = $request->FullName;
        $single_registered_info->Batch = $request->Batch;
        $single_registered_info->PhoneNumber = $request->PhoneNumber;
        $single_registered_info->Email = $request->Email;
        $single_registered_info->Profession = $request->Profession;
        $single_registered_info->ProfessionDetails = $request->ProfessionDetails;
        $single_registered_info->BloodGroup = $request->BloodGroup;
        $single_registered_info->PresentAddress = $request->PresentAddress;
        $single_registered_info->ParmanentAddress = $request->ParmanentAddress;
        $single_registered_info->Size = $request->Size;
        $single_registered_info->shift = $request->shift;

        if($request->hasfile('FilePath')){
            $destinaiton = 'Uploads/'. $single_registered_info->FilePath;
            if(File::exists($destinaiton)){
                File::delete($destinaiton);
            }
            $file = $request->file('FilePath');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Uploads/', $filename);
            $single_registered_info->FilePath = $filename;
        }
        $single_registered_info->update();
        return redirect(route('registration_report'))->with('success', 'Student info Updated Successfully!');
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
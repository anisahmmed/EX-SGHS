<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;


class TeacherController extends Controller
{
    function create_form()
    {
        return view('teacher.create');
    }

    //Teacher create
    function teacher_create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|unique:teacher|digits:11',
            'email' => 'required|email',
            'gender' => 'required',
            'present_address' => 'required|max:255',
            'permanent_address' => 'required|max:255',
            'position' => 'required',
            'status' => 'required',
            'sghs' => 'required',
            // 'batch' => $request->batch,
            'photo' => 'image|max:512',
        ]);
        
            $teacher = new Teacher;
            $no = $request->phone;
            $teacher->name = $request->name;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;
            $teacher->gender =$request->gender;
            $teacher->present_address = $request->present_address;
            $teacher->permanent_address = $request->permanent_address;
            $teacher->position = $request->position;
            $teacher->status = $request->status;
            $teacher->sghs_status = $request->sghs;
            $teacher->batch = $request->batch;
            
            if($request->hasfile('photo')){
                $file = $request->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = $no.'.'.$extention;
                $file->move('uploads/teachers/', $filename);
                $teacher->picture = $filename;
            }
        $teacher->save();
        $last_inserted_phone = $teacher->phone;
        $last_inserted_name = $teacher->name;
        // $all_info = Teacher::all();

        if($last_inserted_phone != 0){

            
            //sms
            $url = "https://bulksmsbd.net/api/smsapi";
            $api_key = "7Jq0TiUNZ7N4kEaaXLCy";
            $senderid = "8809601004500";
            $number = $last_inserted_phone;
            $message = "Dear ".$last_inserted_name."\nYour data has been stored to our database. Thank you.\nEX SGHS";
        
            $data_sms = [
                "api_key" => $api_key,
                "senderid" => $senderid,
                "number" => $number,
                "message" => $message,
                "type"=>"text"
            ];
            //dd($data_sms);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_sms);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
        }
        return redirect(route('success_message'));
    }

    function success_message()
    {
        return view('teacher.success');
    }
}

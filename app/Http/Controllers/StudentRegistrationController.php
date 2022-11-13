<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use App\Models\students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Home';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
      public function ForgotPasswordView()
    {
        return view('StudentRegistration.ForgotPasswordView');
    }

    public function ForgotPassword(Request $request)
    {
        $input = $request->all();
        //dd($input);

        
        $student = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
        if($student!=null)
        {
            if($student->status == 1)
            {
        $url = "https://bulksmsbd.net/api/smsapi";
        $api_key = "7Jq0TiUNZ7N4kEaaXLCy";
        $senderid = "8809601004500";
        $number = $student->phoneNumber;
        $message = "Dear, ".$student->FullName."\nYour login information is. "."\nUser ID: ".$student['PhoneNumber']."\nYour Password is: ".$student->password;
    
        $data_sms = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $student['PhoneNumber'],
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
        return redirect('Login')->with('success', 'Password sent to your phone!');
            }else{
                return redirect('Login')->with('fail', 'Phone number not valid!');
            }
        }
        else{
            return redirect('Login')->with('fail', 'Phone number not valid!');
        }
    }
     
    public function create()
    {
       
        return view('StudentRegistration.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $fd2 = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
        
        
        if($fd2!=null){
            if($fd2['status']==0){
                $fd2->delete();
            }
        }
        $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
        $batchcount = students::where('Batch','=',$input['Batch'])->count()+1;
        //dd($fd);
        //
        if($fd==null)
        {
            
            $fileName="";
            if($request->hasFile('FilePath')){ 
                $fileName = $input['PhoneNumber'].".".$request->file('FilePath')->getClientOriginalExtension();
                //dd($fileName);
                //echo $request->file('FilePath')->storeAs('Uploads',$fileName);
                echo $request->file('FilePath')->storeAs('Uploads',$fileName,'parent_disk');
            }
            if($input['Email']==null||$input['Email']=="")
            {
                $input['Email']="";
            }
            
            if($input['AmountExt']==0||$input['AmountExt']==""||$input['AmountExt']==null)
            {
                $input['AmountExt']=0;
            }
            $input['FilePath'] = $fileName;
            $input['status'] = 0;
            $input['password'] =self::generate_password();
            $input['UserId'] ="EXSGHS".(string)$input['Batch'].(string)$batchcount;
            students::create($input);
            $TotalAmount = $input['Amount'] + $input['AmountExt'];
            $fd2 = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
            //dd($fd2);
            $info = array( 
                'currency' => "BDT",
                'amount' => $TotalAmount, 
                'order_id' => (string)$fd2['id'], 
                'discsount_amount' =>0 , 
                'disc_percent' =>0 , 
                'client_ip' => "reg.ex-students-sghs.org", 
                'customer_name' => $fd2['FullName'], 
                'customer_phone' => $input['PhoneNumber'], 
                'customer_email' => $fd2['Email'], 
                'customer_address' => $fd2['PresentAddress'], 
                'customer_city' => "Dhaka", 
                'customer_state' => "Dhaka", 
                'customer_postcode' => "1212", 
                'customer_country' => "BD",
                'value1' => $fd2['PhoneNumber'],
            );
            $shurjopay_service = new ShurjopayController();
            return $shurjopay_service->checkout($info);

        }
        else{
            return redirect('Registration')->with('fail', 'Phone No already Used!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
     
     public function Login()
    {
        return view('StudentRegistration.Login');
    }
    // public function LoginSubmit(Request $request)
    // {
    //     // return view('StudentRegistration.Login');
    //     // return 'sfsfsf';
    //     $input = $request->all();
    //     //dd($input);
    //     $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
    //     if($fd==null)
    //     {
    //         return redirect('Login')->with('fail', 'User Not Found!');
    //     }else {
    //         //dd($input['password']);
    //         //dd($fd['password']);

    //         if($input['password']==$fd['password']){
    //             return $this->show($fd['PhoneNumber']);
    //         }else{
    //             return redirect('Login')->with('fail', 'Password invalid!');
    //         }
    //     }
        
    // }
    
    // public function LoginSubmit(Request $request)
    // {
    //     $input = $request->all();
    //     $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
    //     if($fd==null)
    //     {
    //         return redirect('Member-login')->with('fail', 'User Not Found!');
    //     }else {
    //         if($input['password']==$fd['password']){
    //             return $this->showUser($fd['PhoneNumber']);
    //         }else{
    //             return redirect('Member-login')->with('fail', 'Password invalid!');
    //         }
    //     }
        
    // }

    
    
    // public function Admin()
    // {
    //     return view('StudentRegistration.Admin');
    // }
    // public function AdminSubmit(Request $request)
    // {
        
    //     $input = $request->all();
    //     $fd = User::where('email','=',$input['PhoneNumber'])->first();
    //     if($fd==null)
    //     {
    //         return redirect('Admin')->with('fail', 'User Not Found!');
    //     }else {
            
    //         if($input['password']==$fd['password']){
    //             return redirect(route('dashboard_index'));
    //         }else{
    //             return redirect('Admin')->with('fail', 'Password invalid!');
    //         }
    //     }
        
    // }
    // public function showAdminDashBoard()
    // {
        
    //     return $this->showList();
    // }
    
    //  public function ProfileCall(Request $request)
    // {
    //     // return view('StudentRegistration.Login');
    //     // return 'sfsfsf';
    //     $input = $request->all();
    //     //dd($input);
    //     $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
        
    //     return $this->show($fd['PhoneNumber']);
        
    // }
    // public function show($f)
    // {
    //     //
    //     //dd($f);
    //     $profile = students::where('PhoneNumber','=',$f)->first();
    //     //dd($profile['FilePath']);
    //     if($profile['FilePath'] == null||$profile['FilePath'] == '')
    //     {
    //         $profile['FilePath']="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
    //     }else{
    //         //$profile['FilePath']=storage_path('app')."\\Uploads\\".$profile['FilePath'];
    //     }
    //     //dd($profile);
    //     return view('StudentRegistration.EditProfile',compact('profile'));
    // }

    // public function ProfileCall(Request $request)
    // {
        
    //     $input = $request->all();
        
    //     $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
    //     $type = 'User';
    //     return $this->show($fd['PhoneNumber']);
        
    // }


    // public function ProfileCallFromAdmin(Request $request)
    // {
        
    //     $input = $request->all();
        
    //     $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
        
    //     return $this->show($fd['PhoneNumber']);
        
    // }

    // public function showUser($f)
    // {
        
    //     $type= 'User';
    //     $profile = students::where('PhoneNumber','=',$f)->first();
        
        
    //     if($profile['FilePath'] == null||$profile['FilePath'] == '')
    //     {
    //         $profile['FilePath']="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
    //     }else{
           
    //     }
    //     return view('StudentRegistration.user_profile',compact('profile' ,'type'));
    // }

    public function show($f)
    {
        //
        //dd($f);

        $type='';
        $profile = students::where('PhoneNumber','=',$f)->first();
        
        //dd($profile['FilePath']);
        if($profile['FilePath'] == null||$profile['FilePath'] == '')
        {
            $profile['FilePath']="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
        }else{
           // $profile['FilePath']=storage_path('app')."\\Uploads\\".$profile['FilePath'];
            //$profile['FilePath']="storage/Uploads/".$profile['FilePath'];
        }
        //dd($profile);
        return redirect(route('user_dashboard'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $fd = students::where('PhoneNumber','=',$input['PhoneNumber'])->first();
        if($fd!=null)
        {
            $fileName="";
            if($request->hasFile('FilePath')){ 
                $fileName = $input['PhoneNumber'].".".$request->file('FilePath')->getClientOriginalExtension();
                //dd($fileName);
                //echo $request->file('FilePath')->storeAs('Uploads',$fileName);
                echo $request->file('FilePath')->storeAs('Uploads',$fileName,'parent_disk');
            }else{
                $fileName=$fd->FilePath;
            }
            
            $fd->FullName = $input['FullName'];
            $fd->Batch = $input['Batch'];
            $fd->PhoneNumber = $input['PhoneNumber'];
            $fd->Profession = $input['Profession'];
            $fd->ProfessionDetails = $input['ProfessionDetails'];
            $fd->BloodGroup = $input['BloodGroup'];
            $fd->DoB = $input['DoB'];
            $fd->PresentAddress = $input['PresentAddress'];
            $fd->ParmanentAddress = $input['ParmanentAddress'];
            $fd->Product = $input['Product'];
            $fd->Size = $input['Size'];
            $fd->FilePath = $fileName;
            $fd->Amount = $fd->Amount;
            $fd->Notes =  $fd->Notes;
            $fd->AmountExt = $fd->AmountExt;
            $fd->status = $fd->status;
            $fd->password = $input['password'];
            $fd->UserId =  $fd->UserId ;
            $fd->shift = $input['shift'];
            $fd->update();
        }
        return $this->show($fd['PhoneNumber']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        //dd($id);
        $input = $request->all();
        
        $stock = students::where('PhoneNumber','=',$input['id'])->first();
        $stock->delete(); // Easy right?
 
        return redirect('List')->with('success', 'Member removed.');  // -> resources/views/stocks/index.blade.php
    } 
    
    
    public function verifyPayment(Request $request)
    {
        $order_id = $request->order_id;
        $phone = $request->customer_phone;
        $shurjopay_service = new ShurjopayController();
        $data = $shurjopay_service->verify($order_id);
        $data2 = json_decode($data);
        //echo $data2['customer_order_id'];
        //dd(($data2[0]->sp_massage));
        //$student = students::find($request->order_id);
        $student = students::where('id','=',(integer)$data2[0]->customer_order_id)->first();
    if($data2[0]->sp_massage=="Success"){

        $student->status = 1;
        $student->update();
        //sms
        $url = "https://bulksmsbd.net/api/smsapi";
        $api_key = "7Jq0TiUNZ7N4kEaaXLCy";
        $senderid = "8809601004500";
        $number = $student->phoneNumber;
        $message = "Dear, ".$student->FullName."\nRegistration Confirmed. Please remember your Member ID.\nMember ID: ".$student->UserId."\nUser ID: ".$student['PhoneNumber']."\nPassword: ".$student->password."\nDetails In you email. Thank you.\nEX SGHS";
    
        $data_sms = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $student['PhoneNumber'],
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
        //dd($response);
        // $response = Http::get('http://test.com');
        //dd($student->Email);
        if($student->Email!=""){
        $data_mail=['name'=>$student->FullName,'Amount'=>$student->Amount,'UserId'=>$student->UserId,'password'=>$student->password, 'number'=>$student['PhoneNumber'],'Amount'=>$student['Amount'],'Donation'=>$student['AmountExt']];
        $user_mail['to']=$student->Email;
        Mail::send('mail',["data1"=>$data_mail] ,function($message)use($user_mail){
            $message->to($user_mail['to']);
            $message->subject('EX-SGHS');
        });
        }
        return view('success_page');
        
    }else{
        $student->delete();
        return redirect('Registration')->with('fail', 'Payment Not Done Yeat! Please register again');
    }
        // if($data2[0]->bank_status=="Success")
        // {
        //     return view('success_page');
            
        // }else{
        //     return view('success_page');
        // }
        //return redirect('Registration')->with('PaymentSuccess', 'Payment Status: Success');
    }
    public function generate_password(){
        $length = 5;
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                  '0123456789';
      
        $str = '';
        $max = strlen($chars) - 1;
      
        for ($i=0; $i < $length; $i++)
          $str .= $chars[random_int(0, $max)];
      
        return $str;
      }
      
       public function showList(){
        $users = students::where('status','=',1)->get();
        $totalAmount=students::where('status','=',1)->sum('Amount');
        $totalDonation=students::where('status','=',1)->sum('AmountExt');

        $total = (int)$totalAmount + (int)$totalDonation;
        //dd($total);
        //dd($users);
        return view('StudentRegistration.list',compact('users','totalAmount','totalDonation','total'));
      }

      public function showSearchList(Request $request){
        //dd($request);
        $input = $request->all();
        
        if($input['Batch']=='All'){
            $users = students::where('status','=',1)->get();
            $totalAmount=students::where('status','=',1)->sum('Amount');
            $totalDonation=students::where('status','=',1)->sum('AmountExt');

            $total = (int)$totalAmount + (int)$totalDonation;
            return view('StudentRegistration.list',compact('users','totalAmount','totalDonation','total'));
        }
        
        $users = students::where('Batch','=',$input['Batch'])->where('status','=',1)->get();
        //dd($users);
        $totalAmount= students::where('Batch','=',$input['Batch'])->where('status','=',1)->sum('Amount');
        $totalDonation= students::where('Batch','=',$input['Batch'])->where('status','=',1)->sum('AmountExt');

        $total = (int)$totalAmount + (int)$totalDonation;
       
        //dd($users);
        return view('StudentRegistration.list',compact('users','totalAmount','totalDonation','total'));
      }
      
      //BR Panel
      function br_panel(){
        //   $type = 'User';
        $loginginfo = students::where( 'id', '=', session('Userlog'))->first();
          $all_students_for_br = students::all();
        //   $profile_info = students::where('id', $id)->get();
          return view('StudentRegistration.br_panel', compact('all_students_for_br','loginginfo'));
      }

      //Check user phone and
      function user_check(Request $request)
      {
        //validate request
        $request->validate([
            'PhoneNumber' => 'required',
            'password' => 'required',
        ]);

        $userinfo = students::where('PhoneNumber', '=', $request->PhoneNumber)->first();
        if (!$userinfo) {
            return back()->with('fail', 'We do not recognize you phone number');
        }
        else {
           if($request->password == $userinfo->password){
            $request->session()->put('Userlog', $userinfo->id);
            return redirect(route('user_dashboard'));

           }
           else{
            return back()->with('fail', 'Incorrect password');
           } 
        }
      }

      //user dashboard
      function user_dashboard()
      {
        $data = ['loggeduserinfo' =>students::where( 'id', '=', session('Userlog'))->first()];
        return view('StudentRegistration.user_dashboard', $data);
      }

      //user session destroy
      function user_logout()
      {
        if(session()->has('Userlog')){
            session()->pull('Userlog');
            return redirect(route('member_login'));
        }
      }

      //Br list show
      function br_list()
      {
        $loginginfo = students::where( 'id', '=', session('Userlog'))->first();
        $all_br = students::all();
        return view('StudentRegistration.br_list', compact('all_br', 'loginginfo'));
      }

      //member list view
      function member_list()
      {
        $loginginfo = students::where( 'id', '=', session('Userlog'))->first();
        $all_member = students::all();
        return view('StudentRegistration.member_list', compact('all_member', 'loginginfo'));
      }

}

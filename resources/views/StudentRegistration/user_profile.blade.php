@extends('Home.app')
@section('title')
    My Profile
@endsection
@section('content')

<?php  
$date = explode("-", $profile->DoB);
?>
<head>
    <style>
        body{
          
    
        }
       label{

       }
       .profile-data-value {
          
        }
        span{
            
        }
        h4{
       
        }
    </style>
    
</head>
<div class="row row-xs mg-b-25">

        <div class="package-buttons w-100 pd-l-10 pd-r-10 pd-b-15 pd-t-15 bg-light border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  {{-- <a class="navbar-brand" href="#">Profile</a> --}}
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" aria-current="page" href="#">Profile</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="#">BR List</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="#">Member List</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="#">Teacher List</a>
                      </li>
                      @if($profile->br_status == 1)
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="{{ url('/BR-panel') }}/{{ $profile->id }}">BR Panel</a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    
    <div class="col-12 offers-list">
<div class="container rounded bg-white mt-5 mb-5" id="Profile">
    
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('Uploads/'.$profile->FilePath)}}"><span class="font-weight-bold">{{ $profile->FullName }}</span><span class="text-black-50">{{ $profile->Email }}</span><span> </span><span class="text-black-50">Member ID : {{ $profile->UserId }}</span><span> </span>
            @if($profile->br_status ==1)
            <span class="text-black-50 font-weight-bold">Member Status : Batch Representative (BR)</span><span></span>
            @elseif($profile->br_status == 2)
            <span class="text-black-50 font-weight-bold">Member Status : Admin & Moderator</span><span></span>
            @else
            <span class="text-black-50 font-weight-bold">Member Status : Member</span><span></span>
            @endif
            
            </div>
            
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Batch : </label> <span>{{ $profile->Batch }}</span></div><br/>
                    <div class="col-md-12"><label class="labels">Name : </label> <span>{{ $profile->FullName }}</span></div>
                    <div class="col-md-12"><label class="labels">Mobile Number :&nbsp;</label><span>{{ $profile->PhoneNumber }}</span></div>
                </div>
                <div class="row mt-3">
                   
                    <div class="col-md-12"><label class="labels">Present Address : &nbsp;</label><span>{{ $profile->PresentAddress }}</span></div><br><br>  
                    <div class="col-md-12"><label class="labels">Permanent Address : &nbsp;</label><span>{{ $profile->ParmanentAddress }}</span></div><br><br>
                    <div class="col-md-12"><label class="labels">Profession : &nbsp;</label><span>{{ $profile->Profession }}</span></div><br><br>
                    <div class="col-md-12"><label class="labels">Profession Details : &nbsp;</label><span>{{ $profile->ProfessionDetails }}</span></div><br><br>
                    <div class="col-md-12"><label class="labels">Blood Group : &nbsp;</label><span>{{ $profile->BloodGroup }}</span></div><br><br>
                    <div class="col-md-12"><label class="labels">Date of Birth : &nbsp;</label><span>{{ $profile->DoB }}</span></div><br><br>
                    <div class="col-md-12"><label class="labels">Product : &nbsp;</label><span>{{ $profile->Product }}</span></div><br><br>
                    <div class="col-md-12"><label class="labels">Size : &nbsp;</label><span>{{ $profile->Size }}</span></div><br><br>

                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" id="EditProfile">Edit Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span></span><span class=" px-3 p-1 add-experience">&nbsp;&nbsp;</span></div><br>
                <!--<div class="col-md-12"><label class="labels">Batch : &nbsp;</label><span>{{ $profile->Batch }}</span></div> <br>-->
                <!--<div class="col-md-12"><label class="labels">Amount : &nbsp;</label><span>{{ $profile->Amount }}</span></div><br>-->
                <!--<div class="col-md-12"><label class="labels">Donation : &nbsp;</label><span>{{ $profile->AmountExt }}</span></div>-->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Payment Details</h4>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Purpose</th>
                      <th scope="col">Date/Time</th>
                      <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Diamond Jubilee</td>
                      <td>{{ date('d-m-Y h:i A', strtotime($profile->created_at)) }}</td>
                      <td>{{ $profile->Amount }}</td>
                    </tr>
                    <tr>
                      <td>Donation</td>
                      <td>{{ date('d-m-Y h:i A', strtotime($profile->created_at)) }}</td>
                      <td>{{ $profile->AmountExt }}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<div class="container rounded bg-white mt-5 mb-5" id="EditForm">
<form class="needs-validation" id="my_form" enctype="multipart/form-data" action="updateStudent" method="post" novalidate>
                    {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('Uploads/'.$profile->FilePath)}}" id="FilePath_Span"><span class="font-weight-bold">{{ $profile->FullName }}</span><span class="text-black-50">{{ $profile->Email }}</span></span><span class="text-black-50">Member ID : {{ $profile->UserId }}</span></div>
            <div class="d-flex flex-column align-items-center text-center p-3 py-2 col-md-12"><input type="file" accept="image/*" id="FilePath" name="FilePath"><br><span style="color: red;">*Not more than 512 kb</span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" value="{{ $profile->FullName }}" id="FullName" name="FullName"></div>
                    <div class="col-md-6"><label class="labels">Mobile Number</label><input readonly type="text" class="form-control" placeholder="enter phone number" value="{{ $profile->PhoneNumber }}" id="PhoneNumber" name="PhoneNumber"></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Shift</label>
                <select name="shift" class="form-control suk-select-field" id="shift" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Select Shift</option>
                                    <option value="NotApplicable" <?php if($profile->shift == "NotApplicable") echo 'selected = "selected"'; ?>>Not Applicable</option>
                                    <option value="Morning" <?php if($profile->shift == "Morning") echo 'selected = "selected"'; ?>>Morning</option>
                                    <option value="Day" <?php if($profile->shift == "Day") echo 'selected = "selected"'; ?>>Day</option>
                                    
                                </select><br></div>
                    <div class="col-md-12"><label class="labels">Present Address</label><input type="text" class="form-control" placeholder="enter address line 1" value="{{ $profile->PresentAddress }}" id="PresentAddress" name="PresentAddress"></div>
                    <div class="col-md-12"><label class="labels">Permanent Address</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $profile->ParmanentAddress }}" id="ParmanentAddress" name="ParmanentAddress"></div>
                    <div class="col-md-12"><label class="labels">Profession</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $profile->Profession }}" id="Profession" name="Profession"></div>
                    <div class="col-md-12"><label class="labels">Profession Details</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $profile->ProfessionDetails }}" id="ProfessionDetails" name="ProfessionDetails"></div>
                    <div class="col-md-12"><label class="labels">Blood Group</label>
                    <select name="BloodGroup" id="BloodGroup" class="form-control" required>
                            <option value="">Select group</option>
                            <option value="A+"<?php if($profile->BloodGroup == "A+") echo 'selected = "selected"'; ?>>A+</option>
                            <option value="A-"<?php if($profile->BloodGroup == "A-") echo 'selected = "selected"'; ?>>A-</option>
                            <option value="B+"<?php if($profile->BloodGroup == "B+") echo 'selected = "selected"'; ?>>B+</option>
                            <option value="B-"<?php if($profile->BloodGroup == "B-") echo 'selected = "selected"'; ?>>B-</option>
                            <option value="O+"<?php if($profile->BloodGroup == "O+") echo 'selected = "selected"'; ?>>O+</option>
                            <option value="O-"<?php if($profile->BloodGroup == "O-") echo 'selected = "selected"'; ?>>O-</option>
                            <option value="AB+"<?php if($profile->BloodGroup == "AB+") echo 'selected = "selected"'; ?>>AB+</option>
                            <option value="AB-"<?php if($profile->BloodGroup == "AB-") echo 'selected = "selected"'; ?>>AB-</option>
                        </select><br>
                    </div>
                    <div class="col-md-12"><label class="labels">Date of Birth</label>
                    <div class="row">
                            <div class="col-3 col-md-3 mob-mb-15">
                                <select name="dob_day" class="form-control suk-select-field day" id="basic_dob_day" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Day</option>
                                    <option value="01" <?php if($date[2] == "01") echo 'selected = "selected"'; ?> >1</option>
                                    <option value="02" <?php if($date[2] == "02") echo 'selected = "selected"'; ?>>2</option>
                                    <option value="03"<?php if($date[2] == "03") echo 'selected = "selected"'; ?>>3</option>
                                    <option value="04"<?php if($date[2] == "04") echo 'selected = "selected"'; ?>>4</option>
                                    <option value="05"<?php if($date[2] == "05") echo 'selected = "selected"'; ?>>5</option>
                                    <option value="06"<?php if($date[2] == "06") echo 'selected = "selected"'; ?>>6</option>
                                    <option value="07"<?php if($date[2] == "07") echo 'selected = "selected"'; ?>>7</option>
                                    <option value="08"<?php if($date[2] == "08") echo 'selected = "selected"'; ?>>8</option>
                                    <option value="09"<?php if($date[2] == "09") echo 'selected = "selected"'; ?>>9</option>
                                    <option value="10"<?php if($date[2] == "10") echo 'selected = "selected"'; ?>>10</option>
                                    <option value="11"<?php if($date[2] == "11") echo 'selected = "selected"'; ?>>11</option>
                                    <option value="12"<?php if($date[2] == "12") echo 'selected = "selected"'; ?>>12</option>
                                    <option value="13"<?php if($date[2] == "13") echo 'selected = "selected"'; ?>>13</option>
                                    <option value="14"<?php if($date[2] == "14") echo 'selected = "selected"'; ?>>14</option>
                                    <option value="15"<?php if($date[2] == "15") echo 'selected = "selected"'; ?>>15</option>
                                    <option value="16"<?php if($date[2] == "16") echo 'selected = "selected"'; ?>>16</option>
                                    <option value="17"<?php if($date[2] == "17") echo 'selected = "selected"'; ?>>17</option>
                                    <option value="18"<?php if($date[2] == "18") echo 'selected = "selected"'; ?>>18</option>
                                    <option value="19"<?php if($date[2] == "19") echo 'selected = "selected"'; ?>>19</option>
                                    <option value="20"<?php if($date[2] == "20") echo 'selected = "selected"'; ?>>20</option>
                                    <option value="21"<?php if($date[2] == "21") echo 'selected = "selected"'; ?>>21</option>
                                    <option value="22"<?php if($date[2] == "22") echo 'selected = "selected"'; ?>>22</option>
                                    <option value="23"<?php if($date[2] == "23") echo 'selected = "selected"'; ?>>23</option>
                                    <option value="24"<?php if($date[2] == "24") echo 'selected = "selected"'; ?>>24</option>
                                    <option value="25"<?php if($date[2] == "25") echo 'selected = "selected"'; ?>>25</option>
                                    <option value="26"<?php if($date[2] == "26") echo 'selected = "selected"'; ?>>26</option>
                                    <option value="27"<?php if($date[2] == "27") echo 'selected = "selected"'; ?>>27</option>
                                    <option value="28"<?php if($date[2] == "28") echo 'selected = "selected"'; ?>>28</option>
                                    <option value="29"<?php if($date[2] == "29") echo 'selected = "selected"'; ?>>29</option>
                                    <option value="30"<?php if($date[2] == "30") echo 'selected = "selected"'; ?>>30</option>
                                    <option value="31"<?php if($date[2] == "31") echo 'selected = "selected"'; ?>>31</option>
                                </select>
                            </div>
                            <div class="col-md-5 col-5 mob-mb-15">
                                <select name="dob_month" class="form-control suk-select-field" id="basic_dob_month" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Month</option>
                                    <option value="01"<?php if($date[1] == "01") echo 'selected = "selected"'; ?>>January</option>
                                    <option value="02"<?php if($date[1] == "02") echo 'selected = "selected"'; ?>>February</option>
                                    <option value="03"<?php if($date[1] == "03") echo 'selected = "selected"'; ?>>March</option>
                                    <option value="04"<?php if($date[1] == "04") echo 'selected = "selected"'; ?>>April</option>
                                    <option value="05"<?php if($date[1] == "05") echo 'selected = "selected"'; ?>>May</option>
                                    <option value="06"<?php if($date[1] == "06") echo 'selected = "selected"'; ?>>June</option>
                                    <option value="07"<?php if($date[1] == "07") echo 'selected = "selected"'; ?>>July</option>
                                    <option value="08"<?php if($date[1] == "08") echo 'selected = "selected"'; ?>>August</option>
                                    <option value="09"<?php if($date[1] == "09") echo 'selected = "selected"'; ?>>September</option>
                                    <option value="10"<?php if($date[1] == "10") echo 'selected = "selected"'; ?>>October</option>
                                    <option value="11"<?php if($date[1] == "11") echo 'selected = "selected"'; ?>>November</option>
                                    <option value="12"<?php if($date[1] == "12") echo 'selected = "selected"'; ?>>December</option>
                                </select>
                            </div>
                            <div class="col-4 col-md-4 mob-mb-2">
                                <select name="basic_dob_year" class="form-control js-example-basic-multiple" id="basic_dob_year" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Year</option>
                                    <?php  
                                    //$date = explode("-", $profile->DoB);
                                    //dd($date[0]);
                                    for($i = 1920 ; $i <= 2010; $i++){
                                        
                                        if ($date[0] == $i){
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        }
                                    else{
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            </div>
                    
                    <input type="text" class="form-control" placeholder="enter email id" value="{{ $profile->DoB }}" id="DoB" name="DoB" hidden></div>
                    <div class="col-md-12"><label class="labels">Product</label><input readonly type="text" class="form-control" placeholder="education" value="{{ $profile->Product }}" id="Product" name="Product"></div>
                    <div class="col-md-12"><label class="labels">Size</label>
                    <select name="Size" class="form-control suk-select-field" id="Size" tabindex="-1" aria-hidden="true" required>
                        <option value="">Select Size</option>
                        <option value="S" <?php if($profile->Size == "S") echo 'selected = "selected"'; ?>>S (Small)</option>
                        <option value="M" <?php if($profile->Size == "M") echo 'selected = "selected"'; ?>>M (Medium)</option>
                        <option value="L" <?php if($profile->Size == "L") echo 'selected = "selected"'; ?>>L (Large)</option>
                        <option value="XL" <?php if($profile->Size == "XL") echo 'selected = "selected"'; ?>>XL</option>
                        <option value="XXL" <?php if($profile->Size == "XXL") echo 'selected = "selected"'; ?>>XXL</option>
                        <option value="XXXL" <?php if($profile->Size == "XXXL") echo 'selected = "selected"'; ?>>XXXL</option>
                    </select>
                    
                    <!-- <input type="text" class="form-control" placeholder="education" value="{{ $profile->Size }}" id="Size" name="Size"> --></div>

                </div><br>
                <input id="submit" type="submit" value="Update Profile" class="btn btn-success">
                <input type="button" value="Cancel" onClick="window.location.reload(true)"class="btn btn-danger">
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <!--<div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>-->
                <div class="col-md-12"><label class="labels">Batch</label><input readonly type="text" class="form-control" placeholder="experience" value="{{ $profile->Batch }}" id="Batch" name="Batch"></div> <br>
                <!--<div class="col-md-12"><label class="labels">Amount</label><input readonly type="text" class="form-control" placeholder="additional details" value="{{ $profile->Amount }}" id="Amount" name="Amount"></div><br>-->
                <!--<div class="col-md-12"><label class="labels">Donation</label><input readonly type="text" class="form-control" placeholder="additional details" value="{{ $profile->AmountExt }}" id="AmountExt" name="AmountExt"></div><br>-->
                <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" placeholder="additional details" value="{{ $profile->password }}" id="password" name="password"></div><br>
            </div>
        </div>
    </div>
    <input type="text" name="type" id="type" value="{{$type}}" hidden>
    </form>
</div>
@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#EditForm").hide();


        EditProfile.onclick= evt => {
            $("#EditForm").show();
            $("#Profile").hide();
            

    }
   var type = '{{ $type }}';
    if(type == 'User')
    {
        $('#layout_login').text('[Logout]');
        $('#layout_login2').text('Logout');
        
    }
});
 FilePath.onchange = evt => {
    const [file] = FilePath.files
    if (file) {
        FilePath_Span.src = URL.createObjectURL(file)
    }
    }
//  $("#basic_dob_year select").val(toString(year)).change();

    //     next.onclick= evt => {
    //         $("#back").show();
    //         $("#Summary").show();
    //         $("#submit").show();
    //         $("#next").hide();
    //         $("#MainForm").hide();

    // }



    // back.onclick= evt => {
    //         $("#next").show();
    //         $("#MainForm").show();
    //         $("#submit").hide();
    //         $("#back").hide();
    //         $("#Summary").hide();

    // }
    //      $('.js-example-basic-single').select2();
    //      (function () {
    //     'use strict'

    //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //     var forms = document.querySelectorAll('.needs-validation')

    //     // Loop over them and prevent submission
    //     Array.prototype.slice.call(forms)
    //         .forEach(function (form) {
    //         form.addEventListener('submit', function (event) {
    //             if (!form.checkValidity()) {
    //             event.preventDefault()
    //             event.stopPropagation()
    //             }

    //             form.classList.add('was-validated')
    //         }, false)
    //         })
    // })()
    // });
    // var d ;
    // $("#Batch").change(function(){
    //     if(parseInt($("#Batch").val())>=1964 && parseInt($("#Batch").val())<=2014)
    //     {
    //         $("#Amount").val(1000);
    //     }else{
    //         $("#Amount").val(500);
    //     }
    // });

    FilePath.onchange = evt => {
    const [file] = FilePath.files
    if (file) {
        FilePath_Span.src = URL.createObjectURL(file)
    }
    }

    // $("#my_form").change(function(){
    //     $("#Batch_Span").text($("#Batch").val());
    //     $("#Size_Span").text($("#Size").val());
    //     $("#BloodGroup_Span").text($("#BloodGroup").val());
    //     $("#shift_Span").text($("#shift").val());
    //      $('form input[id]').each(function() {
    //     //formId.push(J(this).attr('id'));
    //     //alert($(this).attr('id'));
    //     var f =""+"#"+$(this).attr('id')+"_Span"+"";
    //     console.log(f);
    //         $(""+f+"").text($(""+"#"+$(this).attr('id')+"").val());
    //     });

        
    // });
    $("#basic_dob_day").change(function(){
        map_date();
    });
    $("#basic_dob_month").change(function(){
        map_date();
    });
    $("#basic_dob_year").change(function(){
        map_date();
    });

    function map_date(){
        var day =$('#basic_dob_day').val();
        var month = $('#basic_dob_month').val();
        var year = $('#basic_dob_year').val();
        
        var dd = year+'-'+month+'-'+day;
        
        console.log(dd);
         $('#DoB').val(dd);
     }
    
</script>
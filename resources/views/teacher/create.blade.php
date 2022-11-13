@extends('Home.app')
@section('title')
    Teacher Registration
@endsection
@section('content')

<div style="margin-top: 2%;">
<div class="col d-flex justify-content-center">

    <div class="card col-md-5">
        <div class="card-header text-center"><h3>Teacher Information Form</h3></div>
        {{-- Error message show start --}}
        @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        {{-- Error message show End --}}

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger">
            {{session('fail')}}
        </div>
        @endif
        <!-- <div class="card-body" style="background-color:aliceblue;" >
                    <label>Batch : &nbsp;</label><span id="Batch_Span"></span><br>
                    <label>Full Name : &nbsp;</label><span id="FullName_Span"></span><br>
                    <label>Phone No : &nbsp;</label><span id="PhoneNumber_Span"></span><br>
                    <label>Email : &nbsp;</label><span id="Email_Span"></span><br>
                    <label>Profession : &nbsp;</label><span id="Profession_Span"></span><br>
                    <label>Profession Details : &nbsp;</label><span id="ProfessionDetails_Span"></span><br>
                    <label>Blood Group : &nbsp;</label><span id="BloodGroup_Span"></span><br>
                    <label>Date Of Birth : &nbsp;</label><span id="DoB_Span"></span><br>
                    <label>Present Address : &nbsp;</label><span id="PresentAddress_Span"></span><br>
                    <label>Permanent Address : &nbsp;</label><span id="ParmanentAddress_Span"></span><br>
                    <label>Product : &nbsp;</label><span id="Product_Span"></span><br>
                    <label>Size : &nbsp;</label><span id="Size_Span"></span><br>
                    <label>Amount : &nbsp;</label><span id="Amount_Span"></span><br>

                    <label>Amount for donation : &nbsp;</label><span id="AmountExt_Span"></span><br>
                    <label>Photo : &nbsp;</label></br>
                    <img src="" alt="" id="FilePath_Span" width="120" height="150">
            
            </div> -->
            <div class="card-body" style="background-color:aliceblue;">
                
                <form class="needs-validation" id="my_form" enctype="multipart/form-data" action="{{ route('teacher_create') }}" method="post" novalidate>
                    @csrf
                    
                    <div id="MainForm">
                        <label>Full Name</label></br>
                        <input type="text" name="name" id="name" class="form-control" ><br/>
                        <label>Phone No</label>
                        <input type="number" name="phone" id="PhoneNumber" class="form-control" ><br/>
                        <label>Email</label></br>
                        <input type="email" name="email" id="Email" class="form-control" ></br>
                        <label>Gender</label></br>
                        <select name="gender" id="Gender" class="form-control" >
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br>
                        <label>Present Address</label></br>
                        <textarea name="present_address" id="" class="form-control" ></textarea></br>
                        <label>Permanent Address</label></br>
                        <textarea name="permanent_address" id="ParmanentAddress" class="form-control" ></textarea><br>

                        <label>Position</label></br>
                        <input type="text" name="position" id="Position" class="form-control"  placeholder="Ex. Teacher, Head Teacher etc."><br/>
                        <label>Status</label></br>
                        <select name="status" id="status" class="form-control" >
                            <option value="">Select Status</option>
                            <option value="Late">Late</option>
                            <option value="Retired">Retired</option>
                            <option value="Present">Present</option>
                        </select><br>
                        <label>Are you Ex student of SGHS?</label></br>
                        <select name="sghs" id="status" class="form-control" >
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select><br>
                        <label>If you are Ex Student of SGHS</label></br>
                        <select  class="form-control js-example-basic-multiple" id="Batch" name="batch" >
                            <option value="">Select Batch</option>
                            <?php 
                            
                            for($i = 1964 ; $i <= date('Y'); $i++){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select><br>
                        <label>Photo</label></br>
                        <input type="file" accept="image/*" id="FilePath" name="photo"><br><span style="color: red;">*Not more than 512 kb</span><br><br>


                        

                    </div>
                    
                    <input id="submit" type="submit" value="Confirm Registration" class="btn btn-success"></br>
                </form>
            
            </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $("#back").hide();
        $("#Summary").hide();
        $("#submit").hide();
        next.onclick= evt => {
            $("#back").show();
            $("#Summary").show();
            $("#submit").show();
            $("#next").hide();
            $("#MainForm").hide();

    }
    back.onclick= evt => {
            $("#next").show();
            $("#MainForm").show();
            $("#submit").hide();
            $("#back").hide();
            $("#Summary").hide();

    }
         $('.js-example-basic-single').select2();
         (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
    })()
    });
    var d ;
    $("#Batch").change(function(){
        if(parseInt($("#Batch").val())>=1964 && parseInt($("#Batch").val())<=2014)
        {
            $("#Amount").val(1000);
        }else{
            $("#Amount").val(500);
        }
    });

    FilePath.onchange = evt => {
    const [file] = FilePath.files
    if (file) {
        FilePath_Span.src = URL.createObjectURL(file)
    }
    }

    $("#my_form").change(function(){
        $("#Batch_Span").text($("#Batch").val());
        $("#Size_Span").text($("#Size").val());
        $("#BloodGroup_Span").text($("#BloodGroup").val());
        $("#shift_Span").text($("#shift").val());
         $('form input[id]').each(function() {
        //formId.push(J(this).attr('id'));
        //alert($(this).attr('id'));
        var f =""+"#"+$(this).attr('id')+"_Span"+"";
        console.log(f);
            $(""+f+"").text($(""+"#"+$(this).attr('id')+"").val());
        });

        
    });
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
@endsection
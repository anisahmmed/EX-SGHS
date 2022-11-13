@extends('StudentRegistration.layout')
@section('title')
    Registration
@endsection
@section('content')
<style>
        /*body{*/
        /*    background-color: #87E7B6!important;*/
    
        /*}*/
       
    </style>
    
    <head>
      
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
<div style="margin-top: 1%;">
<div class="col d-flex justify-content-center">

    <div class="card col-md-5">
        <div class="card-header"><h3>Registration Form</h3></div>
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
                
                <form class="needs-validation" id="my_form" enctype="multipart/form-data" action="addStudent" method="post" novalidate>
                    {!! csrf_field() !!}
                    <div id="Summary">
                        <label>Batch : &nbsp;</label><span id="Batch_Span"></span><br>
                        <label>Shift : &nbsp;</label><span id="shift_Span"></span><br>
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
                        <label >Amount : &nbsp;</label><span id="Amount_Span"></span><br>

                        <label>Amount for donation : &nbsp;</label><span id="AmountExt_Span"></span><br>
                        <label>Photo : &nbsp;</label></br>
                        <img src="" alt="" id="FilePath_Span" width="120" height="150">
                    </div>
                    <div id="MainForm">
                        <label>Batch</label></br>
                        <select  class="form-control js-example-basic-multiple" id="Batch" name="Batch" required>
                            <option value="">Select Batch</option>
                            <?php 
                            
                            for($i = 1964 ; $i <= date('Y'); $i++){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select><br>
                        <label>Shift</label></br>
                        <select name="shift" class="form-control suk-select-field" id="shift" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Select Shift</option>
                                    <option value="NotApplicable">Not Applicable</option>
                                    <option value="Morning">Morning</option>
                                    <option value="Day">Day</option>
                                    
                                </select><br>
                        <label>Full Name</label></br>
                        <input type="text" name="FullName" id="FullName" class="form-control" required></br>
                        <label>Phone No</label>
                        <input type="number" name="PhoneNumber" id="PhoneNumber" class="form-control" required></br>
                        <label>Email</label></br>
                        <input type="email" name="Email" id="Email" class="form-control" required></br>
                        <label>Profession</label></br>
                        <input type="text" name="Profession" id="Profession" class="form-control" required></br>
                        <label>Profession Details</label></br>
                        <input type="text" name="ProfessionDetails" id="ProfessionDetails" class="form-control" required></br>
                        <label>Blood Group</label></br>
                        <select name="BloodGroup" id="BloodGroup" class="form-control" required>
                            <option value="">Select group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select><br>
                        <!-- <input type="text" name="BloodGroup" id="BloodGroup" class="form-control" required></br> -->
                        <label>Date Of Birth</label></br>
                        <div class="row">
                            <div class="col-3 col-md-3 mob-mb-15">
                                <select name="dob_day" class="form-control suk-select-field day" id="basic_dob_day" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Day</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-md-5 col-5 mob-mb-15">
                                <select name="dob_month" class="form-control suk-select-field" id="basic_dob_month" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-4 col-md-4 mob-mb-2">
                                <select name="dob_year" class="form-control js-example-basic-multiple" id="basic_dob_year" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Year</option>
                                    <?php  
                                    for($i = 1920 ; $i <= 2010; $i++){
                                        echo "<option value".strval( $i ).">$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            </div>
                        <input type="text" name="DoB" id="DoB" class="form-control" hidden></br>
                        <label>Present Address</label></br>
                        <textarea name="PresentAddress" id="PresentAddress" class="form-control" required></textarea></br>
                        <label>Permanent Address</label></br>
                        <textarea name="ParmanentAddress" id="ParmanentAddress" class="form-control" required></textarea><br>
                        <label>Product</label></br>
                        <input type="text" name="Product" id="Product" class="form-control" value="Polo T Shirt" required readonly></br>
                        <!-- <input type="text" name="address" id="address" class="form-control"></br> -->
                        <label>Size</label></br>
                        <select name="Size" class="form-control suk-select-field" id="Size" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Select Size</option>
                                    <option value="S">S (Small)</option>
                                    <option value="M">M (Medium)</option>
                                    <option value="L">L (Large)</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                </select><br>
                                
                        <!-- <input type="text" name="Size" id="Size" class="form-control" required></br> -->
                        <label>Amount</label></br>
                        <input type="text" name="Amount" id="Amount" class="form-control" required readonly>
                        </br>

                        <label>Amount for Donation</label></br>
                        <input type="text" name="AmountExt" id="AmountExt" class="form-control"><span style="color: red;">*This is non mandatory field</span><br><br>
                        
                        <label>Photo</label></br>
                        <input type="file" accept="image/*" id="FilePath" name="FilePath"><br><span style="color: red;">*Not more than 512 kb</span><br><br>
                        <input type="text" name="Notes" id="Notes" value="n/a" class="form-control" hidden></br>
                        <input type="text" name="UserId" id="UserId" value="n/a" class="form-control" hidden></br>
                    </div>
                    <input type="button" value="Click for Next" class="btn btn-primary" id="next" >
                    <input type="button" value="Back" class="btn btn-primary" id="back" >
                    
                    <input id="submit" type="submit" value="Process for payment" class="btn btn-success"></br>
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
        $("#PresentAddress_Span").text($("#PresentAddress").val());
        $("#ParmanentAddress_Span").text($("#ParmanentAddress").val());
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

@stop
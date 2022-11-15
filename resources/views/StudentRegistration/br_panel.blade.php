@extends('Home.app')
@section('title')
    My Profile | BR- Panel
@endsection
@section('content')
    <div class="row row-xs mg-b-25">
    
            <div class="package-buttons w-100 pd-l-5 pd-r-10 pd-b-15 pd-t-15 bg-light border-bottom">
                <div class="d-flex w-100 align-items-center">
                    <div class="container-fluid">
                    <div class="flex-grow-1">
                        <!--<div class="w-100 tx-11 font-weight-bold mg-b- mg-t-0 text-primary"><a href="">Profile</a></div>&nbsp;&nbsp;&nbsp;&nbsp;-->
                        
                        <!--<div><strong>17 February, 2023</strong></div>-->
                    </div>
                    <a class="w-25 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('user_dashboard') }}">Profile</a>&nbsp;&nbsp;&nbsp;
                    <a class="w-25 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('br_list') }}">BR List</a>&nbsp;&nbsp;&nbsp;
                    <a class="w-25 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('batchmates') }}">Batchmates</a>&nbsp;&nbsp;&nbsp;
                    <a class="w-100 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('member_list') }}">Member List</a>&nbsp;&nbsp;&nbsp;
                    @if($loginginfo->br_status != NULL or 0)
                    <a class="w-25 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('br_panel') }}">BR Panel</a>
                    @endif
                    <!--<a class="w-100 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="https://reg.ex-students-sghs.org/Registration">Start REGISTRATION</a>-->
                    </div>
                </div></br>
                <input type="button" onclick="printDiv('printableArea')" value="Export PDF" />
            </div>
    </div>
        
        <br/><br/>
        
        <div class="container">
            <div id="printableArea">
                <div style="overflow-x: auto">
                    <table id="example" class="table table-bordered" style="">
        
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Batch</th>
                                <th>shift</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Profession</th>
                                <th>B/G</th>
                                <th>Date of birth</th>
                                <th>Present Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sl=1;
                            @endphp
                            @foreach($all_students_for_br as $registration_info)
                            @if($registration_info->status ==1 && $registration_info->Batch == $loginginfo->Batch )
                            
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $registration_info->Batch }}</td>
                                <td>{{ $registration_info->shift }}</td>
                                <td>{{ $registration_info->FullName }}</td>
                                <td>{{ $registration_info->PhoneNumber }}</td>
                                <td>{{ $registration_info->Email }}</td>
                                <td>{{ $registration_info->Profession }}</td>
                    
                    
                                <td>{{ $registration_info->BloodGroup }}</td>
                    
                                <td>{{ $registration_info->DoB }}</td>
                    
                                <td>{{ $registration_info->PresentAddress }}</td>
                            
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>-->
        <script>
          function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
        </script>
        
@endsection
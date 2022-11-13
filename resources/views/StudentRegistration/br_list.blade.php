@extends('Home.app')
@section('title')
    My Profile | BR-List
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
                <a class="w-25 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="#">Batchmates</a>&nbsp;&nbsp;&nbsp;
                <!--<a class="w-100 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('member_list') }}">Teacher List</a>-->
                @if($loginginfo->br_status != NULL or 0)
                <a class="w-25 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="{{ route('br_panel') }}">BR Panel</a>
                @endif
                <!--<a class="w-100 tx-11 font-weight-bold mg-b- mg-t-0 text-dark" href="https://reg.ex-students-sghs.org/Registration">Start REGISTRATION</a>-->
                </div>
            </div>
        </div>
</div>
        <br/><br/>
            <div class="container">
              <div style="overflow-x: auto">
                  <table id="example" class="table table-bordered" style="">
        
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Batch</th>
                            <th>shift</th>
                            <th>Name</th>
                            <th>Number</th>
                            <!--<th>Profession</th>-->
                            <!--<th>B/G</th>-->
                            <!--<th>Date of birth</th>-->
                            <!--<th>Present Address</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach($all_br as $br_list)
                        @if($br_list->br_status == 1)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $br_list->Batch }}</td>
                            <td>{{ $br_list->shift }}</td>
                            <td>{{ $br_list->FullName }}</td>
                            <td>{{ $br_list->PhoneNumber }}</td>
                
                            <!--<td>{{ $br_list->Profession }}</td>-->
                
                
                            <!--<td>{{ $br_list->BloodGroup }}</td>-->
                
                            <!--<td>{{ $br_list->DoB }}</td>-->
                
                            <!--<td>{{ $br_list->PresentAddress }}</td>-->
                        
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
        
        
        <!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>-->
        
        
@endsection
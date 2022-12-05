@extends('Admin.master')

@section('title')
    Registration Report
@endsection

@section('content')
        <h5 class="card-title mb-0">
          <div class="col-lg-10 margin-tb">
                <div class="pull-left">
                    <h2>Member List</h2>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
    
    
                <div class="pull-left">
                    <label style="font-weight:bold">Total Amount :</label>
                    <span style="font-weight:bold">{{ $totalAmount }}</span>
                </div>
    
                <div class="pull-left">
                    <label style="font-weight:bold">Total Donation :</label>
                    <span style="font-weight:bold">{{ $totalDonation }}</span>
                </div>
    
                <div class="pull-left">
                    <label style="font-weight:bold">Total :</label>
                    <span style="font-weight:bold">{{ $total }}</span>
                </div>
               
            </div>
      </h5><br/><br/>
        <form action="">
            <div class="form-group">
                <input type="search" name="search" class="form-control" placeholder="Search By Batch" value="{{ $search }}"><br>
                <button class="btn btn-primary">Search</button>
            </div>
        </form>
        <div style="overflow-x: auto">
          <table id="example" class="display nowrap" style="">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Batch</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Profession</th>
                        <th>B/G</th>
                        <th>Date of birth</th>
                        <th>Present Address</th>
                        <th>Parmanent Address</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Donation</th>
                        <th>password</th>
                        <th>Member ID</th>
                        <th>shift</th>
                        <th>status</th>
            
                        <th style="width: 100%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_registration_info as $registration_info)
                    @if($registration_info->status ==1)
                    <tr>
                        <td>{{ $registration_info->id }}</td>
                        <td>{{ $registration_info->Batch }}</td>
                        <td>{{ $registration_info->FullName }}</td>
                        <td>{{ $registration_info->PhoneNumber }}</td>
            
                        <td>{{ $registration_info->Profession }}</td>
            
            
                        <td>{{ $registration_info->BloodGroup }}</td>
            
                        <td>{{ $registration_info->DoB }}</td>
            
                        <td>{{ $registration_info->PresentAddress }}</td>
            
                        <td>{{ $registration_info->ParmanentAddress }}</td>
                        <td>{{ $registration_info->Product }}</td>
                        <td>{{ $registration_info->Size }}</td>
                        <td>{{ $registration_info->Amount }}</td>
                        <td>{{ $registration_info->AmountExt }}</td>
                        <td>{{ $registration_info->password }}</td>
                        <td>{{ $registration_info->UserId }}</td>
                        <td>{{ $registration_info->shift }}</td>
                        <td>{{ $registration_info->status }}</td>
            
                        <td>
                            <a href="{{ url('/registered-student-edit') }}/{{ $registration_info->id }}" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Del</a>
                        </td>
                    
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
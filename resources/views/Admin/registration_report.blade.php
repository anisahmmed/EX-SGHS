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
                    <div class="col-md-10 row">
                        <div class="col-md-4">
                            <form action="ProfileCall" method="POST">
                                <input type="text" name="PhoneNumber" id="PhoneNumber" value="#" hidden>
                                @csrf
                                <button type="submit" class="btn btn-success">Edit</button>
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <form action="destroy" method="POST">
                                <input type="text" name="id" id="id" value="#" hidden>
                                @csrf
                            
                
                                <button type="submit" class="btn btn-danger">Del</button>
                            </form>
                        </div>
                    </div>
                </td>
            
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
@extends('Admin.master')

@section('title')
    Member List
@endsection

@section('content')
        <h5 class="card-title mb-0">
          <div class="col-lg-10 margin-tb">
                <div class="pull-left">
                    <h2>Member List</h2>
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
                <th>shift</th>
                <th>BR Status</th>
                
                <th style="">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_students as $registration_info)
            @if($registration_info->status ==1)
            <tr>
                <td>{{ $registration_info->id }}</td>
                <td>{{ $registration_info->Batch }}</td>
                <td>{{ $registration_info->FullName }}</td>
                <td>{{ $registration_info->PhoneNumber }}</td>
                <td>{{ $registration_info->shift }}</td>
                @if($registration_info->br_status == 1)
                <td class="btn btn-success">BR</td>
                @else
                <td>Member</td>
                @endif
                
                @if($registration_info->br_status == 1)
                <td>
                    <a href="{{ url('/edit-br-status') }}/{{ $registration_info->id }}" class="btn btn-primary" >Edit BR</a>
                </td>
                @elseif($registration_info->br_status == 2)
                <td>
                    <a href="{{ url('/edit-br-status') }}/{{ $registration_info->id }}" class="btn btn-primary" >Edit Admin</a>
                </td>
                @else
                <td>
                    <a href="{{ url('/edit-br-status') }}/{{ $registration_info->id }}" class="btn btn-primary" >Make BR</a>
                </td>
                @endif
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    </div>
    
    
    <!-- Modal -->
    
@endsection
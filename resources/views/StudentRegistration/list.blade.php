@extends('StudentRegistration.layout')
 
@section('content')
<head>
    <style>
        table.dataTable td {
  font-size: .9em;
}
table.dataTable thead {
  font-size: .9em;
}

.container {
    max-width: 1708px !important;
}
    </style>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />

    <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h2>Member List</h2>
            </div>


            <div class="pull-left">
                <label style="font-weight:bold">Total Amount :</label>
                <span style="font-weight:bold">{{$totalAmount}}</span>
            </div>

            <div class="pull-left">
                <label style="font-weight:bold">Total Donation :</label>
                <span style="font-weight:bold">{{$totalDonation}}</span>
            </div>

            <div class="pull-left">
                <label style="font-weight:bold">Total :</label>
                <span style="font-weight:bold">{{$total}}</span>
            </div>
           
        </div>
        <div class="col-md-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                search
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Engine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="SearchBy" method="POST">
      <div class="modal-body">
      <label>Batch</label></br>
                        <select  class="form-control js-example-basic-multiple" id="Batch" name="Batch" required>
                            <option value="">Select Batch</option>All
                            <option value="All">All</option>All
                            <?php 
                            
                            for($i = 1964 ; $i <= date('Y'); $i++){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select>
            @csrf
    
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
      </form>
    </div>
  </div>
</div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="display nowrap" style="width:100%" id="example">
        <thead>        <tr>
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
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->Batch }}</td>
            <td>{{ $user->FullName }}</td>
            <td>{{ $user->PhoneNumber }}</td>

            <td>{{ $user->Profession }}</td>


            <td>{{ $user->BloodGroup }}</td>

            <td>{{ $user->DoB }}</td>

            <td>{{ $user->PresentAddress }}</td>

            <td>{{ $user->ParmanentAddress }}</td>
            <td>{{ $user->Product }}</td>
            <td>{{ $user->Size }}</td>
            <td>{{ $user->Amount }}</td>
            <td>{{ $user->AmountExt }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->UserId }}</td>
            <td>{{ $user->shift }}</td>
            <td>{{ $user->status }}</td>

            <td>
                <div class="col-md-10 row">
                    <div class="col-md-4">
                        <form action="ProfileCall" method="POST">
                            <input type="text" name="PhoneNumber" id="PhoneNumber" value="{{ $user->PhoneNumber }}" hidden>
                            @csrf
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <form action="destroy" method="POST">
                            <input type="text" name="id" id="id" value="{{ $user->PhoneNumber }}" hidden>
                            @csrf
                        
            
                            <button type="submit" class="btn btn-danger">Del</button>
                        </form>
                    </div>
                </div>
            </td>
            
        </tr>
        @endforeach
        </tbody>
    </table>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" type="text/javascript"></script>

    


    <script>
$(document).ready(function () {
    // $('#list').DataTable({
    //     scrolly:200,
    //    scrollx:true



       
    // });


    // $('#example thead tr')
    //     .clone(true)
    //     .addClass('filters')
    //     .appendTo('#example thead');



 
    var table = $('#example').DataTable({
        scrollY:        "400px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            left: 4
        },
        orderCellsTop: true,
        fixedHeader: true,
        
        dom: 'Bfrtip',
        buttons: [
             'excel',  {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }, 'print'
        ],
       
        
    });
});
    </script>
@endsection
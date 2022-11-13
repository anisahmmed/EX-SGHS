@extends('Admin.master')

@section('title')
    Member List
@endsection

@section('content')
<form action="{{ route('br_status_update') }}" method="POST">
    @csrf
    <div class="row mb-3">
    {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> --}}
    <div class="col-sm-10">
        <input type="text" name="id" value="{{ $single_br_status->id }}" hidden>
        <select name="br_status" id="" class="form-control" id="inputEmail3">
            @if($single_br_status->br_status == 1)
            <option value="1" class="bg-success text-white">BR</option>
            @else
            @endif
            <option value="0" class="bg-success text-white">Member</option>
            <option value="1">BR</option>
            <option value="0">Member</option>
        </select>
    </div>
    </div>
    <br/>
    <button type="submit" class="btn btn-primary ">Submit</button>
</form>
@endsection
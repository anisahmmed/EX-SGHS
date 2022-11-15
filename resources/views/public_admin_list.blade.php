@extends('Home.app')
@section('title')
Admin & Moderators
@endsection

@section('content')
<div class="container">
    
    <div class="row row-xs mg-b-25">
    
        <div class="mg-b-0 mg-t-10 col-4 offset-4 col-md-2 offset-md-5 text-center">
            <img class="w-50 h-auto" src="{{asset('assets/img/page-img/br.png')}}" />
        </div>
        <h3 class="w-100 mg-b-0 mg-t-5 text-center">Admin & Moderators</h3>
        <hr class="w-100" />
        @php
            $sl=1;
        @endphp
        @foreach($all_public_admin as $public_br)
        @if($public_br->status == 1 && $public_br->br_status == 2)
        <div class="col-md-8 offset-md-2 col-12">
            <div class="row card-item p-0 mg-b-10 d-flex align-items-center mg-l-0 mg-r-0">
                <div class="col-2 col-md-2 pd-5 d-flex justify-content-center align-items-center">
                    <div class="pd-10 border rounded-circle bg-white tx-14 d-flex wd-60 ht-60 font-weight-bold justify-content-center align-items-center"><p class="h1 mg-b-0">{{ $sl++ }}</h3></div>
                </div>
                <div class="col-3 col-md-3 p-0 card-item">
                    <img class="w-100" style="" src="{{asset('Uploads/'.$public_br->FilePath)}}" />
                </div>
                <div class="col-7 col-md-7">
                    <h5 class="mg-b-0">{{ $public_br->FullName }}</h5>
                    <p class="mg-b-0 w-100 mg-b-0"><span>Batch: {{ $public_br->Batch }}</span><span class="mg-r-10 mg-l-10">|</span><span>Member Id:  {{ $public_br->UserId }}</span></p>
                    <p class="mg-b-0 w-100 mg-b-0"><span>Phone: {{ $public_br->PhoneNumber }}</span></p>
                    <p class="w-100 d-block mg-t-5 mg-b-2">
                    @if($public_br->br_status == 2)
                    <span class="badge badge-dark">Admin & Moderator</span>
                    @endif
                    </p> 
                </div>
            </div>
    
        </div>
    
    @endif
    @endforeach
    
@endsection
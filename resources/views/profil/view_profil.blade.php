@extends('core')
@section ('content')
<div class="col-md-12">
    <div class="">
        <img src="{{asset('assets/image')}}/{{Session::get('foto')}}" class="rounded-circle" alt="..." style="width:170px; padding-bottom:10px;">
        <h3>{{Session::get('name')}}</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Nama Kandidat</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" value="{{Session::get('name')}}">
            </div>

        </div>
        <div class="col-md-6">
            <label for="inputjual" class="form-label">Posisi Kandidat</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi-code-slash"></i></span>
                <input type="text" class="form-control" value="{{Session::get('posisi')}}">
            </div>
        </div>
    </div>
</div>
@stop
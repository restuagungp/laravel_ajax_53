@extends('app')
@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            <!--img src="/images/{{ Session::get('path') }}"-->
            @endif

            <div class="col-lg-12 col-md-12" style="padding:0">
                <form action="kendaraan/search" method="POST" role="search" class="col-lg-6 col-md-6" style="padding:0 0 5px 0">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="vcari" placeholder="Cari data jenis / nama / harga"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <div class="row col-lg-6 col-md-6" style="margin:0 0 10px 0;padding:0">      
                    <a href="{{ route('kendaraan.create') }}" class="btn btn-info pull-right">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp Tambah Kendaraan
                    </a>
                </div>
            </div>

            <div class="result" style="clear:both">
                @include('kendaraan/tabeldatakendaraan')
            </div>
            
        </div>
    </div>
@endsection
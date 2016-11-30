@extends('app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-left:20px">
            <div class="panel panel-default" style="border:none;box-shadow:none">
				<div class="table-responsive">
					@if (count($errors) > 0)
	                    <div class="alert alert-danger">
	                    	<button type="button" class="close" data-dismiss="alert">×</button>
	                        <strong>Peringatan!</strong> Isi kolom dengan data yang benar.<br><br>
	                        <ul>
	                            @foreach ($errors->all() as $error)
	                                <li>{{ $error }}</li>
	                            @endforeach
	                        </ul>
	                    </div>
	                @endif
	                
					<h4>TAMBAH KENDARAAN</h4><br/>
					{!! Form::open(['route' => 'kendaraan.store','enctype' => 'multipart/form-data']) !!}
	                    <table style="line-height:35px">	
							<tr><td>Jenis kendaraan</td><td style="padding:0 5px">:</td>
								<td>{!! Form::text('jenis', null, ['class' => 'form-control', 'style'=>'padding:0 5px;margin:2px 0']) !!}</td>
							</tr>
							<tr><td>Nama kendaraan</td><td style="padding:0 5px">:</td>
								<td>{!! form::text('nama', null,['class'=> 'form-control', 'style'=>'padding:0 5px;margin:2px 0']) !!}</td>
							</tr>
							<tr><td>Harga kendaraan</td><td style="padding:0 5px">:</td>
								<td>{!! form::text('harga', null,['class'=> 'form-control', 'style'=>'padding:0 5px;margin:2px 0']) !!}</td>
							</tr>
							<tr><td>Gambar</td><td style="padding:0 5px">:</td>
								<td><input class="form-control" style="padding-top:5px" type="file" name="image" id="images"  onchange="preview_images();"/></td>
							</tr>
							<tr><td colspan="2"></td>
								<td><div style="margin:-2px 0 0 2px;width:300px;border:1px solid #eee" class="image_preview"></div></td>
							</tr>
							<tr><td colspan="2"></td>
								<td style="padding-top:20px">
									{!! Form::submit('simpan', ['class'=>'btn btn-info']) !!}
									<a href="{{ url('/kendaraan') }}" class="btn btn-default">Kembali</a>
								</td>
							</tr>
						</table>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
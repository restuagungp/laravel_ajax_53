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

	                <h4>UBAH KENDARAAN</h4><br/>
					{!! Form::model($kend, ['route'=>['kendaraan.update', $kend->id], 'method'=> 'PATCH', 'enctype' => 'multipart/form-data'])  !!}
						<table style="line-height:35px;float:left;margin-right:30px">	
							<tr><td>Jenis kendaraan</td><td style="padding:0 5px">:</td>
								<td>{!! Form::text('jenis', null,  ['class'=>'form-control']) !!}</td>
							</tr>
							<tr><td>Nama kendaraan</td><td style="padding:0 5px">:</td>
								<td>{!!Form::text('nama', null,  ['class'=>'form-control']) !!}</td>
							</tr>
							<tr><td>Harga kendaraan</td><td style="padding:0 5px">:</td>
								<td>{!!Form::text('harga', null,  ['class'=>'form-control']) !!}</td>
							</tr>
							<tr><td>Gambar</td><td style="padding:0 5px">:</td>
								<td><input class="form-controll" style="padding:0 5px;margin:2px 0" type="file" name="image" id="images"  onchange="preview_images();"/></td>
							</tr>
							<tr><td></td><td></td>
								<td style="width:100px;">
									<i style="position:absolute;margin:-10px 0 0 5px;color:gray">*file gambar tidak harus diubah</i>
									<div style="float:left;position:relative;border:1px solid #eee" class="image_preview"></div>
								</td>
							</tr>
							<tr><td></td><td></td>
								<td style="padding-top:20px"><input type="submit" class="btn btn-info" name="simpan" value="Simpan">
									<a href="{{ url('/kendaraan') }}" class="btn btn-default">Kembali</a>
								</td>
							</tr>
						</table>
						<div style="float:left;width:325px;border:1px solid #eee"><i style="position:absolute;margin:5px 0 0 10px;color:#A8A8A8">Gambar sebelumnya</i><img class='img-responsive' src="{{ elixir('images/'.$kend->file) }}" alt=""></div>
					{!! Form::close() !!}
      			</div>
    		</div>
    	</div>
    </div>
</div>

@endsection
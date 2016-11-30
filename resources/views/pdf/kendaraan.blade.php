<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PDF Kendaraan</title>
		<style>
			table{
				width:100%;
				margin:0 auto;
				border-collapse: collapse;
				border:1px solid #3C414C;
			}
			td{
				padding:15px 10px;
				border-top:1px solid gray;
			}
		</style>
	</head>
	<body>
		<caption><h1>Data Kendaraan</h1></caption>
		<table>
	        <thead>
	            <tr style="font-weight:bold;color:#fff;text-align:center" bgcolor="#3C414C">
	                <td>No</td>
	                <td>Jenis</td>
	                <td>Nama</td>
	                <td>Harga</td>
	                <td>Gambar</td>
	            </tr>
	        </thead>
	        <tbody>
	        @foreach($datakendaraan as $key => $item)
	        	@if($key%2==0)
	            <tr align="center" style="border-top:1px solid #3C414C">
				@else
				<tr style="background:#eee;border-top:1px solid #3C414C" align="center">
				@endif
	                <td> {{$key+1}}</td>
	                <td>{{ $item->jenis }}</td>
	                <td>{{ $item->nama }}</td>
	                <td><?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></td>
	                <td style="padding:3px 0"><img style="border:1px solid #eee" src="images/{{ $item->file }}" width="100px"/>
                        </div>
	                </td>
	            </tr>
	        @endforeach
	        </tbody>
	    </table>
	</body>
</html>
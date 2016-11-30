<div class="panel panel-default" style="margin-bottom:-10px">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr style="font-weight:bold;color:#fff" align="left" bgcolor="#585858">
                    <td align="center" style="padding:15px 10px"> &nbsp </td>
                    <td style="padding:15px 10px">Jenis</td>
                    <td style="padding:15px 10px">Nama</td>
                    <td style="padding:15px 10px">Harga</td>
                    <td style="padding:15px 10px">Gambar</td>
                    <td style="padding:15px 10px" align="center">Action</td>
                </tr>
            </thead>
            <tbody>
            @if(isset($details))
                <?php $no=1; ?>
                @foreach($details as $dtkend)
                    <tr>
                        <td align="center"> &nbsp </td>
                        <td>{{ $dtkend->jenis }}</td>
                        <td>{{ $dtkend->nama }}</td>
                        <td><?php $hrg=number_format($dtkend->harga,0,",","."); echo "Rp ".$hrg;?></td>
                        <td><img src="{{ elixir('images/'.$dtkend->file) }}" width="100px" alt="not found" style="border:1px solid #eee"> </td>
                        <td align="center">
                            <form method="POST" action="{{ route('kendaraan.destroy', $dtkend->id) }}" accept-charset="UTF-8">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <a href="{{ route('kendaraan.edit', $dtkend->id) }}" type="submit" button type="button" style="padding:3px 8px" class="btn btn-warning"><span class="glyphicon glyphicon-edit">
                                </span> &nbsp Ubah</a> &nbsp 
                                
                                <button onclick="return confirm('Anda yakin akan menghapus data ?');" type="submit" style="padding:3px 8px" type="button" class="btn btn-danger" ><span class="glyphicon glyphicon-trash">    
                                </span> &nbsp Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="6">Data pencarian tidak ditemukan</td></tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
<br/>
<a href="{{ url('/kendaraan') }}" class="btn btn-default" style="clear:both">Tampilkan Semua Data</a>
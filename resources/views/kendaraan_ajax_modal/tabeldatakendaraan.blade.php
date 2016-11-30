<div class="panel panel-default" style="margin:17px 0 0 0">
    <div class="table-responsive">
        <table class="table table-striped" id="table">
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
            <?php $no=1; ?>
            @foreach($datakendaraan as $item)
                <tr class="item{{$item->id}}">
                    <td align="center"> &nbsp </td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td><?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></td>
                    <td><img style="border:1px solid #eee" width="100px" src="{{ elixir('images/'.$item->file) }}"></td>
                    <td align="center">
                        <button style="padding:3px 8px" class="edit-modal btn btn-warning"  data-id="{{$item->id}}"
                            data-jenis="{{$item->jenis}}" data-nama="{{$item->nama}}" data-harga="{{$item->harga}}" data-gambar="{{$item->file}}">
                            <span class="glyphicon glyphicon-edit"></span> &nbsp Ubah
                        </button> &nbsp 
                        <button style="padding:3px 8px" class="delete-modal btn btn-danger" data-id="{{$item->id}}" data-nama="{{$item->nama}}">
                            <span class="glyphicon glyphicon-trash"></span> &nbsp Hapus
                        </button>
                    </td>
                </tr>
                <?php $no++;?>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $datakendaraan->render() !!}
<div class="panel panel-default" style="margin:17px 0 0 0;clear:both">
    <div class="table-responsive" >
        <table class="table table-striped">
            <thead>
                <tr style="font-weight:bold;color:#fff" align="left" bgcolor="#4F5561">
                    <td align="center" style="padding:15px 10px"> &nbsp </td>
                    <td style="padding:15px 10px">Jenis</td>
                    <td style="padding:15px 10px">Nama</td>
                    <td style="padding:15px 10px">Harga</td>
                    <td align="center" style="padding:15px 10px">Gambar</td>
                    <td style="padding:15px 10px" align="center">Aksi</td>
                </tr>
            </thead>
            <tbody>
            @foreach($datakendaraan as $key => $item)
                <tr class="item{{$item->id}}">
                    <td align="center"> &nbsp </td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td><?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></td>
                    <td align="center">
                        <div class="gallery">
                            <div id="img{{$key}}"></div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                startLoad();    
                                var timeout;
                                function loaded() {
                                    $('#img{{$key}}').html('<img width="100px" src="{{ elixir('images/'.$item->file) }}" class="btn-img" style="border:1px solid #eee" title="lihat gambar" alt="not found" onclick="lightbox(<?php echo $key ?>)">');
                                }
                                function startLoad() {
                                    $('#img{{$key}}').html('<img width="30px" src="{{elixir('loader.gif')}}"/>');
                                    clearTimeout(timeout);
                                    timeout = setTimeout(loaded, {{$key+2}}00);
                                }
                            })
                        </script>
                    </td>
                    <td align="center">
                        <button style="padding:3px 8px;" class="ubah btn btn-warning" data-page="{{$datakendaraan->currentpage()}}" data-key="{{$key}}"  data-id="{{$item->id}}"
                            data-jenis="{{$item->jenis}}" data-nama="{{$item->nama}}" data-harga="{{$item->harga}}" data-file="{{$item->file}}">
                            <span class="glyphicon glyphicon-edit"></span> &nbsp Ubah
                        </button> &nbsp 
                        <button style="padding:3px 8px" class="delete-modal btn btn-danger" data-page="{{$datakendaraan->currentpage()}}" data-id="{{$item->id}}" data-nama="{{$item->nama}}" data-file="{{$item->file}}">
                            <span class="glyphicon glyphicon-trash"></span> &nbsp Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-lc-12 render">
    <span class="col-lg-10 col-md-10 col-sm-9  col-xs-12" style="padding:0">{!! $datakendaraan->render() !!}</span>
    <span class="col-lg-2 col-md-2 col-sm-3 total">
    Total : {{$datakendaraan->total()}} data 
    </span>
</div><br/><br/>

<!--images show slide on click-->
<link rel="stylesheet" type="text/css" href="{{ elixir('css/image-show-slider.css') }}">
<script type="text/javascript" src="{{ elixir('css/image-show-slider.js') }}"></script>
<div style="display:none">
    <div id="image-show-slider">
        <div class="slider-inner">
            <ul>@foreach($datakendaraan as $key => $item)
                <li>
                    <img class="link-img" src="{{ elixir('images/'.$item->file) }}">
                    <div class="captions">
                        <h3>{{ $item->jenis }}</h3>
                        <p>{{ $item->nama }}, harga per unit <?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></p>
                    </div>
                </li>
                @endforeach
            </ul>
            <div id="fsBtn" class="fs-icon"></div>
        </div>
    </div>
</div>
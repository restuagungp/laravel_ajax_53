@extends('app')
@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div id="awal" class="col-lg-12 col-md-12" style="padding:0">
                <form action="kendaraan/search" method="POST" role="search" class="col-lg-6 col-md-6" style="padding:0 0 5px 0">
                    <div class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Cari data jenis/nama/harga">
                    </div>
                </form>
                <div class="row col-lg-6 col-md-6" style="margin:0 0 10px 0;padding:0">      
                    <button class="add-modal btn btn-info pull-right" >
                        <span class="glyphicon glyphicon-plus"></span>&nbsp Tambah kendaraan
                    </button>
                </div>
                <div id="tabel" class="result" style="clear:both">
                    {{ csrf_field() }}
                    @include('kendaraan_ajax_modal/tabeldatakendaraan')
                </div>
            </div>
        </div>
    </div>
    <div id="formeditmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12">ID</label>
                        <div class="col-lg-10 col-md-10 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control id_edit" name="id_edit" disabled>
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12" for="j">Jenis</label>
                        <div class="col-lg-10 col-md-10 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control jenis_edit" name="jenis_edit">
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12" for="n">Nama</label>
                        <div class="col-lg-10 col-md-10 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control nama_edit" name="nama_edit">
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12" for="h">Harga</label>
                        <div class="col-lg-10 col-md-10 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control harga_edit" name="harga_edit">
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12 col-sm-12">Gambar</label>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12" style="margin-bottom:5px">
                            <input class="form-control" style="padding-top:5px" type="file" name="image_edit" id="images"  onchange="preview_images();" multiple/>
                            <i style="position:absolute;margin:0;color:gray">*file gambar tidak harus diubah</i>
                            <div style="clear:both;position:relative;margin:0 0 0 2px;width:300px;border:1px solid #eee" class="image_preview"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default">
                            <span> Reset</span>
                        </button>
                        <button autofocus type="button" class="btn actionedit btn-warning" data-dismiss="modal">
                            <span  class='glyphicon glyphicon-edit'> Edit</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="formaddmodal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('method'=>'PATCH', 'enctype'=>'multipart/form-data', 'id'=>'upload_form' , 'class'=>'form-horizontal')) !!}
                    <div class="form-group">
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12 col-sm-12">Jenis</label>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control" name="jenis_add" autofocus>
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12 col-sm-12">Nama</label>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control" name="nama_add">
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12 col-sm-12">Harga</label>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12" style="margin-bottom:5px">
                            <input type="text" class="form-control" name="harga_add">
                        </div>
                        <label style="text-align:left" class="control-label col-lg-2 col-md-2 col-sm-12 col-sm-12">Gambar</label>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-sm-12" style="margin-bottom:5px">
                            <input class="form-control" style="padding-top:5px" type="file" name="image_add" id="images2"  onchange="preview_images();" multiple/>
                            <div style="clear:both;position:relative;margin:0 0 0 2px;width:300px;border:1px solid #eee" class="image_preview2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default">
                            <span> Reset</span>
                        </button>
                        <button type="button" class="btn actionadd btn-info" data-dismiss="modal">
                            <span  class='glyphicon glyphicon-plus'> Add</span>
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div id="deletemodal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p style="float:left">Hapus data</p><input style="float:left;margin:-1px 0 0 3px;width:150px;border:none" type="text" class="id nama"><br/>&nbsp
                    <span class="hidden did"></span>
                    <input type="hidden" class="id" name="id_delete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'> Cancel</span>
                        </button>
                        <button autofocus type="button" class="btn actiondelete btn-danger" data-dismiss="modal">
                            <span  class='glyphicon glyphicon-trash'> Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).on('click', '.add-modal', function() {
        $('#formaddmodal').modal('show');
        $('.modal-title').text('Tambah Kendaraan');
        $('.form-horizontal').show();
        $('.actionadd').addClass('add');
        $('.deleteContent').hide();
    });

    $(document).on('click', '.edit-modal', function() {
        $('#formeditmodal').modal('show');
        $('.modal-title').text('Edit Kendaraan');
        $('.form-horizontal').show();
        $('.id_edit').val($(this).data('id'));
        $('.jenis_edit').val($(this).data('jenis'));
        $('.nama_edit').val($(this).data('nama'));
        $('.harga_edit').val($(this).data('harga'));
        //$('.image_edit').val($(this).data('gambar'));
        $('.actionedit').addClass('edit');
        $('.deleteContent').hide();
    });
    $(document).on('click', '.delete-modal', function() {
        $('#deletemodal').modal('show');
        $('.modal-title').text('Delete');
        $('.form-horizontal').hide();
        $('.deleteContent').show();
        $('.id').val($(this).data('id'));
        $('.nama').val($(this).data('nama'));
        $('.actiondelete').addClass('delete');
    });
        
            

    $(document).ready(function(e){
        //e.preventDefault();
        //e.stopPropagation();
        $('.modal-footer').on('click', '.add', function() {
            if ($('input[name=image_add]').val() != '') {
                var image = $('input[name=image_add]').prop('files')[0];    
            }else{
                var image = '';    
            }
            var jenis = $('input[name=jenis_add]').val();
            var nama = $('input[name=nama_add]').val();
            var harga = $('input[name=harga_add]').val();
            var image = $('input[name=image_add]').prop('files')[0];

            var form_data = new FormData();
                form_data.append('jenis', jenis );
                form_data.append('nama',nama );
                form_data.append('harga',harga );
                form_data.append('file', image);
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
            $.ajax({
                url: 'additem-ajax-modal', // point to server-side PHP script
                data: form_data,
                type: 'POST',
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        if (data.errors['jenis']){ toastr.warning(data.errors['jenis'], 'KOLOM JENIS !!!', {timeOut: 4000})
                        }else if (data.errors['nama']){ toastr.warning(data.errors['nama'], 'KOLOM NAMA !!!', {timeOut: 4000})
                        }else if (data.errors['harga']){ toastr.warning(data.errors['harga'], 'KOLOM HARGA !!!', {timeOut: 4000})
                        }else if (data.errors['file']) { toastr.warning(data.errors['file'], 'KOLOM GAMBAR !!!', {timeOut: 4000})
                        }
                    }else {
                        $('.error').addClass('hidden');
                        toastr.success('Berhasil menambah file baru.', 'SUCCESS', {timeOut: 4000});
                        $('#table').append("<tr class='item" + data.id + "'><td align='center'> &nbsp </td><td>" + data.jenis + "</td><td>" + data.nama + "</td><td>Rp " + data.harga + "</td><td><img style='border:1px solid #eee' width='100px' src='images/" + data.file + "' alt='not found'></td><td align='center'><button style='padding:3px 8px' class='edit-modal btn btn-warning' data-id='" + data.id + "' data-nama='" + data.nama + "' data-jenis='" + data.jenis + "' data-harga='" + data.harga + "' data-file='" + data.file + "'> <span class='glyphicon glyphicon-edit'></span> &nbsp Ubah</button> &nbsp <button style='padding:3px 8px' class='delete-modal btn btn-danger' data-id='" + data.id + "' data-nama='" + data.nama + "' data-jenis='" + data.jenis + "' data-harga='" + data.harga + "' data-file='" + data.file + "' ><span class='glyphicon glyphicon-trash'></span> &nbsp Hapus</button></td></tr>");
                        $('input[name=jenis_add]').val('');
                        $('input[name=nama_add]').val('');
                        $('input[name=harga_add]').val('');
                    }
                },
                error: function (data) {
                    toastr.error('Gagal menyimpan data, lengkapi form dengan benar.', 'FAILED', {timeOut: 4000});
                }
            });
        });

        $('.modal-footer').on('click', '.edit', function() {
            if ($('input[name=image_edit]').val() != '') {
                var image = $('input[name=image_edit]').prop('files')[0];    
            }else{
                var image = '';    
            }
            var id = $('input[name=id_edit]').val();
            var jenis = $('input[name=jenis_edit]').val();
            var nama = $('input[name=nama_edit]').val();
            var harga = $('input[name=harga_edit]').val();
            

            var form_data = new FormData();
                form_data.append('id', id );
                form_data.append('jenis', jenis );
                form_data.append('nama',nama );
                form_data.append('harga',harga );
                form_data.append('file', image);
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
            $.ajax({
                url: 'edititem-ajax-modal', // point to server-side PHP script
                data: form_data,
                type: 'POST',
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        if (data.errors['jenis']){ toastr.warning(data.errors['jenis'], 'KOLOM JENIS !!!', {timeOut: 4000})
                        }else if (data.errors['nama']){ toastr.warning(data.errors['nama'], 'KOLOM NAMA !!!', {timeOut: 4000})
                        }else if (data.errors['harga']){ toastr.warning(data.errors['harga'], 'KOLOM HARGA !!!', {timeOut: 4000})
                        }
                    }else {
                        $('.error').addClass('hidden');
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td align='center'> &nbsp </td><td>" + data.jenis + "</td><td>" + data.nama + "</td><td>Rp " + data.harga + "</td><td><img style='border:1px solid #eee' width='100px' src='images/" + data.file + "' alt='not found'></td><td align='center'><button style='padding:3px 8px' class='edit-modal btn btn-warning' data-id='" + data.id + "' data-nama='" + data.nama + "' data-jenis='" + data.jenis + "' data-harga='" + data.harga + "' data-file='" + data.file + "'> <span class='glyphicon glyphicon-edit'></span> &nbsp Ubah</button> &nbsp <button style='padding:3px 8px' class='delete-modal btn btn-danger' data-id='" + data.id + "' data-nama='" + data.nama + "' data-jenis='" + data.jenis + "' data-harga='" + data.harga + "' data-file='" + data.file + "' ><span class='glyphicon glyphicon-trash'></span> &nbsp Hapus</button></td></tr>");
                        toastr.success('Berhasil mengubah file.', 'SUCCESS', {timeOut: 4000});
                    }
                },
                error: function (data) {
                    toastr.error('Gagal mengubah data, lengkapi form dengan benar.', 'FAILED', {timeOut: 4000});
                }
            });
        });

        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'post',
                url: 'deleteitem-ajax-modal',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $('input[name=id_delete]').val()
                },
                success: function(data) {
                    $('.item' + data.id).remove();
                    toastr.success('Berhasil menghapus data.', 'DELETE Success', {timeOut: 4000});
                }
            });
        });
        //searching
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url  : '{{URL::to('searchitem-ajax-modal')}}',
                data : {'search':$value},
                success : function(data){
                    $('tbody').html(data);
                },
                error: function (data) {
                    toastr.error('Data tidak ditemukan.', 'FAILED', {timeOut: 4000});
                }
            })
        })
    })
    </script>   

@endsection
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1 nav nav-tabs tab-content" style="border:none"> 
            <div id="awal" class="col-lg-12 col-md-12" style="padding:0">
                <div id="tabel" style="clear:both">
                    <div class="col-lg-12 col-md-12" style="padding:0">
                        <form action="<?php echo e(url('search-ajax-show')); ?>" method="get" id="frmsearch" class="form-horizontal col-lg-6 col-md-6 col-sm-7" style="padding:0;margin:0 0 10px 0;">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="cari jenis / nama / harga" id="search" >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <div class="row col-lg-6 col-md-6 col-sm-5" style="margin:0 0 10px 0;padding:0">
                            <button class="tambah col-lg-5 col-md-5 col-sm-7 btn btn-primary pull-right" style="margin:0 0 10px 15px;">
                                <span class="glyphicon glyphicon-plus"></span>&nbsp Tambah kendaraan
                            </button>
                            <a href="<?php echo e(url('pdf-kendaraan')); ?>" target="blank" class="pdf col-lg-2 col-md-2 col-sm-2 btn btn-default pull-right" style="border:none;border-bottom:1px solid #9C9C9C;border-top:1px solid #9C9C9C;border-radius:5px;">
                                <span class="glyphicon glyphicon-save-file" style=""></span>&nbsp PDF
                            </a>
                        </div>
                    </div>            
                    <div class="result">
                        <?php echo $__env->make('kendaraan_ajax_show/tabeldatakendaraan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>

            <div id="tab_tambah" style="margin-top:-15px"> 
                <?php echo $__env->make('kendaraan_ajax_show/form_tambah', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div id="tab_ubah" style="margin-top:-15px">
                <?php echo $__env->make('kendaraan_ajax_show/form_ubah', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div id="deletemodal" class="modal fade" role="dialog">
                <?php echo $__env->make('kendaraan_ajax_show/modal_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            
        </div>
    </div>


    <script>
        $(document).ready(function(){
            //awal
            $('#awal').show();
            $('#tab_tambah').hide();
            $('#tab_ubah').hide();
            //awal btn
            $(document).on('click', '.awal', function() {
                reset(); //melakukan reset form sebelum pindah ke halaman awal
                $('#awal').fadeIn(250);
                $('#tab_tambah').hide();
                $('#tab_ubah').hide();
            });
            //tambah btn
            $(document).on('click', '.tambah', function() {
                $('#tab_tambah').fadeIn(250);
                $('#awal').hide();
                $('#tab_ubah').hide();
                $('.actionadd').addClass('add');
            });
            //ubah btn
            $(document).on('click', '.ubah', function() {
                $('#tab_ubah').fadeIn(250);
                $('#tab_tambah').hide();
                $('#awal').hide();
                $('.id').val($(this).data('id'));
                $('.jenis').val($(this).data('jenis'));
                $('.nama').val($(this).data('nama'));
                $('.harga').val($(this).data('harga'));
                $('.key').val($(this).data('key'));
                $('.page').val($(this).data('page'));
                $('.actionedit').addClass('edit');
            });
            //delete btn
            $(document).on('click', '.delete-modal', function() {
                $('#deletemodal').modal('show');
                $('.modal-title').text('HAPUS');
                $('.deleteContent').show();
                $('.page').val($(this).data('page'));
                $('.id').val($(this).data('id'));
                $('.nama').val($(this).data('nama'));
                $('.actiondelete').addClass('delete');
            });
            //aksitambah btn form
            $('.aksi').on('click', '.add', function() {
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
                    url: 'additem-ajax-show',
                    data: form_data,
                    type: 'POST',
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    success: function (data) {
                        if (data.fail) {
                            if (data.errors['jenis']){ toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }else if (data.errors['nama']){ toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }else if (data.errors['harga']){ toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }else if (data.errors['file']) { toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }
                        }else {
                            $('.error').addClass('hidden');
                            toastr.success('Berhasil menambah data baru.', 'SUCCESS', {timeOut: 4000});
                            $('.result').html(data);
                            $('.awal').click();
                        }
                    },
                    error: function (data) {
                        toastr.error('Gagal menyimpan data, lengkapi form dengan benar.', 'FAILED', {timeOut: 4000});
                    }
                })
            })
            //aksiubah btn form
            $('.aksi').on('click', '.edit', function() {
                if ($('input[name=image_edit]').val() != '') {
                    var image = $('input[name=image_edit]').prop('files')[0];    
                }else{
                    var image = '';    
                }
                var page = $('input[name=page_edit]').val();
                var key = $('input[name=key_edit]').val();
                var id = $('input[name=id_edit]').val();
                var jenis = $('input[name=jenis_edit]').val();
                var nama = $('input[name=nama_edit]').val();
                var harga = $('input[name=harga_edit]').val();
                

                var form_data = new FormData();
                    form_data.append('page', page );
                    form_data.append('key', key );
                    form_data.append('id', id );
                    form_data.append('jenis', jenis );
                    form_data.append('nama',nama );
                    form_data.append('harga',harga );
                    form_data.append('file', image);
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
                $.ajax({
                    url: 'edititem-ajax-show',
                    data: form_data,
                    type: 'POST',
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    success: function (data) {
                        if (data.fail) {
                            if (data.errors['jenis']){ toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }else if (data.errors['nama']){ toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }else if (data.errors['harga']){ toastr.error('harap lengkapi semua data dengan benar.', 'PERINGATAN !!!', {timeOut: 4000})
                            }
                        }else {
                            $('.error').addClass('hidden');
                            toastr.success('Berhasil mengubah data.', 'SUCCESS', {timeOut: 4000});
                            $('.result').html(data);
                            $('.awal').click();
                        }
                    },
                    error: function (data) {
                        toastr.error('Gagal mengubah data, lengkapi form dengan benar.', 'FAILED', {timeOut: 4000});
                    }
                })
            })
            //aksihapus btn modal
            $('.modal-footer').on('click', '.delete', function() {
                $.ajax({
                    type: 'post',
                    url: 'deleteitem-ajax-show',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $('input[name=id_delete]').val(),
                        'page': $('input[name=page_delete]').val()
                    },
                    success: function(data) {
                        //$('.item' + data.id).remove();
                        $('.result').html(data);
                        $('.awal').click();
                        toastr.success('Berhasil menghapus data.', 'DELETE Success', {timeOut: 4000});
                    },
                    error: function (data) {
                        toastr.error('Gagal menghapus data.', 'FAILED', {timeOut: 4000});
                    }
                })
            })
            
            //aksireset btn form
            $('.aksi').on('click', '.reset', function() {
                reset();
            })
            function reset(){
                $('#addform').data('formValidation').resetForm();
                $('#editform').data('formValidation').resetForm();
                var classpreview = $(".preview");
                classpreview.hide();
            }

            //pencarian data
            $('#frmsearch').on('submit',function(e){
                e.preventDefault();
                $('input[name=search]').focus();
            })
            $('#frmsearch').on('keyup',function(e){
                e.preventDefault();
                var url  = $(this).attr('action');
                var data = $(this).serializeArray();
                var get  = $(this).attr('method');
                $.ajax({
                    type  : get,
                    url   : url,
                    data  : data,   
                }).done(function(data){
                    $('.result').html(data);
                })
            })
            
            //validasi form
            $('#addform').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: { 
                    jenis_add: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z\s]+$/i,
                                message: 'Isi dengan karakter (string required)'
                            }
                        }
                    },
                    nama_add: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9-_',.\s]+$/i,
                                message: 'Isi dengan karakter (string required)'
                            }
                        }
                    },
                    harga_add: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            numeric: {
                                message: 'Isi dengan angka (numeric required)',
                            }
                        }
                    },
                    image_add: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            file: {
                                extension: 'JPEG,jpeg,JPG,jpg,png,bmp,gif,svg',
                                type: 'image/jpeg, image/jpg, image/png, image/bmp, image/gif, image/svg',
                                maxSize: 5000000,   // 5M
                                message: 'Isi file dengan image extensi (jpeg,jpg,png,bmp,gif,svg) max 5M'
                            }
                        }
                    }
                }       
            })
            $('#editform').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: { 
                    jenis_edit: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z\s]+$/i,
                                message: 'Isi dengan karakter (string required)'
                            }
                        }
                    },
                    nama_edit: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9-_',.\s]+$/i,
                                message: 'Isi dengan karakter (string required)'
                            }
                        }
                    },
                    harga_edit: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom tidak boleh kosong'
                            },
                            numeric: {
                                message: 'Isi dengan angka (numeric required)',
                            }
                        }
                    },
                    image_edit: {
                        validators: {
                            file: {
                                extension: 'JPEG,jpeg,JPG,jpg,png,bmp,gif,svg',
                                type: 'image/jpeg, image/jpg, image/png, image/bmp, image/gif, image/svg',
                                maxSize: 5000000,   // 5M
                                message: 'Isi file dengan image extensi (jpeg,jpg,png,bmp,gif,svg) max 5M'
                            }
                        }
                    }
                }       
            })
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
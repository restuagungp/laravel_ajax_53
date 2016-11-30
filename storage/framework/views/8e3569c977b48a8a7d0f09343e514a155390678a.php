<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <title>Laravel Tutorials</title>
</head>
<body>
<div class="container-fluid">
    <div class="row"></div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <center>
                <br/>

                <p> <input type="file" id="images" style=""/>
                    <button style="text-decoration: none;" class="add">Unggah</button> &nbsp;&nbsp;

                    <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
                        <i class="glyphicon glyphicon-trash"></i> Hapus
                    </a>
                </p>
            </center>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<!-- jquery -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<!-- notification -->
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <link  rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    
<script>
    $(document).on('click', '.add', function() {
        if ($('#images').val() != '') {
            var file_data = $('#images').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('nama', 'restu');
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
            $.ajax({
                url: 'additem-ajax-show', // point to server-side PHP script
                data: form_data,
                type: 'POST',
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        alert(data.errors['file']);
                    }
                    else {
                        filename = data;
                        toastr.success('BERHASIL.', 'BERHASIL', {timeOut: 3000});
                    }
                },
                error: function (data) {
                    toastr.error('GAGAL.', 'GAGAL', {timeOut: 3000});
                }
            });

        }
    });
    function removeFile() {
        if (filename != '')
            if (confirm('Are you sure want to remove profile picture?'))
                $.ajax({
                    url: 'remove-image-file' + filename, // point to server-side PHP script
                    type: 'GET',
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    success: function (data) {
                        $('#img1').html('<img width="100%" height="100%" src="<?php echo e(asset('upload/images/default.jpg')); ?>"/>');
                        filename = '';
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
    }
</script>
</body>
</html>
<script>
$(document).ready(function(){
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
                        maxSize: 10000000,   // 10M
                        message: 'Isi file dengan image extensi (jpeg,jpg,png,bmp,gif,svg) max 10M'
                    }
                }
            }
        }       
    })
})
</script>
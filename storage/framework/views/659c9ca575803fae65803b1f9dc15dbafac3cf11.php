<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1 nav nav-tabs tab-content" style="border:none">
            <form action="<?php echo e(url('getkendaraaninfo')); ?>" method="get" id="frmsearch" class="form-horizontal" style="padding:0 0 5px 0">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Cari data nama">
                </div>
                <span class="input-group-btn">    
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </form>
        </div>

        <div class="result">
            
        </div>
    </div>

    <script type="text/javascript">
        $('#search').on('keyup',function(e){
        //$('#frmsearch').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type : 'get',
                url  : '<?php echo e(URL::to('getkendaraaninfo')); ?>',
                data : {'search':$value},
            }).done(function(data){
                console.log(data);
            })
        })

        // $('#search').on('keyup',function(){
        //     $value=$(this).val();
        //     $.ajax({
        //         type : 'get',
        //         url  : '<?php echo e(URL::to('searchitem-ajax-show')); ?>',
        //         data : {'search':$value},
        //         success : function(data){
        //             $('tbody').html(data);
        //         },
        //         error: function (data) {
        //             toastr.error('Data tidak ditemukan.', 'FAILED', {timeOut: 4000});
        //         }
        //     })
        // })
    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1" style="margin-left:20px">
        <div class="page-header col-lg-7 col-md-8" style="padding-left:0;margin-top:0">
            <h2 style="padding-left:0">Tambah Kendaraan</h2>
        </div>
        <?php echo Form::open(array('id'=>'addform', 'method'=>'PATCH', 'enctype'=>'multipart/form-data','class'=>'form-horizontal col-lg-6 col-md-7 col-sm-12 col-xs-12','style'=>'padding-left:0')); ?>

            
            <div class="form-group" >
                <label class="col-lg-2 col-md-2 control-label" style="text-align:left">Jenis</label>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <?php echo Form::text('jenis_add', null, ['autofocus'=>'autofocus', 'class' => 'form-control', 'maxlength'=>'30']); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 control-label" style="text-align:left">Nama</label>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <?php echo Form::text('nama_add', null, ['class' => 'form-control', 'maxlength'=>'30']); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 control-label" style="text-align:left">Harga</label>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <?php echo Form::text('harga_add', null, ['class' => 'form-control', 'style'=>'padding-left:33px', 'maxlength'=>'18']); ?>

                    <span style="position:absolute;margin:-26px 0 0 10px;color:gray">Rp</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 control-label" style="text-align:left">Gambar</label>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <input type="file" class="form-control image" name="image_add" required>
                    <div style="margin-top:1px;padding:0" class="preview"></div>
                </div>
            </div>  
            <label class="control-label col-lg-2 col-md-2 col-sm-12 col-sm-12" style="margin-right:5px;"></label>
            <div class="form-group col-lg-10 col-md-10 col-sm-12 col-sm-12" style="margin-bottom:50px;padding-top:30px">
                <div class="aksi" style="float:left">
                    <button type="input" style="float:left;margin:0 5px 5px 0" class="btn btn-info actionadd">simpan</button>&nbsp
                    <button style="float:left;margin:0 5px 5px 0" type="reset" class="btn reset btn-default">reset</button>
                </div>&nbsp
                <?php echo Form::close(); ?>

                <button style="float:left;margin:0px 5px 5px 0" type="reset" class="btn btn-default awal">kembali</button>
            </div>
    </div>
</div>
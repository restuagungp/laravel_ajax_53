<div class="panel panel-default" style="margin-bottom:-5px">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr style="font-weight:bold;color:#fff" align="left" bgcolor="#585858">
                    <th align="center" style="padding:15px 10px"> &nbsp </th>
                    <th style="padding:15px 10px">Jenis</th>
                    <th style="padding:15px 10px">Nama</th>
                    <th style="padding:15px 10px">Harga</th>
                    <th style="padding:15px 10px">Gambar</th>
                    <th style="padding:15px 10px" align="center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            <?php $__currentLoopData = $datakendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dtkend): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td align="center"> &nbsp </td>
                    <td><?php echo e($dtkend->jenis); ?></td>
                    <td><?php echo e($dtkend->nama); ?></td>
                    <td><?php $hrg=number_format($dtkend->harga,0,",","."); echo "Rp ".$hrg;?></td>
                    <td><img src="<?php echo e(elixir('images/'.$dtkend->file)); ?>" width="100px" alt="not found" style="border:1px solid #eee"> </td>
                    <td align="center">
                        <form method="POST" action="<?php echo e(route('kendaraan.destroy', $dtkend->id)); ?>" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                            <a href="<?php echo e(route('kendaraan.edit', $dtkend->id)); ?>" type="submit" button type="button" style="padding:3px 8px" class="btn btn-warning"><span class="glyphicon glyphicon-edit">
                            </span> &nbsp Ubah</a> &nbsp 
                            
                            <button onclick="return confirm('Anda yakin akan menghapus data ?');" type="submit" style="padding:3px 8px" type="button" class="btn btn-danger" ><span class="glyphicon glyphicon-trash">    
                            </span> &nbsp Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $datakendaraan->render(); ?>
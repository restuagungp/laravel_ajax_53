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
            <?php $__currentLoopData = $datakendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr class="item<?php echo e($item->id); ?>">
                    <td align="center"> &nbsp </td>
                    <td><?php echo e($item->jenis); ?></td>
                    <td><?php echo e($item->nama); ?></td>
                    <td><?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></td>
                    <td align="center">
                        <div class="gallery">
                            <img id="img" class="btn-img" style="border:1px solid #eee" title="lihat gambar" src="<?php echo e(elixir('images/'.$item->file)); ?>" alt="not found" onclick="lightbox(<?php echo $key ?>)" width="100px"/>
                        </div>
                    </td>
                    <td align="center">
                        <button style="padding:3px 8px;" class="ubah btn btn-warning" data-page="<?php echo e($datakendaraan->currentpage()); ?>" data-key="<?php echo e($key); ?>"  data-id="<?php echo e($item->id); ?>"
                            data-jenis="<?php echo e($item->jenis); ?>" data-nama="<?php echo e($item->nama); ?>" data-harga="<?php echo e($item->harga); ?>" data-file="<?php echo e($item->file); ?>">
                            <span class="glyphicon glyphicon-edit"></span> &nbsp Ubah
                        </button> &nbsp 
                        <button style="padding:3px 8px" class="delete-modal btn btn-danger" data-page="<?php echo e($datakendaraan->currentpage()); ?>" data-id="<?php echo e($item->id); ?>" data-nama="<?php echo e($item->nama); ?>" data-file="<?php echo e($item->file); ?>">
                            <span class="glyphicon glyphicon-trash"></span> &nbsp Hapus
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lc-12 render">
    <span class="col-lg-10 col-md-10 col-sm-9  col-xs-12" style="padding:0"><?php echo $datakendaraan->render(); ?></span>
    <span class="col-lg-2 col-md-2 col-sm-3 total">
    Total : <?php echo e($datakendaraan->total()); ?> data 
    </span>
</div><br/><br/>

<!--images show slide on click-->
<link rel="stylesheet" type="text/css" href="<?php echo e(elixir('css/image-show-slider.css')); ?>">
<script type="text/javascript" src="<?php echo e(elixir('css/image-show-slider.js')); ?>"></script>
<div style="display:none">
    <div id="image-show-slider">
        <div class="slider-inner">
            <ul><?php $__currentLoopData = $datakendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li>
                    <img class="link-img" src="<?php echo e(elixir('images/'.$item->file)); ?>">
                    <div class="captions">
                        <h3><?php echo e($item->jenis); ?></h3>
                        <p><?php echo e($item->nama); ?>, harga per unit <?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></p>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <div id="fsBtn" class="fs-icon"></div>
        </div>
    </div>
</div>
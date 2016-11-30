<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PDF Kendaraan</title>
		<style>
			table{
				width:90%;
				margin:0 auto;
				border-collapse: collapse;
				border:1px solid #3C414C;
			}
			td{
				padding:15px 10px;
				border-top:1px solid gray;
			}
		</style>
	</head>
	<body>
		<table>
		<caption><h1>Data Kendaraan</h1></caption>
	        <thead>
	            <tr style="font-weight:bold;color:#fff;text-align:center" bgcolor="#3C414C">
	                <td>No</td>
	                <td>Jenis</td>
	                <td>Nama</td>
	                <td>Harga</td>
	                <td>Gambar</td>
	            </tr>
	        </thead>
	        <tbody>
	        <?php $__currentLoopData = $datakendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	        	<?php if($key%2==0): ?>
	            <tr align="center" style="border-top:1px solid #3C414C">
				<?php else: ?>
				<tr style="background:#eee;border-top:1px solid #3C414C" align="center">
				<?php endif; ?>
	                <td> <?php echo e($key+1); ?></td>
	                <td><?php echo e($item->jenis); ?></td>
	                <td><?php echo e($item->nama); ?></td>
	                <td><?php $hrg=number_format($item->harga,0,",","."); echo "Rp ".$hrg;?></td>
	                <td style="padding:3px 0"><img style="border:1px solid #eee" src="images/<?php echo e($item->file); ?>" width="100px"/>
                        </div>
	                </td>
	            </tr>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	        </tbody>
	    </table>
	</body>
</html>
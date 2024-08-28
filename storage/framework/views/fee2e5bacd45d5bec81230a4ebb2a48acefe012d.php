<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="page-header">
                <strong>Menu Makanan Katering</strong>
            </h2>
            <div class="row">
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-md-4">
                        <div class="panel panel-default card">
                            <div class="panel-heading">
                                <img src="<?php echo e(asset('assets/pictures/menu/'.$menu->pict)); ?>" class="img-responsive center-block" style="height: 180px">
                            </div>
                            <div class="panel-body">
                                <h4><?php echo e($menu->name); ?></h4>
                                <p><strong>Harga : </strong> Rp. <?php echo e(number_format($menu->price,0,',','.')); ?>,- / Porsi</p>
                                <p>
                                    <a href="javascript:void(0);" data-toggle="popover" title="Description" data-placement="bottom" data-content="<?php echo e($menu->description); ?>">
                                        <strong>Lihat deskripsinya Kak! <i class="fa fa-caret-down fa-fw" aria-hidden="true"></i></strong>     
                                    </a>
                                </p>
                                <hr>
                                <div class="text-right">
                                    <form>
                                        <a href="<?php echo e(route('getOrder', $menu->id)); ?>" class="btn btn-primary">Pesan Sekarang <i class="fa fa-fw fa-chevron-circle-right"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
            <div class="row text-center">
                <?php echo e($menus->links()); ?>

            </div>
        </div>  
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
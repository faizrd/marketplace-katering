<?php $__env->startSection('style'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- PNotify -->
    <link href="<?php echo e(asset('assets/pnotify/dist/pnotify.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/pnotify/dist/pnotify.buttons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/pnotify/dist/pnotify.nonblock.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        
        <section class="content-header">
            <h1> Customers </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Customer</li>
            </ol>
        </section>

        
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">All Data Customers</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="customer-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Join At</th>
                                <th>Total Order Count</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $x = 1;  ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($user->hasRole('customer')): ?>
                                    <tr>
                                        <td><strong><?php echo e($x++); ?>.</strong></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                                        <td><?php echo e($user->order->count()); ?> kali</td>
                                        <td class="text-right"  style="width: 180px;">
                                            <a href="<?php echo e(route('customer.show', $user->id)); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user"></i> <strong>PROFILE</strong></a>
                                            <button class="btn btn-danger btn-sm btn-flat" onclick="document.getElementById('remove-user-<?php echo e($user->id); ?>').submit();"><i class="fa fa-times"></i> <strong>DELETE</strong></button>
                                            <form id="remove-user-<?php echo e($user->id); ?>" action="<?php echo e(route('customer.destroy', $user->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- DataTables -->
    <script src="<?php echo e(asset('assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <!-- PNotify -->
    <script src="<?php echo e(asset('assets/pnotify/dist/pnotify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/pnotify/dist/pnotify.buttons.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/pnotify/dist/pnotify.nonblock.js')); ?>"></script>
    <script>
        $(function () {
            $('#customer-table').DataTable()
        })

        <?php if(session('message')): ?>
            $(function () {
                new PNotify({
                    title: 'Success',
                    text: '<?php echo e(session('message')); ?>',
                    type: 'success',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
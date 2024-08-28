<?php $__env->startSection('style'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- PNotify -->
    <link href="<?php echo e(asset('assets/pnotify/dist/pnotify.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/pnotify/dist/pnotify.buttons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/pnotify/dist/pnotify.nonblock.css')); ?>" rel="stylesheet">
    <style type="text/css">
        #modal-detail .row {
            margin-bottom: 5px
        }

        #modal-detail hr {
            margin: 10px 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        
        <section class="content-header">
            <h1> Orders </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Orders</a></li>
                <li class="active">Complete Order</li>
            </ol>
        </section>

        
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Complete Orders</h3>
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
                    <table id="order-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order at</th>
                                <th>Customer</th>
                                <th>Menu</th>
                                <th>QTY</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $x = 1;  ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><strong><?php echo e($x++); ?>.</strong></td>
                                    <td><?php echo e($order->created_at->format('H:i - d M Y')); ?></td>
                                    <td><a href="<?php echo e(route('customer.show', $order->user_id)); ?>"><?php echo e($order->user->name); ?></a></td>
                                    <td><?php echo e($order->menu->name); ?></td>
                                    <td><?php echo e($order->qty); ?> Porsi</td>
                                    <td>Rp. <?php echo e(number_format($order->total,0,',','.')); ?></td>
                                    <td><label class="label label-success">Complete</label></td>
                                    <td class="text-right" style="width: 180px">
                                        <button class="btn btn-primary btn-sm btn-flat btn-detail" data-toggle="modal" data-target="#modal-detail" data-route="<?php echo e(route('detail-order', $order->id)); ?>">
                                            <i class="fa fa-eye"></i> <strong>DETAIL</strong>
                                        </button>
                                        <button class="btn btn-danger btn-sm btn-flat btn-delete" onclick="document.getElementById('remove-order-<?php echo e($order->id); ?>').submit();" <?php if($order->status == 0): ?> disabled="disabled" <?php endif; ?>>
                                            <i class="fa fa-times"></i> <strong>REMOVE</strong>
                                        </button>
                                        <form id="remove-order-<?php echo e($order->id); ?>" action="<?php echo e(route('remove-order', $order->id)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        
        <section>
            <div class="row">
                <div class="modal fade" id="modal-detail" style="display: none;">
                    <div class="modal-dialog">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title" align="center"><i class="fa fa-fw fa-info-circle"></i> Order Detail</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">

                            </div>
                            <div class="clearfix"></div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
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
            $('#order-table').DataTable()
        })

        $('.btn-detail').click(function(event) {
            $.get($(this).data('route'), function(data) {
                $('#modal-detail .box-body').html(data);
            });
        });

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
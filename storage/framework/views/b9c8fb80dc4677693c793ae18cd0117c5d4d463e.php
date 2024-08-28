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
                <li class="active">Pending Order</li>
            </ol>
        </section>

        
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Pending Orders</h3>
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
                                    <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                    <td><a href="<?php echo e(route('customer.show', $order->user_id)); ?>"><?php echo e($order->user->name); ?></a></td>
                                    <td><?php echo e($order->menu->name); ?></td>
                                    <td><?php echo e($order->qty); ?> Porsi</td>
                                    <td>Rp. <?php echo e(number_format($order->total,0,',','.')); ?></td>
                                    <td>
                                        <?php if($order->status == 0): ?>
                                            <label class="label label-warning">Menunggu Verifikasi</label>
                                        <?php elseif($order->status == 1): ?>
                                            <label class="label label-info">Diverifikasi</label>
                                        <?php endif; ?>
                                    </td>
                                    <td style="width: 250px">
                                        <button class="btn btn-primary btn-sm btn-flat btn-detail" data-toggle="modal" data-target="#modal-detail" data-route="<?php echo e(route('detail-order', $order->id)); ?>">
                                            <i class="fa fa-eye"></i> <strong>DETAIL</strong> 
                                        </button>
                                        <?php if($order->status == 0): ?>
                                            <button class="btn btn-info btn-sm btn-flat btn-verify" data-form="acc-order-<?php echo e($order->id); ?>">
                                                <i class="fa fa-check"></i> <strong>ACCEPT</strong>
                                            </button>
                                            <button class="btn btn-danger btn-sm btn-flat btn-verify" data-form="cancel-order-<?php echo e($order->id); ?>">
                                                <i class="fa fa-times"></i> <strong>CANCEL</strong>
                                            </button>
                                        <?php else: ?> 
                                            <button class="btn btn-success btn-sm btn-flat btn-verify" data-form="complete-order-<?php echo e($order->id); ?>">
                                                <strong>MARK AS COMPLETE</strong>
                                            </button>
                                        <?php endif; ?>
                                        <form id="complete-order-<?php echo e($order->id); ?>" method="POST" action="<?php echo e(route('verify-order', $order->id)); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="method" value="complete">
                                        </form>
                                        <form id="acc-order-<?php echo e($order->id); ?>" method="POST" action="<?php echo e(route('verify-order', $order->id)); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="method" value="accept">
                                        </form>
                                        <form id="cancel-order-<?php echo e($order->id); ?>" method="POST" action="<?php echo e(route('verify-order', $order->id)); ?>>
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="method" value="cancel">
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

        $('.btn-verify').click(function(event) {
            document.getElementById($(this).data('form')).submit();
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
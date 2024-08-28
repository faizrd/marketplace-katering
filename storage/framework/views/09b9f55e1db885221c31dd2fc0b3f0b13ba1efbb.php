<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        
        <section class="content-header">
            <h1>
                Customer Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Customer</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo e(!empty($customer->profile->pictures) ? asset('assets/pictures/profile/'.$customer->profile->pictures) : asset('assets/pictures/profile.jpg')); ?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo e($customer->name); ?></h3>

                            <p class="text-muted text-center"><?php echo e($customer->email); ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Join at</b> <a class="pull-right"><?php echo e($customer->created_at->format('d M Y')); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Ordered</b> <a class="pull-right"><span class="badge"><?php echo e($customer->order->count()); ?></span></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone / WA</b> <a class="pull-right"><?php echo e(isset($customer->profile->phone) ? $customer->profile->phone : 'Not available'); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <b>Address</b>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <a class=""><?php echo e(isset($customer->profile->address) ? $customer->profile->address : 'Not available'); ?></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-danger btn-block" onclick="document.getElementById('remove-user').submit();"><b>DELETE THIS ACCOUNT</b></a>
                            <form id="remove-user" action="<?php echo e(route('customer.destroy', $customer->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Customer Order History</h3>
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
                            <table id="ordered-table" class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order at</th>
                                        <th>Menu</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $x = 1;  ?>
                                    <?php $__currentLoopData = $customer->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><strong><?php echo e($x++); ?>.</strong></td>
                                            <td><?php echo e($order->created_at->format('H:i - d M Y')); ?></td>
                                            <td><?php echo e($order->menu->name); ?></td>
                                            <td><?php echo e($order->qty); ?> Porsi</td>
                                            <td>Rp. <?php echo e(number_format($order->total,0,',','.')); ?></td>
                                            <td>
                                                <?php if($order->status == 0): ?>
                                                    <label class="label label-warning">Menunggu Verifikasi</label>
                                                <?php elseif($order->status == 1): ?>
                                                    <label class="label label-info">Diverifikasi</label>
                                                <?php elseif($order->status == 2): ?>
                                                    <label class="label label-success">Complete</label>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
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
    <script>
        $(function () {
            $('#ordered-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : false,
                'info'        : false,
                'autoWidth'   : false
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
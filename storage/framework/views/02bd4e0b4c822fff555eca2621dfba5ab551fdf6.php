<?php $__env->startSection('styles'); ?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="height: 80px;"></div>

                    <div class="panel-body" align="center">
                        <img src="<?php echo e(Auth::user()->profile->pictures ? asset('assets/pictures/profile/'.Auth::user()->profile->pictures) : asset('assets/pictures/profile.jpg')); ?>" style="margin-top: -70px; height: 120px; width: 120px;" class="img-circle img-responsive img-thumbnail" alt="Foto Profile"> 
                        <h3><?php echo e(Auth::user()->name); ?></h3>
                        <p><?php echo e(Auth::user()->email); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#orderhistory">Riwayat Pemesanan</a></li>
                            <li><a id="link-edit" data-toggle="tab" href="#editprofile">Edit Profil</a></li>
                        </ul>
                        <div class="tab-content" style="padding-top: 15px;">
                            <div id="orderhistory" class="tab-pane fade in active">
                                <table id="table-order" class="table table-responsive table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Pesanan</th>
                                        <th>QTY</th>
                                        <th>Status</th>
                                        <th>Total Bayar</th>
                                        <th>Opsi</th>
                                    </thead>
                                    <tbody>
                                        <?php  $i=1;  ?>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?>.</td>
                                                <td><?php echo e($order->created_at->format('d M, Y')); ?></td>
                                                <td><?php echo e($order->menu->name); ?></td>
                                                <td><?php echo e($order->qty); ?> Porsi</td>
                                                <td><label class="label label-success">Pesanan Selesai</label></td>
                                                <td> Rp. <?php echo e(number_format($order->total,0,',','.')); ?>,-</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-sm btn-detail" data-toggle="modal" data-target="#modal-detail" data-route="<?php echo e(route('detailOrder', $order->id)); ?>">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="editprofile" class="tab-pane fade">
                                <div class="col-md-4 pull-right">
                                    <h4 class="page-header">Profile Picture</h4>
                                    <form method="POST" action="<?php echo e(route('profile.update', Auth::user()->profile->id)); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('PUT')); ?>

                                        <div class="form-group">
                                            <a href="" onclick="$('input[name=pict]').click(); return false;">
                                                <img src="<?php echo e(Auth::user()->profile->pictures ? asset('assets/pictures/profile/'.Auth::user()->profile->pictures) : asset('assets/pictures/profile.jpg')); ?>" alt="Profile Pict" class="img-responsive img-thumbnail img-preview">
                                            </a>
                                            <input type="file" name="pict" class="hidden">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-block disabled" type="button" id="upload"><strong>Ubah Gambar</strong> <i class="fa fa-fw fa-upload"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="page-header">Data Diri</h4>
                                    <form method="POST" action="<?php echo e(route('profile.store')); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <label for="name">Nama Lengkap :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                                                <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Whatsapp / No. HP :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-fw fa-whatsapp"></i></span>
                                                <input type="number" name="phone" class="form-control" value="<?php echo e(isset($profile->phone) ? $profile->phone : ''); ?>" required="required" placeholder="(Ex: 082xxxxxxxxx)" data-mask="999999999999">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Alamat Lengkap :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-fw fa-map-marker"></i></span>
                                                <textarea class="form-control" name="address" rows="3" required="required" placeholder="Input alamat lengkap..."><?php echo e(isset($profile->address) ? $profile->address : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan perubahan <i class="fa fa-fw fa-check-square-o"></i></button>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="modal-detail" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="panel-title">Detail pesanan</h3>
                        </div>
                        <div class="panel-body">

                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Ok. Tutup.</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- InputMask -->
    <script src="<?php echo e(asset('assets/jquery-mask/dist/jquery.mask.min.js')); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo e(asset('assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <!-- PNotify -->
    <script src="<?php echo e(asset('assets/pnotify/dist/pnotify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/pnotify/dist/pnotify.buttons.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/pnotify/dist/pnotify.nonblock.js')); ?>"></script>
    <script type="text/javascript">
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
         
                reader.onload = function (e) {
                    $('.img-preview').attr('src', e.target.result);
                }
         
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("input[name=pict]").change(function(){
            bacaGambar(this);
            $('#upload').removeClass('disabled').addClass('btn-primary').attr('type', 'submit');
        });

        $(document).ready(function() {
            $('#table-order').DataTable({
                'lengthChange': false,
                'searching'   : false,
                // 'autoWidth'   : false
            });

            $('.btn-detail').click(function(event) {
                $.get($(this).data('route'), function(data) {
                    console.log(data);
                    $('#modal-detail .panel-body').html(data)
                });
            });
        });

        <?php if(session('message')): ?>
            $('#link-edit').click();

            $(function () {
                new PNotify({
                    title: 'Sukses.',
                    text: '<?php echo e(session('message')); ?>',
                    type: 'info',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
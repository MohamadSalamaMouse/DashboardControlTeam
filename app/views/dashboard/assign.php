<?php require_once views . 'dashboard/layout/' . 'header.php' ?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><a class="btn btn-success" href="<?= url  . "assignments/addAssign" ?>"> Add New Assign</a></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Assign Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Link</th>
                                    <th>ID_Task</th>
                                    <th>Create_AT</th>
                                    <th>UserName</th>

                                    <th>Update</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($arr['data'] as $k => $value) : ?>
                                    <?php if ($_SESSION['data'][0]['position'] == 'admin') : ?>
                                        <tr>
                                            <td> <?= $value['ID'] ?></td>
                                            <td><a href="<?= $value['Link'] ?>" target="_blank"><?= $value['Link'] ?></td>
                                            <td><a href="<?= url . "dashboard/index" ?>"><?= $value['TaskID'] ?></a></td>
                                            <td><?= $value['created_at'] ?></td>
                                            <td><a href="<?= url . "user/getUser" ?>"><?= $value['user_name'] ?></a></td>
                                            <td>
                                                <a href="update/<?= $value['ID'] ?>">Update</a>
                                            </td>
                                            <td><a href="delete/<?= $value['ID'] ?>">Delete</a></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($_SESSION['data'][0]['position'] == 'member') : ?>
                                    <?php if (!empty($arr['dataByUserName'])) : ?>
                                        <?php
                                        for ($i = 0; $arr['dataByUserName'][$i]; $i++) :  ?>
                                            <tr>
                                                <td> <?= $arr['dataByUserName'][$i]['ID'] ?></td>
                                                <td><a href=" <?= $arr['dataByUserName'][$i]['Link'] ?>" target="_blank"><?= $arr['dataByUserName'][$i]['Link'] ?></td>
                                                <td><a href="<?= url . "dashboard/index" ?>"><?= $arr['dataByUserName'][$i]['TaskID'] ?></a></td>
                                                <td><?= $value['created_at'] ?></td>
                                                <td><a href="<?= url . "user/getUser" ?>"><?= $arr['dataByUserName'][$i]['user_name'] ?></a></td>
                                                <td>
                                                    <a href="update/<?= $arr['dataByUserName'][$i]['ID'] ?>">Update</a>
                                                </td>
                                                <td><a href="delete/<?= $arr['dataByUserName'][$i]['ID'] ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                        endfor; ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?php require_once views . 'dashboard/layout/' . 'footer.php' ?>
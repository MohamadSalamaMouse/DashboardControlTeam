<?php require_once views . 'user/' . 'header.php' ?>


<body>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Login Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="getUserByEmail" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="login" class="btn btn-info">Sign in</button>
                <button type="submit" class="btn btn-default float-right"><a href="<?= url . 'user/register' ?>">Register</a></button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</body>
<?php require_once views . 'user/' . 'footer.php' ?>
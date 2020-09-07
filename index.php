<?php include './header.php'; ?>
<div class="container mt-5 d-flex">
    <div class="row justify-content-center py-auto text-center mt-5 align-self-center overflow-hidden py-5">
        <div class="col-xl-4 col-md-8 col-sm-12 bg-light rounded-lg shadow p-4">
            <form method="POST">
                <img class="mb-4" src="img/logo.png" alt="Logo" width="100" height="100">
                <h1 class="h5 mb-3 font-weight-normal">เข้าสู่ระบบ <br><?php echo $title .
                    '<br>' .
                    $eng; ?></h1>
                <label for="inputEmail" class="sr-only">ชื่อผู้ใช้ (Username)</label>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input name="username" type="text" id="username" class="form-control" placeholder="ชื่อผู้ใช้ (Username)" required autofocus>
                </div>
                <label for="inputPassword" class="sr-only">รหัสผ่าน (Password)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน  (Password)" required>
                </div>
                <button class="btn btn-lg btn-danger btn-block my-3" type="submit" name="submit" value="submit"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ (Login)</button>
            </form>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>

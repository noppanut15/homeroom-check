<?php
session_start();
// If user doesn't Login
if (!isset($_SESSION['id'])) {
    die(' 
        <script type="text/javascript">
        Swal.fire({
            title: "เกิดข้อผิดพลาด!",
            text: "กรุณาเข้าสู่ระบบ",
            icon: "error",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
        setTimeout(function () {
        window.location = "../";
        },2000);
    </script>
    ');
}

// NO Perm
if ($_SESSION['role'] < $perm) {
    die(' 
        <script type="text/javascript">
        Swal.fire({
            title: "เกิดข้อผิดพลาด!",
            text: "ไม่มีสิทธิในการเข้าหน้านี้",
            icon: "error",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
        setTimeout(function () {
        window.location = "../";
        },2000);
    </script>
    ');
}

if (isset($_POST['logout'])) {
    echo ' 
        <script type="text/javascript">
        Swal.fire({
            title: "สำเร็จ",
            text: "ออกจากระบบเรียบร้อยแล้ว",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
        setTimeout(function () {
        window.location = "../";
        },2000);
    </script>
    ';
    session_destroy();
    session_unset();
    
}

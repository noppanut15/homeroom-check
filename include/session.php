<?php 
    session_start();
    // If user doesn't Login
    if(!isset($_SESSION['user_id'])){
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
        window.location = "login.php";
        },2000);
    </script>
    ');
    }

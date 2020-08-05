<?php
include 'func.php';

$conn = conn();

session_start();

if (isset($_POST['submit'])) {
    // echo 'submit';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //echo $username;
    //echo $password;

    $sql =
        "SELECT * FROM teacher WHERE username = \"" .
        $username .
        "\" AND PASSWORD = \"" .
        $password .
        "\"";
    //echo $sql;

    $result = mysqli_query($conn, $sql);

    //Query
    if ($result) {
        $row = mysqli_num_rows($result);

        if ($row == 1) {
            $user = mysqli_fetch_array($result);
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            $_SESSION['gender'] = $user['gender'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['room'] = $user['room'];

            if ($_SESSION['role'] == 1) {
                $role_page = "check";
            } elseif ($_SESSION['role'] == 99) {
                $role_page = "admin";
            }

            $last_login =
                "UPDATE `teacher` SET `last_login`= (CURRENT_TIMESTAMP) WHERE id = " .
                $_SESSION['id'];
            $last_login_update = mysqli_query($conn, $last_login);
            die(
                '
                        <script type="text/javascript">
                            Swal.fire({
                                title: "สำเร็จ!",
                                text: "เข้าสู่ระบบเรียบร้อยแล้ว",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true
                            });
    
                            setTimeout(function() {
                                window.location = "' .
                    $role_page .
                    '";
                            },2000);
    
                        </script>
                    '
            );
        } else {
            echo '
                     <script type="text/javascript">
                         Swal.fire({
                             title: "เกิดข้อผิดพลาด!",
                             text: "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง",
                             icon: "error",
                             showConfirmButton: false,
                             timer: 2000,
                             timerProgressBar: true
                         })
                     </script>
                     ';
        }
    }
}

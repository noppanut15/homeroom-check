<?php

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $gender = $conn->real_escape_string($_POST['gender']);
    $name = $conn->real_escape_string($_POST['name']);
    $lastname = $conn->real_escape_string($_POST['lastname']);

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $role = $conn->real_escape_string($_POST['role']);

    $level = $conn->real_escape_string($_POST['level']);
    $room = $conn->real_escape_string($_POST['room']);

    $sql = "UPDATE `teacher` SET `username` = '$username', `password` = '$password', `gender` = '$gender', `name` = '$name', `lastname` = '$lastname', `level` = $level, `room` = $room,`role` = $role WHERE id = $id";

    if ($conn->query($sql) === true) {
        echo '
        <script type="text/javascript">
        Swal.fire({
            icon: "success",
            title: "บันทึกข้อมูลผู้ใช้สำเร็จ",
            text: "บันทึกข้อมูล ' . $gender . '' . $name . '' . $lastname . ' เรียบร้อยแล้ว",
            showConfirmButton: true
          })
        </script>
        ';
    } else {
        echo $sql;
        echo '
        <script type="text/javascript">
        Swal.fire({
            icon: "error",
            title: "เกิดข้อผิดพลาด",
            text: "' . $conn->error . '",
            showConfirmButton: true
          })
        </script>
        ';
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

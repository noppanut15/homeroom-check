<?php
$conn = conn();

if (isset($_POST['submit'])) {
    $gender = $conn->real_escape_string($_POST['gender']);
    $name = $conn->real_escape_string($_POST['name']);
    $lastname = $conn->real_escape_string($_POST['lastname']);

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $role = $conn->real_escape_string($_POST['role']);

    $level = $conn->real_escape_string($_POST['level']);
    $room = $conn->real_escape_string($_POST['room']);

    $sql = "INSERT INTO `teacher`(`username`, `password`, `gender`, `name`, `lastname`, `level`, `room`,`role`) 
                              VALUES ('$username', '$password','$gender', '$name','$lastname', $level, $room, $role)";

    if ($conn->query($sql) === true) {
        echo '
        <script type="text/javascript">
        Swal.fire({
            icon: "success",
            title: "เพิ่มผู้ใช้สำเร็จ",
            text: "เพิ่ม ' . $gender . '' . $name . '  ' . $lastname . ' เรียบร้อยแล้ว",
            showConfirmButton: true
          })
        </script>
        ';
    } else {
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

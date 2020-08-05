<?php
$id = $_GET['id'];

if (isset($_POST['confirm'])) {
    $confirm = $_POST['confirm'];
    if ($confirm == 0) {
        header("location: ./index.php");
    } else if ($confirm == 1) {
        $sql = "DELETE FROM `teacher` WHERE id = $id";
        if ($conn->query($sql) === true) {
            echo '
                <script type="text/javascript">
                Swal.fire({
                    icon: "success",
                    title: "ลบผู้ใช้สำเร็จ",
                    text: "ลบ ' . $gender . '' . $name . '' . $lastname . ' เรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                  })
                  setTimeout(function () {
                    window.location = "./";
                    },2000);
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
}

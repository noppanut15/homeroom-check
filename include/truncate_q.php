<?php 
    $conn = conn();
    if(isset($_POST['submit'])){
        // Check Password
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $id = $_SESSION['id'];

        $sql = "SELECT id FROM teacher WHERE id = $id AND password = '$password'";
        $result = $conn->query($sql);

        //echo $sql;

        if($result->num_rows == 1){
            // Empty Absent
            $sql = "TRUNCATE absent";
            $result = $conn->query($sql);

            // Empty Checked_room
            $sql = "TRUNCATE checked_room;";
            $result = $conn->query($sql);
            
            echo '
            <script type="text/javascript">
            Swal.fire({
                icon: "success",
                title: "ลบข้อมูลเรียบร้อยแล้ว",
              })
            </script>
            ';
        } else {
            echo '
            <script type="text/javascript">
            Swal.fire({
                icon: "error",
                title: "รหัสผ่านไม่ถูกต้อง",
                showConfirmButton: true
              })
            </script>
            ';
        }
    }
?>
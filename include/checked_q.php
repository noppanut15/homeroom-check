<?php
$conn = conn();

if (isset($_POST['date']) && isset($_POST['level'])) {
    $date = $_POST['date'];
    $level = $_POST['level'];

    if ($level == 0) {
        echo '<div class="col-md-6 col-sm-12">';
        for ($i = 1; $i <= 3; $i++) {
            echo '<h2 class="h3">ระดับชั้น ม.' . $i . '</h2>';
            echo '<hr>';

            // query
            $sql = "SELECT DISTINCT room FROM student WHERE level = $i AND room NOT IN(SELECT room FROM checked_room WHERE level = $i AND date = '$date') ORDER BY room";
            //echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<p class="font-weight-bolder">';
                while ($row = $result->fetch_assoc()) {
                    echo $i . '/' . $row['room'] . '  ';
                }
                echo '</p>';
            } else {
                echo '<h4 class="font-weight-bolder">ไม่พบผลการค้นหา</h4>';
            }
        }
        echo '</div>';
        echo '<div class="col-md-6 col-sm-12">';
        for ($i = 4; $i <= 6; $i++) {
            echo '<h2 class="h3">ระดับชั้น ม.' . $i . '</h2>';
            echo '<hr>';

            // query
            $sql = "SELECT DISTINCT room FROM student WHERE level = $i AND room NOT IN(SELECT room FROM checked_room WHERE level = $i AND date = '$date') ORDER BY room";
            //echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<p class="font-weight-bolder">';
                while ($row = $result->fetch_assoc()) {
                    echo $i . '/' . $row['room'] . '  ';
                }
                echo '</p>';
            } else {
                echo '<h4 class="font-weight-bolder">ไม่พบผลการค้นหา</h4>';
            }
        }
        echo '</div>';
    } else {
        $sql = "SELECT DISTINCT room FROM student WHERE level = $level AND room NOT IN(SELECT room FROM checked_room WHERE level = $level AND date = '$date') ORDER BY room";
        //echo $sql;
        $result = $conn->query($sql);

        echo '<div class="col-12">';
        echo '<h2 class="h3">ระดับชั้น ม.' . $level . '</h2>';
        echo '<hr>';
        if ($result->num_rows > 0) {
            echo '<p class="font-weight-bolder">';
            while ($row = $result->fetch_assoc()) {
                echo $level . '/' . $row['room'] . '  ';
            }
            echo '</p>';
        } else {
            echo '<h4 class="font-weight-bolder">ไม่พบผลการค้นหา</h4>';
        }
        echo '</div>';
    }
}

?>

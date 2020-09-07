<?php
$level = intval($_GET['level']);
$room = intval($_GET['room']);
$date = $_GET['date'];

// echo $date;

include 'func.php';
$conn = conn();

$sql =
    "SELECT stdID,no,gender,name,lastname FROM student WHERE level = '" .
    $level .
    "' AND room = '" .
    $room .
    "' ORDER BY no";
// echo $sql;
$resultSQL = mysqli_query($conn, $sql);

echo '<!-- Start Student Section --><h3 class="text-center mt-4">ลงข้อมูลการเข้ากิจกรรมหน้าเสาธงนักเรียน</h3>';
echo '<hr>';
echo '
<!-- Start Student Status Table -->
<table class="table table-hover" style="overflow-x: hidden;">
  <!-- Start Table Header -->
  <thead align="center">
  	<th>เข้าร่วม</th>
    <th>ไม่เข้าร่วม</th>
    <th>เลขที่</th>
    <th>คำนำ</th>
    <th align="left">ชื่อ</th>
    <th align="left">สกุล</th>
  </thead>
  <!-- Start Table Header -->  
';

$c = 1;
while ($rows = mysqli_fetch_array($resultSQL)) {
    $sql1 =
        "SELECT type FROM absent WHERE stdID = " .
        $rows['stdID'] .
        " AND date = '$date'";
    //echo $sql1.'<br>';
    $result_type = $conn->query($sql1);
    $type = $result_type->fetch_assoc();
    // echo $type['type'];

    echo '<tr align="center">
    <!-- Present Col -->
    <td>
      <span class="presentRadio text-success font-weight-bold">
        <input class="present" type="radio" name="status[' .
        $rows['no'] .
        ']" id="1_[' .
        $rows['no'] .
        ']" value=""';
    if ($result_type->num_rows == 0) {
        echo 'checked';
    }
    echo '/>
        <label for="1_[' .
        $rows['no'] .
        ']"><i class="fas fa-check-circle"></i></label>
      </span>
    </td>
    <!-- Absent Col -->
    <td>
      <!-- Absent (Leave) -->
      <span class="leaveRadio text-warning font-weight-bold">
        <input class="leave" type="radio" name="status[' .
        $rows['no'] .
        ']" id="3_[' .
        $rows['no'] .
        ']" value="2" ';
    if ($type['type'] == 2) {
        echo 'checked';
    }
    echo '    />
        <label for="3_[' .
        $rows['no'] .
        ']"></label>      
      </span>  
      <!-- Absent (Absent) -->   
      <span class="absentRadio text-danger font-weight-bold">
        <input class="absent" type="radio" name="status[' .
        $rows['no'] .
        ']" id="4_[' .
        $rows['no'] .
        ']" value="3" ';
    if ($type['type'] == 3) {
        echo 'checked';
    }
    echo '/>
        <label for="4_[' .
        $rows['no'] .
        ']"></label>
      </span>
      <!-- Absent (Late) -->
      <span class="lateRadio text-info font-weight-bold">
        <input class="late" type="radio" name="status[' .
        $rows['no'] .
        ']" id="5_[' .
        $rows['no'] .
        ']" value="4" ';
    if ($type['type'] == 4) {
        echo 'checked';
    }
    echo ' />
        <label for="5_[' .
        $rows['no'] .
        ']"></label>
      </span>
      <!-- Absent (SchoolLate) -->
      <span class="SchoollateRadio text-info font-weight-bold">
        <input class="Schoollate" type="radio" name="status[' .
        $rows['no'] .
        ']" id="6_[' .
        $rows['no'] .
        ']" value="5"  ';
    if ($type['type'] == 5) {
        echo 'checked';
    }
    echo '/>
        <label for="6_[' .
        $rows['no'] .
        ']"></label>
      </span>
      <!-- Absent (Activity) -->
      <span class="actRadio text-info font-weight-bold">
        <input class="act" type="radio" name="status[' .
        $rows['no'] .
        ']" id="7_[' .
        $rows['no'] .
        ']" value="6" ';
    if ($type['type'] == 6) {
        echo 'checked';
    }
    echo ' />
        <label for="7_[' .
        $rows['no'] .
        ']"></label>
      </span>
    </td>';

    echo '</td>';

    echo '
    <!-- Student Info -->
    <!-- Student NO. --><th>' .
        $rows['no'] .
        '</th>
    <!-- Student Gender --><td>' .
        $rows['gender'] .
        '</td>
    <!-- Student Name --><td align="left">' .
        $rows['name'] .
        '</td>
    <!-- Student Lastname --><td align="left">' .
        $rows['lastname'] .
        '</td>
    <!-- Student ID --><input type="hidden" name="stdID[' .
        $rows['no'] .
        ']" value="' .
        $rows['stdID'] .
        '">
    <!-- Student NO --><input type="hidden" name="no[' .
        $c .
        ']" value="' .
        $rows['no'] .
        '">
  </tr>';
    $c++;
}
echo '</table><!-- End Student Status Table --><!-- End Student Section -->';
?>
<?php mysqli_close($conn); ?>

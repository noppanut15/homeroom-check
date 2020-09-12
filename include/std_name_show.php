<?php
$level = intval($_SESSION['level']);
$room = intval($_SESSION['room']);

//include 'func.php';
$conn = conn();

$sql =
    "SELECT stdID,no,gender,name,lastname,api_token FROM student WHERE level = '" .
    $level .
    "' AND room = '" .
    $room .
    "' ORDER BY no";
// echo $sql;
$resultSQL = mysqli_query($conn, $sql);
?>

<!-- Start Student Section -->
<h3 class="text-center mt-4">ลงข้อมูลการเข้ากิจกรรมหน้าเสาธงนักเรียน</h3>
<hr>
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

  <?php
  $c = 1;
  while ($rows = mysqli_fetch_array($resultSQL)) { ?>
    <tr align="center">
      <!-- Present Col -->
      <td>
        <span class="presentRadio text-success font-weight-bold">
          <input class="present" type="radio" name="std_[<?php echo $rows[
              'no'
          ]; ?>]" id="1_[<?php echo $rows['no']; ?>]" value="" checked />
          <label for="1_[<?php echo $rows[
              'no'
          ]; ?>]"><i class="fas fa-check-circle"></i></label>
        </span>
      </td>
      <!-- Absent Col -->
      <td>
        <!-- Absent (Leave) -->
        <span class="leaveRadio text-warning font-weight-bold">
          <input class="leave" type="radio" name="std_[<?php echo $rows[
              'no'
          ]; ?>]" id="3_[<?php echo $rows['no']; ?>]" value="2" />
          <label for="3_[<?php echo $rows['no']; ?>]"></label>
        </span>
        <!-- Absent (Absent) -->
        <span class="absentRadio text-danger font-weight-bold">
          <input class="absent" type="radio" name="std_[<?php echo $rows[
              'no'
          ]; ?>]" id="4_[<?php echo $rows['no']; ?>]" value="3" />
          <label for="4_[<?php echo $rows['no']; ?>]"></label>
        </span>
        <!-- Absent (Late) -->
        <span class="lateRadio text-info font-weight-bold">
          <input class="late" type="radio" name="std_[<?php echo $rows[
              'no'
          ]; ?>]" id="5_[<?php echo $rows['no']; ?>]" value="4" />
          <label for="5_[<?php echo $rows['no']; ?>]"></label>
        </span>
        <!-- Absent (Activity) -->
        <span class="actRadio text-info font-weight-bold">
          <input class="act" type="radio" name="std_[<?php echo $rows[
              'no'
          ]; ?>]" id="7_[<?php echo $rows['no']; ?>]" value="6" />
          <label for="7_[<?php echo $rows['no']; ?>]"></label>
        </span>
      </td>

      </td>

      <!-- Student Info -->
      <!-- Student NO. -->
      <th><?php echo $rows['no']; ?></th>
      <!-- Student Gender -->
      <td><?php echo $rows['gender']; ?></td>
      <!-- Student Name -->
      <td align="left"><?php echo $rows['name']; ?></td>
      <!-- Student Lastname -->
      <td align="left"><?php echo $rows['lastname']; ?></td>
      <!-- Student ID -->
      <input type="hidden" name="stdID[<?php echo $rows[
          'no'
      ]; ?>]" value="<?php echo $rows['stdID']; ?>">
      <!-- Student NO -->
      <input type="hidden" name="no[<?php echo $c; ?>]" value="<?php echo $rows[    'no']; ?>">
      <!-- Student NO -->
      <input type="hidden" name="api_token[<?php echo $c; ?>]" value="<?php echo $rows[    'api_token']; ?>">
    </tr>
  <?php $c++;}
  ?>
</table>
<!-- End Student Status Table -->
<!-- End Student Section -->

<?php mysqli_close($conn); ?>

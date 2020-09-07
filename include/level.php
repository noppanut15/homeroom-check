<?php
$conn = conn();

$sql = "SELECT DISTINCT level FROM student ORDER BY level ASC";

$result = $conn->query($sql);

if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' .
            $row['level'] .
            '">' .
            $row['level'] .
            '</option>';
    }
} else {
    echo '<option value="">ERROR</option>';
}
?>


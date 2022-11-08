<?php
require_once("header.php"); ?>

<body>
    <h1>Courses</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>CourseID</th>
      <th>Prefix</th>
      <th>Number</th>
      <th>InstructorID</th>
    </tr>
  </thead>
  <tbody>
    <?php
$servername = "localhost:3306";
$username = "tamrined_suser";
$password = "(_y)XTDI)NmV";
$dbname = "tamrined_4013Homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ciid = $_POST['InstructorID'];      
//echo $iid;
$sql = "SELECT CourseID, c.Prefix, c.Number, c.InstructorID
FROM Course c JOIN Instructor i ON c.InstructorID=i.InstructorID WHERE i.InstructorID=" . $ciid;
//WHERE c.InstructorID=i.InstructorID"
//echo $sql;
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><a href="course-section.php?CourseID=<?=$row["CourseID"]?>"><?=$row["CourseID"]?></td>
    <td><?=$row["Prefix"]?></td>
    <td><?=$row["Number"]?></td>
    <td><?=$row["InstructorID"]?></td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>

    <?php require_once("footer.php"); ?>

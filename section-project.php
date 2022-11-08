<?php require_once("header.php"); ?>

  <body>
    <h1>Projects</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>SectionID</th>
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
$iid = $_GET['SectionID'];
//echo $iid;
$sql = "SELECT ProjectID, p.Name, p.SectionID
FROM Project p JOIN Section s ON s.SectionID=p.SectionID WHERE p.SectionID=" . $iid;

//echo $sql;
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["ProjectID"]?></td>
    <td><?=$row["Name"]?></td>
    <td><?=$row["SectionID"]?></td>
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

<?php require_once("header.php"); ?>

<body>
    <h1>Sections</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>SectionID</th>
      <th>Prefix</th>
      <th>Number</th>
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
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
      $sqlAdd = "insert into Section (SectionID) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['sID']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New section added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Section set SectionID=? where SectionID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['sID'], $_POST['siid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Section edited.</div>';
      break;
    case 'Delete':
      $sqlDelete = "delete from Section where SectionID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['siid']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Section deleted.</div>';
      break;
  }
}

$sql = "SELECT SectionID, Prefix, Number FROM Section";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["SectionID"]?></td>
    <td><?=$row["Prefix"]?></td>
    <td><?=$row["Number"]?></td>

            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editSection<?=$row["SectionID"]?>">Edit</button>
              <div class="modal fade" id="editSection<?=$row["SectionID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSection<?=$row["SectionID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editSection<?=$row["SectionID"]?>Label">Edit Section</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editSection<?=$row["SectionID"]?>ID" class="form-label">Edit SectionID</label>
                          <input type="text" class="form-control" id="editSection<?=$row["SectionID"]?>ID" aria-describedby="editSection<?=$row["SectionID"]?>Help" name="sID" value="<?=$row['SectionID']?>">
                          <div id="editSection<?=$row["SectionID"]?>Help" class="form-text">Enter the SectionID.</div>
                        </div>
                        <input type="hidden" name="siid" value="<?=$row['SectionID']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="siid" value="<?=$row["SectionID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <input type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this section?')" value="Delete">
              </form>
            </td>
          </tr>
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

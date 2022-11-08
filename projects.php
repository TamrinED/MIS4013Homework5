<?php require_once("header.php"); ?>

<body>
    <h1>Projects</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ProjectID</th>
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
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
      $sqlAdd = "insert into Project (Name) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['pName']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New project added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Project set Name=? where ProjectID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['pName'], $_POST['pid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Instructor edited.</div>';
      break;
    case 'Delete':
      $sqlDelete = "delete from Project where ProjectID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['pid']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Project deleted.</div>';
      break;
  }
}

$sql = "SELECT ProjectID, SectionID, Name FROM Project";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["ProjectID"]?></td>
    <td><?=$row["Name"]?></td>
    <td><?=$row["SectionID"]?></td>
      <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editProject<?=$row["ProjectID"]?>">Edit</button>
              <div class="modal fade" id="editProject<?=$row["ProjectID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProject<?=$row["ProjectID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editProject<?=$row["ProjectID"]?>Label">Edit Project</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editProject<?=$row["Name"]?>Name" class="form-label">Edit Project Name</label>
                          <input type="text" class="form-control" id="editProject<?=$row["Name"]?>Name" aria-describedby="editProject<?=$row["Name"]?>Help" name="pName" value="<?=$row['Name']?>">
                          <div id="editProject<?=$row["FirstName"]?>Help" class="form-text">Enter the Project's name.</div>
                        </div>
                        <input type="hidden" name="pid" value="<?=$row['ProjectID']?>">
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
                <input type="hidden" name="pid" value="<?=$row["ProjectID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <input type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this project?')" value="Delete">
              </form>
            </td>
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

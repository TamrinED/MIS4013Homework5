<?php require_once("header.php"); ?>

<body>
    <h1 id = "left">Courses</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>CourseID</th>
      <th>Prefix</th>
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
      $sqlAdd = "insert into Course (Name) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['cID']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New course added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Course set CourseID=? where CourseID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['cID'], $_POST['cid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Course edited.</div>';
      break;
    case 'Delete':
      $sqlDelete = "delete from Course where ID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['cid']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Course deleted.</div>';
      break;
  }
       }
      
$sql = "SELECT CourseID, Prefix, Number FROM Course";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      
      
?>
  <tr>
    <td><?=$row["CourseID"]?></td>
    <td><?=$row["Prefix"]?></td>
    <td><?=$row["Number"]?></td>
      
    <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editCourse<?=$row["CourseID"]?>">Edit</button>
              <div class="modal fade" id="editCourse<?=$row["CourseID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCourse<?=$row["CourseID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editCourse<?=$row["CourseID"]?>Label">Edit Course</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editCourse<?=$row["CourseID"]?>ID" class="form-label">Edit CourseID</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>ID" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cID" value="<?=$row['CourseID']?>">
                          <div id="editCourse<?=$row["CourseID"]?>Help" class="form-text">Enter the course's ID.</div>
                        </div>
                        <input type="hidden" name="cid" value="<?=$row['CourseID']?>">
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
                <input type="hidden" name="cid" value="<?=$row["CourseID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <input type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this course?')" value="Delete">
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

<script>
function myFunction1() {
  document.getElementById("demo").innerHTML = "MIS is the best division at OU!";
}
</script>

<p>When you click "Secret", you will know a secret.</p>
<p>The secret is a message.</p>

<button onclick="myFunction1()">Secret?</button>

    <div padding-left: 80px>;
<p id="demo"></p>
    </div>
        
    <script>
        function myFunction2() {
           document.getElementById("right").innerHTML = Date();
        }
    </script>
    <p>Click "Time" to know the current time.</p>
    <button onclick="myFunction2()">Time?</button>
<p id="right"></p>

<script>
function myFunction3() {
  document.getElementById("left").style.fontSize = "50px"; 
  document.getElementById("left").style.color = "blue";       
}
</script>

    <p>Click me to change the color of the title of this webpage</p>
<button type="button" onclick="myFunction3()">iSpy BLUE!</button>

    <p>Here, a JavaScript changes the value of the src (source) attribute of an image.</p>

<script>
function light(sw) {
  var pic;
  if (sw == 0) {
    pic = "pic_bulboff.gif"
  } else {
    pic = "https://static.wikia.nocookie.net/harrypotter/images/5/5b/Lumos.JPG/revision/latest?cb=20110623141942"
  }
  document.getElementById('myImage').src = pic;
}
</script>

<img id="myImage" src="pic_bulboff.gif" width="100" height="180">

<p>
<button type="button" onclick="light(1)">Lumos</button>
<button type="button" onclick="light(0)">Nox</button>
</p>
    
    <?php require_once("footer.php"); ?>

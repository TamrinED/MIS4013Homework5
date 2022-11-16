<?php require_once("header.php"); ?>



<script>
function myFunction1() {
  document.getElementById("demo").innerHTML = "MIS is the best division at OU!";
}
</script>

<p id = left>When you click "Secret", you will know a secret.</p>
<p id = left>The secret is a message.</p>

<button onclick="myFunction1()">Secret?</button>

    <div padding-left: 80px>;
<p id="demo"></p>
    </div>
        
    <script>
        function myFunction2() {
           document.getElementById("right").innerHTML = Date();
        }
    </script>
    <p id = left>Click "Time" to know the current time.</p>
    <button onclick="myFunction2()">Time?</button>
<p id="right"></p>

<script>
function myFunction3() {
  document.getElementById("left").style.fontSize = "50px"; 
  document.getElementById("left").style.color = "blue";       
}
</script>

    <p id = left>Click me to change the color of the title of this webpage</p>
<button type="button" onclick="myFunction3()">iSpy BLUE!</button><br>

    <p id = left>Who is the better team historically!?</p>

<script>
function light(sw) {
  var pic;
  if (sw == 0) {
    pic = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR08on-LKlO4ExAMyFxCfNffKwWMkFueMcd8Q&usqp=CAU"
  } else {
    pic = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBBqKg0MxFj7lmB0CxDDgsS03fXqfS04ajfg&usqp=CAU"
  }
  document.getElementById('myImage').src = pic;
}
</script>

<img id="myImage" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeHF5WgOAmP5o9WrnWLpKpcq1NTa7XlHTUnA&usqp=CAU" width="200" height="180">

<p>
<button type="button" onclick="light(1)">OU</button>
<button type="button" onclick="light(0)">OSU</button>
</p>
    
    <?php require_once("footer.php"); ?>

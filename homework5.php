<?php require_once("header.php"); ?>
</head>

<script>
function myFunction1() {
  document.getElementById("demo").innerHTML = "MIS is the best division at OU!";
}
</script>

<h3 id = left>When you click "Secret", you will know a secret.</h3>
<p>The secret is a message.</p>

<button onclick="myFunction1()">Secret?</button>
     
    <script>
        function myFunction2() {
           document.getElementById("right").innerHTML = Date();
        }
    </script>

    <h3>Click "Time" to know the current time.</h3>
    <button onclick="myFunction2()">Time?</button>
<p style="color:red;" id="right"></p>

<script>
function myFunction3() {
  document.getElementById("left").style.fontSize = "30px"; 
  document.getElementById("left").style.color = "blue";       
}
</script>

    <h3>Click me to change the color of one sentence!</h3>
<button type="button" onclick="myFunction3()">iSpy BLUE!</button><br>

    <h3>Who is the better team historically!?</h3>

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

<script> 
  function myFunction4() {
    document.getElementById("switch").style.fontSize = "55px";
    document.getElementById("switch").style.background-color = "AntiqueWhite";
  document.getElementById("switch").style.color = "DarkTurquoise";
  }
</script>

  <h4 id="switch"> Edit this text using the button below</h4> <br>
<button type="button" onclick="myFunction4()">Switch</button>

    <?php require_once("footer.php"); ?>

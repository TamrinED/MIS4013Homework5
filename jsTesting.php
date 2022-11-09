<?php require_once("header.php") ?>


<?php
function flipbook(){
<div id="flipbook"</div>
	<div class="hard"> Turn.js </div>
	<div class="hard">Book of Syllabuses</div>
	<div> MIS 2113 </div>
	<div> MIS 3033 </div>
	<div> MIS 4013 </div>
	<div> MIS 3353 </div>
	<div class="hard"></div>
	<div class="hard"></div>
</div>
<script type="text/javascript">
	$("#flipbook").turn({
		width: 400,
		height: 300,
		autoCenter: true
	});
</script>

}
?>


<?php require_once("footer.php") ?>

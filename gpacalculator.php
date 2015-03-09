<?php
/**
 * MyWikis
 * GPA Calculator (Weighted)
 * @author Jeffrey Wang
 * @contributors CJ Duffee
 * @license GNU License 2.0 (Because GitHub forced me to do so)
*/
?>
<html lang="en">
	<head>
		<title>GPA Calculator by MyWikis</title>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
<?php
if ( $_REQUEST['submit'] ) {
	$dividend = 0.0;
	$divisor = $_REQUEST['numberofclasses'];
	for ( $i = 1; $i <= 7; $i++ ) {
		$dividendpregpa = "" + $_REQUEST[answers . $i];
		if ( $dividendpregpa > 100) {
			echo "GPA grades of greater than 100 do not count for GPA. We automatically set it to 100 for you.";
			$dividendpregpa = 100;
		}
		if ( $dividendpregpa < 0) {
			echo "GPA grades of lower than 0 do not count for GPA. We automatically set it to 0 for you.";
			$dividendpregpa = 0;
		}
		
		// Failing does not set GPA to zero! 61 would be 0.1
		$dividendpregpa -= 60; // 100 will be 40
		if ($dividendprega < 0) { // makes so no negative Grades
			$dividendprega = 0;
		}
		
		$gpaForClass = $dividendprega / 10;
		
		if ( $_REQUEST[gpa . $i] == 5 ) { 
			$gpaForClass += 1.0;
		}
		if ( $_REQUEST[gpa . $i] == 6 ) {
			$gpaForClass += 2.0;
		}
		
		$dividend += $gpaForClass;
	}
	$quotient = $dividend / $divisor;
	?>
	<h2>GPA Calculator</h2>
	<p>by Jeffrey Wang for MyWikis</p>
	<hr />
	<p>Your GPA is <b><?php echo $quotient; ?></b>.</p>
	<?php
} elseif ( $_REQUEST['init'] == true ) {
	?>
	<h2>GPA Calculator</h2>
	<p>by Jeffrey Wang for MyWikis</p>
	<hr />
	<form method="post" action="gpacalculator.php">
	<?php
	for ( $i = 1; $i <= $_REQUEST['numofclasses']; $i++ ) {
		?>
		<!--Class name <?php echo $i; ?>: <input type="text" name="name<?php echo $i; ?>" /></br >-->
		Grade in class <?php echo $i; ?>: <input type="tel" name="answers<?php echo $i; ?>" /> GPA scale: <select name="gpa<?php echo $i; ?>"><option value="4">4.0 (Core/Regular/Academic)</option><option value="5">5.0 (Honors/Pre-AP)</option><option value="6">6.0 (AP)</option></select><br />
		<!--Class semester/final exam in GPA format <?php echo $i; ?>: <input type="text" name="exam<?php echo $i; ?>" /><br />-->
	<?php
	}
	?>
	<input type="hidden" name="submit" value="true" />
	<input type="hidden" name="numberofclasses" value="<?php echo $_REQUEST['numofclasses']; ?>" />
	<button class="btn btn-primary" type="submit">Calculate GPA!</button>
	</form>
	<hr />
	<p>We do not log your data.</p>
	<p>An example of GPA format: 95 in 4.0 class is "3.5", 98 in 5.0 class is "4.8", 97 in 6.0 class is "5.7".</p>
	<p><b>Hint:</b> Use this form twice; each time for each semester's grades. After that, average the two for your true GPA. This way, you will be able to correctly incorporate your calculations of one-semester courses and semester exams.</p>
	<?php
} else {
  ?>
  <h1>GPA Calculator</h1>
  <p>by Jeffrey Wang for MyWikis</p>
  <hr />
  <form method="post" action="gpacalculator.php">
  How many classes do you have?: <input type="number" name="numofclasses" value="7" /><br />
  <input type="hidden" name="init" value="true" />
  <button class="btn btn-primary" type="submit">Let's start.</button>
  </form>
<?php
}
?>
		</div>
	</body>
</html>

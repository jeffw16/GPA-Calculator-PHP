<?php
/**
 * MyWikis
 * GPA Calculator (Weighted)
 * @author Jeffrey Wang
 * @contributors CJ Duffee
 * @license None
*/
?>
<html lang="en">
	<head>
		<title>GPA Calculator by MyWikis</title>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
<?php
if ( $_REQUEST['submit'] ) {
	$dividend = 0.0;
	$divisor = $_REQUEST['numberofclasses'];
	for ( $i = 1; $i <= $_REQUEST['numberofclasses']; ++$i ) {
		$addMoreToGPA = 0;
		if ( $_REQUEST[gpa . $i] == "core" ) {
			$addMoreToGPA = ( $_REQUEST['gpamaxcore'] - 4.0 );
		} elseif ( $_REQUEST[gpa . $i] == "honors" ) {
			$addMoreToGPA = ( $_REQUEST['gpamaxhonors'] - 4.0 );
		} elseif ( $_REQUEST[gpa . $i] == "ap" ) {
			$addMoreToGPA = ( $_REQUEST['gpamaxap'] - 4.0 );
		} else {
			echo "ERROR: Unspecified GPA type.";
			die ();
		}
		$dividendpregpa = $_REQUEST[answers . $i];
		if ( $dividendpregpa > 100 ) {
			echo "GPA grades of greater than 100 do not count for GPA. We automatically set it to 100 for you.";
			$dividendpregpa = 100;
		}
		if ( $dividendpregpa < 0 ) {
			echo "GPA grades of lower than 0 do not count for GPA. We automatically set it to 0 for you.";
			$dividendpregpa = 0;
		}
		
		// Failing does not set GPA to zero! 61 would be 0.1
		$dividendpregpa -= 60; // 100 will be 40
		
		$gpaForClass = $dividendpregpa / 10;
		$gpaForClass += $addMoreToGPA;
		$dividend += $gpaForClass;
	}
	$quotient = $dividend / $divisor;
	?>
	<h2>GPA Calculator</h2>
	<hr />
	<p>Your GPA is <b><?php echo $quotient; ?></b>.</p>
	<?php
} elseif ( $_REQUEST['init'] ) {
	?>
	<h2>GPA Calculator</h2>
	<hr />
	<form method="post" action="gpacalculator.php">
	GPA maximum for Core/Regular/Academic classes: <input type="tel" name="gpamaxcore" value="4" /><br />
	GPA maximum for Honors/Pre-AP&reg;: <input type="tel" name="gpamaxhonors" value="5" /><br />
	GPA maximum for AP: <input type="tel" name="gpamaxap" value="6" /><br />
	<hr />
	<?php
	for ( $i = 1; $i <= $_REQUEST['numofclasses']; $i++ ) {
		?>
		Final grade in class <?php echo $i; ?>: <input type="tel" name="answers<?php echo $i; ?>" /> GPA scale: <select name="gpa<?php echo $i; ?>"><option value="core">Core/Regular/Academic</option><option value="honors">Honors/Pre-AP&reg;</option><option value="ap">AP</option></select><br />
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

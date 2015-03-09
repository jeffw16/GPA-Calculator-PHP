<?php
/**
 * MyWikis
 * GPA Calculator (Weighted)
 * @author Jeffrey Wang
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
		//$dividend += $_REQUEST[exam . $i] / 7;
		if ( $dividendpregpa > 100 || $dividendpregpa < 0 ) {
			echo "We're terribly sorry, but your grade must be between 0 and 100, and it is not, and therefore we cannot process your grade.
			We understand you may have a higher/lower than expected average, but it should be pushed down to 100 or up to 0.";
			die();
		}
		if ( $_REQUEST[gpa . $i] == 4 ) {
			switch ( $dividendpregpa ) {
				case ( '100' ): $dividend += 4.0; break;
				case ( '99' ): $dividend += 3.9; break;
				case ( '98' ): $dividend += 3.8; break;
				case ( '97' ): $dividend += 3.7; break;
				case ( '96' ): $dividend += 3.6; break;
				case ( '95' ): $dividend += 3.5; break;
				case ( '94' ): $dividend += 3.4; break;
				case ( '93' ): $dividend += 3.3; break;
				case ( '92' ): $dividend += 3.2; break;
				case ( '91' ): $dividend += 3.1; break;
				case ( '90' ): $dividend += 3.0; break;
				case ( '89' ): $dividend += 2.9; break;
				case ( '88' ): $dividend += 2.8; break;
				case ( '87' ): $dividend += 2.7; break;
				case ( '86' ): $dividend += 2.6; break;
				case ( '85' ): $dividend += 2.5; break;
				case ( '84' ): $dividend += 2.4; break;
				case ( '83' ): $dividend += 2.3; break;
				case ( '82' ): $dividend += 2.2; break;
				case ( '81' ): $dividend += 2.1; break;
				case ( '80' ): $dividend += 2.0; break;
				case ( '79' ): $dividend += 1.9; break;
				case ( '78' ): $dividend += 1.8; break;
				case ( '77' ): $dividend += 1.7; break;
				case ( '76' ): $dividend += 1.6; break;
				case ( '75' ): $dividend += 1.5; break;
				case ( '74' ): $dividend += 1.4; break;
				case ( '73' ): $dividend += 1.3; break;
				case ( '72' ): $dividend += 1.2; break;
				case ( '71' ): $dividend += 1.1; break;
				case ( '70' ): $dividend += 1.0; break;
				default: $dividend += 0.0; break;
			}
		}
		if ( $_REQUEST[gpa . $i] == 5 ) {
			switch ( $dividendpregpa ) {
				case ( '100' ): $dividend += 5.0; break;
				case ( '99' ): $dividend += 4.9; break;
				case ( '98' ): $dividend += 4.8; break;
				case ( '97' ): $dividend += 4.7; break;
				case ( '96' ): $dividend += 4.6; break;
				case ( '95' ): $dividend += 4.5; break;
				case ( '94' ): $dividend += 4.4; break;
				case ( '93' ): $dividend += 4.4; break;
				case ( '92' ): $dividend += 4.2; break;
				case ( '91' ): $dividend += 4.1; break;
				case ( '90' ): $dividend += 4.0; break;
				case ( '89' ): $dividend += 3.9; break;
				case ( '88' ): $dividend += 3.8; break;
				case ( '87' ): $dividend += 3.7; break;
				case ( '86' ): $dividend += 3.6; break;
				case ( '85' ): $dividend += 3.5; break;
				case ( '84' ): $dividend += 3.4; break;
				case ( '83' ): $dividend += 3.3; break;
				case ( '82' ): $dividend += 3.3; break;
				case ( '81' ): $dividend += 3.1; break;
				case ( '80' ): $dividend += 3.0; break;
				case ( '79' ): $dividend += 2.9; break;
				case ( '78' ): $dividend += 2.8; break;
				case ( '77' ): $dividend += 2.7; break;
				case ( '76' ): $dividend += 2.6; break;
				case ( '75' ): $dividend += 2.5; break;
				case ( '74' ): $dividend += 2.4; break;
				case ( '73' ): $dividend += 2.3; break;
				case ( '72' ): $dividend += 2.2; break;
				case ( '71' ): $dividend += 2.2; break;
				case ( '70' ): $dividend += 2.0; break;
				default: $dividend += 0.0; break;
			}
		}
		if ( $_REQUEST[gpa . $i] == 6 ) {
			switch ( $dividendpregpa ) {
				case ( '100' ): $dividend += 6.0; break;
				case ( '99' ): $dividend += 5.9; break;
				case ( '98' ): $dividend += 5.8; break;
				case ( '97' ): $dividend += 5.7; break;
				case ( '96' ): $dividend += 5.6; break;
				case ( '95' ): $dividend += 5.5; break;
				case ( '94' ): $dividend += 5.5; break;
				case ( '93' ): $dividend += 5.5; break;
				case ( '92' ): $dividend += 5.2; break;
				case ( '91' ): $dividend += 5.1; break;
				case ( '90' ): $dividend += 5.0; break;
				case ( '89' ): $dividend += 4.9; break;
				case ( '88' ): $dividend += 4.8; break;
				case ( '87' ): $dividend += 4.7; break;
				case ( '86' ): $dividend += 4.6; break;
				case ( '85' ): $dividend += 4.5; break;
				case ( '84' ): $dividend += 4.4; break;
				case ( '83' ): $dividend += 4.4; break;
				case ( '82' ): $dividend += 4.4; break;
				case ( '81' ): $dividend += 4.1; break;
				case ( '80' ): $dividend += 4.0; break;
				case ( '79' ): $dividend += 3.9; break;
				case ( '78' ): $dividend += 3.8; break;
				case ( '77' ): $dividend += 3.7; break;
				case ( '76' ): $dividend += 3.6; break;
				case ( '75' ): $dividend += 3.5; break;
				case ( '74' ): $dividend += 3.4; break;
				case ( '73' ): $dividend += 3.3; break;
				case ( '72' ): $dividend += 3.3; break;
				case ( '71' ): $dividend += 3.3; break;
				case ( '70' ): $dividend += 3.0; break;
				default: $dividend += 0.0; break;
			}
		}
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
  <input type="number" name="numofclasses" value="7" />
  <input type="hidden" name="init" value="true" />
  <button class="btn btn-primary" type="submit">Let's start.</button>
  </form>
<?php
}
?>
		</div>
	</body>
</html>

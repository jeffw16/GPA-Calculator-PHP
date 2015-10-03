<?php
/**
 * MyWikis
 * GPA Calculator (Weighted and Unweighted)
 * @author Jeffrey Wang
 * @contributors CJ Duffee
 * @license http://central.mywikis.com/wiki/MyWikis_License
*/
?>
<!DOCTYPE html>
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
	$perClassGPAs = array();
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
		if ( $gpaForClass < 0 ) {
			$gpaForClass=0;
		}
		$dividend += $gpaForClass;
		$perClassGPAs[$i] = $gpaForClass;
	}
	$quotient = $dividend / $divisor;
	// Unweighted
	$udividend = 0.0;
	$udivisor = $_REQUEST['numberofclasses'];
	$uperClassGPAs = array();
	$urperClassGPAs = array();
	for ( $i = 1; $i <= $_REQUEST['numberofclasses']; ++$i ) {
		$uaddMoreToGPA = ( $_REQUEST['gpamaxcore'] - 4.0 );
		$udividendpregpa = $_REQUEST[answers . $i];
		if ( $udividendpregpa > 100 ) {
			echo "GPA grades of greater than 100 do not count for GPA. We automatically set it to 100 for you.";
			$udividendpregpa = 100;
		}
		if ( $udividendpregpa < 0 ) {
			echo "GPA grades of lower than 0 do not count for GPA. We automatically set it to 0 for you.";
			$udividendpregpa = 0;
		}
		// Failing does not set GPA to zero! 61 would be 0.1
		$udividendpregpa -= 60; // 100 will be 40
		
		$ugpaForClass = $udividendpregpa / 10;
		$ugpaForClass += $uaddMoreToGPA;
		if ( $ugpaForClass < 0 ) {
			$ugpaForClass=0;
		}
		$udividend += $ugpaForClass;
		$uperClassGPAs[$i] = $ugpaForClass;
		if ( $ugpaPerClass > 3.0 ) {
			$urperClassGPAs[$i] = 4.0;
		} else if ( $ugpaPerClass > 2.0 ) {
			$urperClassGPAs[$i] = 3.0;
		} else if ( $ugpaPerClass > 1.0 ) {
			$urperClassGPAs[$i] = 2.0;
		} else if ( $ugpaPerClass > 0.0 ) {
			$urperClassGPAs[$i] = 1.0;
		}
	}
	$uquotient = $udividend / $udivisor;
	$urquotient = 0;
	if ( $uquotient > 3.0 ) {
		$urquotient = 4.0;
	} else if ( $uquotient > 2.0 ) {
		$urquotient = 3.0;
	} else if ( $uquotient > 1.0 ) {
		$urquotient = 2.0;
	} else if ( $uquotient > 0.0 ) {
		$urquotient = 1.0;
	}
	?>
	<h2>GPA Calculator</h2>
	<hr />
	<p>Your weighted GPA is <b><?php echo $quotient; ?></b>.</p>
	<p>Your unweighted GPA is <b><?php echo $uquotient; ?></b>.</p>
	<p>Your rounded unweighted GPA is <b><?php echo $urquotient; ?></b>.</p>
	<hr />
	<b>Grade analysis</b>
	<table>
		<tr>
			<th>#</th>
			<th>Grade in class</th>
			<th>Weighted GPA</th>
			<th>Unweighted GPA</th>
			<th>Rounded unweighted GPA</th>
		</tr>
		<?php
		for ( $i = 1; $i < = $_REQUEST['numberofclasses']; $i++ ) {
			echo "<tr>";
				echo "<td>" . $i . "</td>";
				echo "<td>" . $_REQUEST[gpa . $i] . "</td>";
				echo "<td>" . $perClassGPAs[$i] . "</td>";
				echo "<td>" . $uperClassGPAs[$i] . "</td>";
				echo "<td>" . $urperClassGPAs[$i] . "</td>";
			echo "</tr>";
		}
		?>
	</table>
	<?php
} elseif ( $_REQUEST['init'] ) {
	?>
	<h2>GPA Calculator</h2>
	<hr />
	<form method="post" action="gpacalculator.php">
	GPA maximum for Core/Regular/Academic classes: <input type="number" step="0.1" name="gpamaxcore" value="4.0" /><br />
	GPA maximum for Honors/Pre-AP&reg;: <input type="number" step="0.1" name="gpamaxhonors" value="5.0" /><br />
	GPA maximum for Advanced/AP&reg;: <input type="number" step="0.1" name="gpamaxap" value="6.0" /><br />
	<hr />
	<?php
	for ( $i = 1; $i <= $_REQUEST['numofclasses']; $i++ ) {
		?>
		Final grade in class <?php echo $i; ?>: <input type="tel" name="answers<?php echo $i; ?>" /> GPA scale: <select name="gpa<?php echo $i; ?>"><option value="core">Core/Regular/Academic</option><option value="honors">Honors/Pre-AP&reg;</option><option value="ap">Advanced/AP&reg;</option></select><br />
	<?php
	}
	?>
	<input type="hidden" name="submit" value="true" />
	<input type="hidden" name="numberofclasses" value="<?php echo $_REQUEST['numofclasses']; ?>" />
	<button class="btn btn-primary" type="submit">Calculate GPA!</button>
	</form>
	<hr />
	<p>We do not log your data.</p>
	<p>An example of GPA format: 95% in 4.0 class is "3.5", 98% in 5.0 class is "4.8", 97% in 6.0 class is "5.7".</p>
	<p>Failing in some places means your GPA in the class is ZERO. To get accurate GPAs, just put in a "0" for that class.</p>
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

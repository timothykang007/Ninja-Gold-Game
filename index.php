<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja Godl Game</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div container="container">
<?php	if(isset($_SESSION['error']))
		{
?>			<div class="error">
<?php			foreach($_SESSION['error'] as $name => $message)
				{
?>					<p><?= $message; ?></p>
<?php				} ?>
			</div>
<?php		}       
?>
			<div class="gold">
				<span>Your Gold:</span>
				<input type="text" name="your-gold" value="<?php echo isset($_SESSION['gold_count']) ? $_SESSION['gold_count'] : ' ' ?>" disabled>
			</div>

			<div class="restart">
				<form id="restart-form" action="process.php" method="post">
					<input type="hidden" name="action" value="restart_form" />
					<input type="submit" value="start over">
				</form>
			</div>

			<div class="clear"></div>

			<div class="building">
				<h4>Farm</h4>
				<p>(earns 10-20 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="farm" />
					<input type="submit" value"Find Gold!"/>
				</form>
			</div>

			<div class="building">
				<h4>Cave</h4>
				<p>(earns 5-10 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="cave" />
					<input type="submit" value="Find Gold!"/>
				</form>
			</div>

			<div class="building">
				<h4>HOuse</h4>
				<p>(earns 2-5 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="house" />
					<input type="submit" value="Find Gold!"/>
 				</form>
 			</div>

 			<div class="buidling">
 				<h4>Casino!</h4>
 				<p>(earns/takes 0 - 50 golds)</p>
 				<form action="process.php" method="post">
 					<input type="hidden" name="building" value="casino" />
 					<input type="submit" value="Find Gold!"/>
 				</form>
 			</div>

 			<div class="clear"></div>
 			<div class="log">
 				<span>Activities:</span>
 				<div id="log"><?php echo isset($_SESSION['activity']) ? implode('', array_reverse($_SESSION['activity'])) : ''; ?></div>
 			</div>

	</div>  
</body>
</html>
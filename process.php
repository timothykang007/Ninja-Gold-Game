<?php
session_start();

function get_gold($min, $max)
{
	return rand($min, $max);
}

if(isset($_POST['action']) && $_POST['action'] == 'restart_form')
{
	$_SESSION = array();
	header("Location: index.php");
}

if(!isset($_SESSION['gold_count'])) 
{
	$_SESSION['gold_count'] = 0;
}

if (isset($_POST['building']))
{
	$building = $_POST['building'];
	$gold_count = 0;
	$activity = array();
	$class = "green";

	switch ($building)
	{
		case 'farm':
			$gold_count = get_gold(10, 20);
		break;

		case 'cave':
			$gold_count = get_gold(5, 10);
		break;

		case 'house':
			$gold_count = get_gold(2, 5);
		break;

		case 'casino':
			$percent = rand(0,100);

			if ($percent <= 70)
			{
				$gold_count = get_gold(-50, -1);
				$class = "red";
				$message = "Ouch";
			}
			else 
			{
				$gold_count = get_gold(1, 50);
				$class = "green";
				$message = "Nice";
			}

		break;
	}

	if (isset($_SESSION['activity']))
		$activity = $_SESSION['activity'];
	else
		$activity = array();

	$_SESSION['gold_count'] = $_SESSION['gold_count'] + $gold_count;
	$_SESSION['activity'][] ='<span class="' . $class . '"> You entered a ' . $building . ' and earned ' . $gold_count . ' golds. ' . 
								(($building == 'casino') ? '...' . $message . ' .. ' : '') . '  (' . date('M d,Y h:ia') . ')</span><br>';

	header("Location: index.php");
	exit();
}

?>
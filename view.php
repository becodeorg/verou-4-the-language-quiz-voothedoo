<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>WordQuiz</title>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<!-- TODO: add a form for the user to play the game -->
	<header>
		<h1 class="title">Word<span>Quiz</span></h1>
		<h3 class="explanation">Translate the following word from <span>French</span> to <span>English</span></h3>
		<p class="word-to-translate">“<?= $randomWord ?? "" ?>”</p>
	</header>
	<main>
		<form action="" method="POST">
			<input type="text" name="solution" id="solution" placeholder="">
			<button type="submit" id="submit-button">Submit</button>
		</form>
		<section>
			<p class="feedback"><?= $feedBack ?? "" ?></p>
			<div class="score"> 
				<p class="total-score">Total Score: <strong></strong></p>
				<div class="answers">
					<p class="correct">Correct answers: <strong></strong></p>
					<p class="wrong">Wrong answers: <strong></strong></p>
				</div>
			</div>
			<button class="reset-button">Reset</button>
		</section>
	</main>
</body>
</html>
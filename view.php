<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>WordQuiz</title>
</head>
<body>
	<!-- TODO: add a form for the user to play the game -->
	<header>
		<h1 class="title">WordQuiz</h1>
		<h3 class="explanation">Translate the following word from French to English:</h3>
		<p class="word-to-translate"><<< word here >>></p>
	</header>
	<main>
		<form action="" method="POST">
			<label for="solution">Your solution is: </label>
			<input type="text" name="solution" id="solution">
			<button type="submit" id="submit-button">Subbmit</button>
		</form>
		<section>
			<div class="score">
				<p class="total-score">Total Score: <strong>'score here'</strong></p>
				<div class="answers">
					<p>Correct answers: <strong>00</strong></p>
					<p>Wrong answers: <strong>00</strong></p>
				</div>
			</div>
			<button class="reset-button">Reset Game</button>
		</section>
	</main>
</body>
</html>
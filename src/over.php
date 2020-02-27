<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<title>JOTH - wie zijn we</title>
  </head>
<body class="forcemiddle body">
	<?php require_once 'header.php'; ?>
	<main class="main">
		<ul class="section__info">
			<li class="section__item section__info--title">
				<h1>Over JOTH</h1>
			</li>
			<li class="section__item">
				<p class="section__item__paragraph">In een JOTH-huis kan je als jongere van 12 tot en met 25 jaar gewoon binnen en buiten lopen en allerlei leuke activiteiten doen. Het is een veilige plek waar je ook een luisterend oor vindt en beroep kan doen op professionele therapeutische hulp, gratis en zonder een label opgeplakt te krijgen.</p>
				<!--<button class="btn btn__light">Het onstaan van JOTH</button>-->
			</li>
			<li class="section__item">
				<p class="section__item__paragraph">Wij zijn een groep vrijwilligers die graag klaar staan voor jou. Er is steeds een jongerenmedewerker aanwezig in het huis die tijd zal maken voor een babbel. Wens je liever een één op één gesprek? Op deze pagina kan je zien bij wie je hiervoor terecht kunt.</p>
			</li>
		</ul>
	</main>
	<section>
		<ul class="section__container">
			<li class="section__item section__item--worker">
				<div class="section__image section__image--left">
					<?php require 'svg1.php'; ?>
				</div>
				<div class="section__text section__text--left">
					<h2>Naam vrijwilliger</h2>
					<p>Functie vrijwilliger</p>
				</div>
			</li>
			<li class="section__item section__item--worker">
				<div class="section__image section__image--right">
					<?php require 'svg4.php'; ?>
				</div>
				<div class="section__text section__text--right">
					<h2>Naam vrijwilliger</h2>
					<p>Functie vrijwilliger</p>
				</div>
			</li>
			<li class="section__item section__item--worker">
				<div class="section__image section__image--left">
					<?php require 'svg1.php'; ?>
				</div>
				<div class="section__text section__text--left">
					<h2>Naam vrijwilliger</h2>
					<p>Functie vrijwilliger</p>
				</div>
			</li>
		</ul>
	</section>

	<?php require_once 'footer.php'; ?>
	<script src="./js/app.js"></script>
</body>
</html>
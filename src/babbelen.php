<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<title>JOTH - babbelen</title>
  </head>
<body>
	<?php require_once 'header.php'; ?>
	<main class="main">
		<ul class="section__info">
			<li class="section__info--title">
				<h1>Babbelen</h1>
			</li>
			<li>
				<h2>Kom langs in ons JOTH-juist</h2>
				<p>
					Even ontsnappen aan de drukte thuis? De jongerenmedewerkers van JOTH staan voor je klaar. Kom langs in ons JOTH-huis in Zandhoven en ontspan je even in onze gezellige zithoek, aan de kickertafel of aan de piano. 
					Eerder nood aan een babbel? Maak al online een afspraak voor een een-op-eengesprek.
				</p>
				<button class="btn btn__light">Maak een afspraak</button>
			</li>
			<li>
				<h2>Of praat met iemand van AWEL</h2>
				<p>
					Wanneer je Awel contacteert, zal een vrijwilliger naar jou luisteren. Neem jouw tijd en vertel alles wat je wil, de beantwoorder zal je ondersteunen. Awel werkt volledig anoniem. Dat betekent dat alleen jij en Awel weten dat jij met ons contact opneemt. Bovendien is een gesprek met Awel helemaal gratis! Bel, mail of chat dus met iemand als je met iets zit.
				</p>
				<button class="btn btn__light">Babbelen via AWEL</button>
			</li>
		</ul>
	</main>
	<section>
		<h2>Afspraak maken</h2>
		<ul>
			<p>Vierselbaan 13</p>
			<p>2240 zandhoven</p>
			<p>0473 97 69 66</p>
			<a href="mailto:info@joth.be">info@joth.be</a>
		</ul>
		<form action="post" class="form">
			<input type="text" placeholder="Voornaam en familienaam" class="form__input">
			<input type="date" placeholder="Datum en uur" class="form__input">
			<input type="email" placeholder="Email" class="form__input">
			<input type="tel" placeholder="Telefoonnummer" class="form__input">
			<div class="form__item form__item--textfield">
				<textarea placeholder="Boodschap" class="form__input">
			</div>
			<input type="submit" value="Verzend" class="btn btn__dark">
			</form>
	</section>
	<section>
		<h2>Hulp</h2>
		<p>Van Awel tot de Zelfmoordlijn. Hier vind je alfabetisch gerangschikt gerichte hulp.</p>
	</section>
	<?php require_once 'footer.php'; ?>
</body>
</html>
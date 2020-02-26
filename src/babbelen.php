<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<title>JOTH - babbelen</title>
  </head>
<body class="forcemiddle">
	<?php require_once 'header.php'; ?>
	<main class="main">
		<ul class="section__info">
			<li class="section__info--title">
				<h1>Babbelen</h1>
			</li>
			<li class="section__item">
				<h2>Kom langs in ons JOTH-juist</h2>
				<p class="section__item__paragraph">
					Even ontsnappen aan de drukte thuis? De jongerenmedewerkers van JOTH staan voor je klaar. Kom langs in ons JOTH-huis in Zandhoven en ontspan je even in onze gezellige zithoek, aan de kickertafel of aan de piano. 
					Eerder nood aan een babbel? Maak al online een afspraak voor een een-op-eengesprek.
				</p>
				<button class="btn btn__section btn__light">Maak een afspraak</button>
			</li>
			<li class="section__item">
				<h2>Of praat met iemand van AWEL</h2>
				<p class="section__item__paragraph">
					Wanneer je Awel contacteert, zal een vrijwilliger naar jou luisteren. Neem jouw tijd en vertel alles wat je wil, de beantwoorder zal je ondersteunen. Awel werkt volledig anoniem. Dat betekent dat alleen jij en Awel weten dat jij met ons contact opneemt. Bovendien is een gesprek met Awel helemaal gratis! Bel, mail of chat dus met iemand als je met iets zit.
				</p>
				<button class="btn btn__section btn__light">Babbelen via AWEL</button>
			</li>
		</ul>
	</main>
	<section>
		<h2>Afspraak maken</h2>
		<ul>
			<li>
				<p>Vierselbaan 13</p>
			</li>
			<li>
				<p>2240 zandhoven</p>
			</li>
			<li>
				<p>0473 97 69 66</p>
			</li>
			<li>
				<a href="mailto:info@joth.be" class="link">info@joth.be</a>
			</li>
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
		<ul class="help">
			<li class="help__item">
				<p class="help__item--title">awel</p>
				<p>
					Chat, mail of bel <span class="help__item--refence">Awel</span>.
				</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">clb</p>
				<p>
					Contacteer het <span class="help__item--refence">Centrum voor leerlingenbegeleiding (CLB) van je school</span>.
				</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">Huisarts</p>
				<p>Zoek en vind een <span class="help__item--refence">dokter</span> in jouw buurt.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">jac</p>
				<p>Ga te rade bij het <span class="help__item--refence">Jongerenonthaal(JAC)</span>.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">Kinderrechtencommissariaat</p>
				<p>Zijn je rechten geschonden? Contacteer de <span class="help__item--refence">Klachtenlijn van het Kinderrechtencommissariaat</span>.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">overkop</p>
				<p>Voor info en hulp kan je terecht op de website van <span class="help__item--refence">OverKop</span>.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">tele-onthaal</p>
				<p>Praat bij <span class="help__item--refence">Tele-Onthaal</span> over wat jou bezighoudt.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">tejo</p>
				<p>Vraag een gesprek aan bij een gratis therapeut van <span class="help__item--refence">TEJO</span>.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">verwonderd</p>
				<p>Vlaamse Vereniging ter preventie van zelfverwonding.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">watwat</p>
				<p>No nonsense info voor jongeren over allerhande thema’s op de website van <span>Watwat</span>.</p>
			</li>
			<li class="help__item">
				<p class="help__item--title">zelfmoordlijn</p>
				<p>
					Bel naar het gratis noodnummer 1813 voor een anoniem gesprek, elke dag, 24 op 24 uur.
					Chat anoniem via de chatknop op <span class="help__item--refence">www.zelfmoord1813.be</span>, elke dag, van 19 tot 21.30 uur.
					Mail anoniem via de mailknop op <span class="help__item--refence">www.zelfmoord1813.be</span>, elke dag, 24 op 24 uur
					(Je krijgt binnen 5 dagen antwoord).
				</p>
			</li>
		</ul>
	</section>
	<?php require_once 'footer.php'; ?>
	<script src="./js/app.js"></script>
</body>
</html>
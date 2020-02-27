<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<title>JOTH - steun ons</title>
  </head>
<body class="forcemiddle body">
	<?php require_once 'header.php'; ?>
	<main class="main">
		<ul class="section__info">
			<li class="section__info--title">
				<h1>Hoe kan je ons steunen?</h1>
			</li>
			<li class="section__item">
				<h2>Doe een donatie</h2>
				<p class="section__item__paragraph">
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non commodi adipisci illum et rem temporibus minima blanditiis in at cum nesciunt quos, animi, architecto nemo esse, doloribus soluta quasi aut?
				</p>
				<button class="btn btn__section btn__light">Doe een donatie</button>
			</li>
			<li class="section__item">
				<h2>Wordt vrijwilliger!</h2>
				<p class="section__item__paragraph">
					Heb je affiniteit en/of ervaring in het werken met jongeren? Wil je graag als vrijwilliger een steentje bijdragen? Neem gerust contact op met/via ….
					Iedereen is welkom!
				</p>
				<button class=" btn btn__section btn__light">Wordt vrijwilliger</button>
			</li>
		</ul>
	</main>
	<section>
		<h2>Formulier om te doneren</h2>
		<p>
			Ook een warm hart voor ons jongerenproject? Steun vzw JOTH dan door een leuke actie te organiseren of door een vrije gift te storten op ons rekeningnummer BE65 9733 7974 1896. Door jouw steun kunnen wij jongeren blijven ondersteunen.
		</p>
		<p>
			Fiscaal attest nodig? Vul dan onderstaand formulier in.
		</p>
		<form action="post" class="form">
			<div class="form__item">
				<input type="text" placecholder="Voornaam" name="firstname" class="form__input" required>
				<input type="email" placeholder="Email" name="email" class="form__input" required>
				<input type="text" placeholder="Bedrag" name="amountOfMoney" class="form__input" required>
			</div>
			<div class="form__item">
				<input type="text" placeholder="Familienaam" name="lastname" class="form__input" required>
				<input type="text" placeholder="Naam bedrijf" name="nameOfCompany" class="form__input" required>
				<input type="date" placeholder="Datum van overschrijving" name="dateOfTransfer" class="form__input form__input--date" required>
			</div>
			<div class="form__item">
				<input type="submit" value="Verzend" class="btn btn__form btn__light">
			</div>
		</form>
	</section>
	<section>
		<h2>Wordt een vrijwilliger</h2>
		<p>
			uitleg hoe men vrijwilliger kan worden.
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque imperdiet semper. Donec mollis bibendum neque sit amet tempus. Nam hendrerit iaculis lacus. Donec cursus vitae metus suscipit sollicitudin. Curabitur eu nisl dapibus, finibus nulla at, aliquet diam. Aliquam id sodales felis. Cras id aliquam mi, posuere blandit orci. Proin lacinia viverra libero.
		</p>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque imperdiet semper. Donec mollis bibendum neque sit amet tempus. Nam hendrerit iaculis lacus. Donec cursus vitae metus suscipit sollicitudin. Curabitur eu nisl dapibus, finibus nulla at, aliquet diam. Aliquam id sodales felis. Cras id aliquam mi, posuere blandit orci. Proin lacinia viverra libero.
		</p>
	</section>
	<?php require_once 'footer.php'; ?>
	<script src="./js/app.js"></script>
</body>
</html>
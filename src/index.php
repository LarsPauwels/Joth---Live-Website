<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title>JOTH</title>
  </head>
  <body class="forcemiddle body">
   <?php require_once 'header.php'; ?>
    <main class="home__main main">
      <h1>Als jongere heb je recht op de juiste hulpverlening wanneer je er nood aan hebt.</h1>
      <div class="main__svg">
        <?php require 'svg2.php'; ?>
      </div>
    </main>
    <section class="home__about">
      <ul>
        <li class="section__item">
          <h2>Over joth</h2>
        </li>
        <li class="section__item">
          <p class="section__item__paragraph">
            In het JOTH-huis kan je als jongere van 12 tot en met 25 jaar gewoon binnen en buiten lopen en allerlei leuke activiteiten doen. Het is een veilige plek waar je ook een luisterend oor vindt en beroep kan doen op professionele therapeutische hulp, gratis en zonder een label opgeplakt te krijgen.
          </p>
          <button class="btn btn__section btn__light">Ontmoet de vrijwilligers</button>
        </li>
      </ul>
      <div class="section__svg section__svg--right">
        <?php require 'svgRight.php'; ?>
      </div>
    </section>
    <section class="home__contact">
      <ul class="contact__list">
        <li class="section__item">
          <h2>Met open armen</h2>
        </li>
        <li class="section__item">
          <p class="section__item__paragraph">
            Even ontsnappen aan de drukte thuis? De jongerenmedewerkers van JOTH staan voor je klaar. Kom langs in ons JOTH-huis in Zandhoven en ontspan je even in onze gezellige zithoek, aan de kickertafel of aan de piano. 
            Eerder nood aan een babbel? Maak al online een afspraak voor een een-op-eengesprek.
          </p>
          <button class="btn btn__section btn__light">Maak een afspraak</button>
        </li>
      </ul>
      <div class="section__svg section__svg--left">
        <?php require 'svg4.php'; ?>
      </div>
    </section>
    <?php require_once 'footer.php'; ?>
  </body>
  <script src="./js/app.js"></script>
</html>

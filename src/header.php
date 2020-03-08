<header class="header__container">
	<a class="nav__item nav__item--logo" href="index.php">
			<img class="nav__item--image" src="assets/logo.svg"></img>
	</a>
	<!--Hamburger menu-->
	<svg>
	<defs>
		<filter id="joth">
		<feGaussianBlur in="SourceGraphic" stdDeviation="2.2" result="blur" />
		<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="gooeyness" />
		<feComposite in="SourceGraphic" in2="joth" operator="atop" />
		</filter>
	</defs>
	</svg>
	<div class="nav__btn nav__btn__container nav__btn__item">
		<svg class="burger" version="1.1" height="100" width="100" viewBox="0 0 100 100">
		<path class="line line1" d="M 50,35 H 30" />
		<path class="line line2" d="M 50,35 H 70" />
		<path class="line line3" d="M 50,50 H 30" />
		<path class="line line4" d="M 50,50 H 70" />
		<path class="line line5" d="M 50,65 H 30" />
		<path class="line line6" d="M 50,65 H 70" />
		</svg>
		<svg class="x" version="1.1" height="100" width="100" viewBox="0 0 100 100">
		<path class="line" d="M 34,32 L 66,68" />
		<path class="line" d="M 66,32 L 34,68" />
		</svg>
	</div>
	<!--Text navigation-->
	<nav class="nav__container">
		<a class="nav__item" href="over.php">wie zijn wij?</a>
		<a class="nav__item" href="activiteiten.php">activiteiten</a>
		<a class="nav__item" href="steun_ons.php">steun ons</a>
		<a class="nav__item" href="vragen.php">vragen</a>
		<a class="nav__item nav__item--btn btn btn__dark" href="babbelen.php">babbelen?</a>
	</nav>
</header>
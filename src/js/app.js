let btnNavigation = document.querySelector(".nav__btn");
let navigationContainer = document.querySelector(".nav__container");
let btnBabbelen = document.querySelector(".nav__item--btn");

let main = document.getElementsByTagName("main");
let section = document.getElementsByTagName("section");

let isNav = false;

let footerContainer = document.querySelector(".footer__container");
let footerTitle = document.querySelector(".footer__title");
let footerItemsRight = document.querySelector(".footer__item__right");
let footerSocials = document.querySelector(".footer__socials");
let footerCircle = document.querySelector(".footer__extra__circle");

let bodyNav = document.querySelector("body");

const mq = window.matchMedia("(min-width: 900px)");
mq.addListener(handleMediaQueries);
handleMediaQueries(mq);

//Index
let i;
let j;

btnNavigation.onclick = () => {
  navigationContainer.classList.toggle("nav__container--active");

  //Special button babbelen in navigation
  btnBabbelen.classList.toggle("btn");
  btnBabbelen.classList.toggle("btn__dark");

  footerContainer.classList.toggle("footer__container--active");
  footerTitle.classList.toggle("footer__title--active");
  footerItemsRight.classList.toggle("footer__item__right--active");
  footerSocials.classList.toggle("footer__socials--active");
  footerCircle.classList.toggle("footer__extra__circle--active");

  bodyNav.classList.toggle("body--nav");

  toggleNav();
  changeIcon();
};

function handleMediaQueries(mediaQuery) {
  if (mediaQuery.matches) {
    navigationContainer.classList.remove("nav__container--active");

    btnBabbelen.classList.add("btn");
    btnBabbelen.classList.add("btn__dark");

    footerContainer.classList.remove("footer__container--active");
    footerTitle.classList.remove("footer__title--active");
    footerItemsRight.classList.remove("footer__item__right--active");
    footerSocials.classList.remove("footer__socials--active");
    footerCircle.classList.remove("footer__extra__circle--active");

    btnNavigation.innerHTML = "☰";

    bodyNav.classList.remove("body--nav");

    closeNav();
  }
}

function changeIcon() {
  if (btnNavigation.innerHTML === "☰") {
    btnNavigation.innerHTML = "x";
  } else {
    btnNavigation.innerHTML = "☰";
  }
}

function toggleNav() {
  isNav ? closeNav() : openNav();
}

function openNav() {
  for (i = 0; i < main.length; i++) {
    main[i].style.display = "none";
  }

  for (j = 0; j < section.length; j++) {
    section[j].style.display = "none";
  }

  isNav = true;
}

function closeNav() {
  for (i = 0; i < main.length; i++) {
    main[i].style.display = "block";
  }

  for (j = 0; j < section.length; j++) {
    section[j].style.display = "block";
  }

  isNav = false;
}

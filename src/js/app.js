let btnNavigation = document.querySelector(".nav__btn");
let navigationContainer = document.querySelector(".nav__container");
let btnBabbelen = document.querySelector(".nav__item--btn");

let main = document.getElementsByTagName("main");
let section = document.getElementsByTagName("section");

let isNav = false;

//Index
let i;
let j;

btnNavigation.onclick = () => {
  navigationContainer.classList.toggle("nav__container--active");

  //Special button babbelen in navigation
  btnBabbelen.classList.toggle("btn");
  btnBabbelen.classList.toggle("btn__dark");

  toggleNav();
  changeIcon();
};

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
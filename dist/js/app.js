"use strict";var i,j,btnNavigation=document.querySelector(".nav__btn"),navigationContainer=document.querySelector(".nav__container"),btnBabbelen=document.querySelector(".nav__item--btn"),main=document.getElementsByTagName("main"),section=document.getElementsByTagName("section"),isNav=!1,footerContainer=document.querySelector(".footer__container"),footerTitle=document.querySelector(".footer__title"),footerItemsRight=document.querySelector(".footer__item--right"),footerSocials=document.querySelector(".footer__socials");function changeIcon(){"☰"===btnNavigation.innerHTML?btnNavigation.innerHTML="x":btnNavigation.innerHTML="☰"}function toggleNav(){isNav?closeNav():openNav()}function openNav(){for(i=0;i<main.length;i++)main[i].style.display="none";for(j=0;j<section.length;j++)section[j].style.display="none";isNav=!0}function closeNav(){for(i=0;i<main.length;i++)main[i].style.display="block";for(j=0;j<section.length;j++)section[j].style.display="block";isNav=!1}btnNavigation.onclick=function(){navigationContainer.classList.toggle("nav__container--active"),btnBabbelen.classList.toggle("btn"),btnBabbelen.classList.toggle("btn__dark"),footerContainer.classList.toggle("footer__container--active"),footerTitle.classList.toggle("footer__title--active"),footerItemsRight.classList.toggle("footer__item--right-active"),footerSocials.classList.toggle("footer__socials--active"),toggleNav(),changeIcon()};
"use strict";var i,j,btnNavigation=document.querySelector(".nav__btn"),navigationContainer=document.querySelector(".nav__container"),btnBabbelen=document.querySelector(".nav__item--btn"),main=document.getElementsByTagName("main"),section=document.getElementsByTagName("section"),isNav=!1,footerContainer=document.querySelector(".footer__container"),footerTitle=document.querySelector(".footer__title"),footerItemsRight=document.querySelector(".footer__item__right"),footerSocials=document.querySelector(".footer__socials"),footerCircle=document.querySelector(".footer__extra__circle"),bodyNav=document.querySelector("body"),mq=window.matchMedia("(min-width: 900px)");function handleMediaQueries(e){e.matches&&(navigationContainer.classList.remove("nav__container--active"),btnBabbelen.classList.add("btn"),btnBabbelen.classList.add("btn__dark"),footerContainer.classList.remove("footer__container--active"),footerTitle.classList.remove("footer__title--active"),footerItemsRight.classList.remove("footer__item__right--active"),footerSocials.classList.remove("footer__socials--active"),footerCircle.classList.remove("footer__extra__circle--active"),bodyNav.classList.remove("body--nav"),closeNav())}function toggleNav(){isNav?closeNav():openNav()}function openNav(){for(i=0;i<main.length;i++)main[i].style.display="none";for(j=0;j<section.length;j++)section[j].style.display="none";isNav=!0}function closeNav(){for(i=0;i<main.length;i++)main[i].style.display="block";for(j=0;j<section.length;j++)section[j].style.display="block";isNav=!1}mq.addListener(handleMediaQueries),handleMediaQueries(mq),btnNavigation.onclick=function(){btnNavigation.classList.toggle("active"),navigationContainer.classList.toggle("nav__container--active"),btnBabbelen.classList.toggle("btn"),btnBabbelen.classList.toggle("btn__dark"),footerContainer.classList.toggle("footer__container--active"),footerTitle.classList.toggle("footer__title--active"),footerItemsRight.classList.toggle("footer__item__right--active"),footerSocials.classList.toggle("footer__socials--active"),footerCircle.classList.toggle("footer__extra__circle--active"),bodyNav.classList.toggle("body--nav"),toggleNav()};
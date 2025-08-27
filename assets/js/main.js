/*=============== SHOW MENU ===============*/
const showMenu = (toogleId, navId) => {
  const toggle = document.getElementById(toogleId),
    nav = document.getElementById(navId);

  toggle.addEventListener("click", () => {
    //add show menu class to nav menu
    nav.classList.toggle("show-menu");
    //add show and hide menu icon
    toggle.classList.toggle("show-icon");
  });
};

showMenu("nav-toggle", "nav-menu");

/*=============== SWIPER HOME ===============*/
const swiperHome = new Swiper(".home__swiper", {
  loop: true,
  slidesPerView: "auto",

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
});
/*=============== CHANGE BACKGROUND HEADER ===============*/
// const bgHeader = () => {
//   const header = document.getElementById("header");

//   this.scrollY >= 50 ? header.classList.add("bg-header") : header.classList.remove("bg-header");
// };
// window.addEventListener("scroll", bgHeader);

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
  distance: "60px",
  duration: 2800,
  // reset: true,
});

sr.reveal(
  `.home__data, .home__swiper, .banner__container, .info__container, .form__container, 
.tik__container, .sisfo__container, .tifo__container, 
.footer__logo, .footer__data`,
  {
    origin: "top",
    interval: 100,
  }
);

sr.reveal(`.about__data `, {
  origin: "left",
  interval: 100,
});

sr.reveal(`.about__img-overlay`, {
  origin: "right",
  interval: 100,
});

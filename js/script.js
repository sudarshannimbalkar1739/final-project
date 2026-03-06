/* =========header hiding========= */
let lastScrollY = window.scrollY;
const header = document.querySelector("header");

window.addEventListener("scroll", () => {
  const currentScrollY = window.scrollY;
  if (currentScrollY > lastScrollY && currentScrollY > 10) {
    // scrolling down
    header.classList.add("hide");
  } else {
    // scrolling up
    header.classList.remove("hide");
  }
  lastScrollY = currentScrollY;
});

/* ======== Mid animated TEXT ========= */
const slogans = [   //add slogans here//
  "hello foodies",
  "Delicious moments served fresh",
  "Taste the future of food",
  "Where flavor meets magic",
  "Crafted with love & spice"
];

let sIndex = 0;
let cIndex = 0;
let deleting = false;

function typeLoop() {
  const typingEl = document.getElementById("typing");
  const current = slogans[sIndex];

  if (!deleting) {
    typingEl.textContent = current.substring(0, cIndex++);
    if (cIndex > current.length) {
      deleting = true;
      setTimeout(typeLoop, 2000);
      return;
    }
  } else {
    typingEl.textContent = current.substring(0, cIndex--);
    if (cIndex === 0) {
      deleting = false;
      sIndex = (sIndex + 1) % slogans.length;
    }
  }
  setTimeout(typeLoop, deleting ? 40 : 80);
}
typeLoop();

/* ======= HERO text animation ===== */
const slides = document.querySelectorAll("[data-hero-slider-item]");
let currentSlide = 0;

function changeSlide() {
  slides.forEach(slide => slide.classList.remove("active"));
  slides[currentSlide].classList.add("active");
  currentSlide = (currentSlide + 1) % slides.length;
}



changeSlide();
setInterval(changeSlide, 7000);



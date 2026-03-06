
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

const slogans = [
    "hello sir ",
    "what's todays dishes",
    "Your Data, Your Rules",
    "Control Your Chaos",
    "Unlock Your Power",
    "Behind the Scenes Brilliance",
    "Your Digital Swiss Army Knife."
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


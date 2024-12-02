let portrait = window.matchMedia("(orientation: portrait)");
portrait.addEventListener("change", updateOrientation);
let pOrientation;
updateOrientation();

const slides = document.querySelectorAll("#slider .slide");
const fnames = document.querySelectorAll(".fname");
const ftexts = document.querySelectorAll(".ftext");
const fdescs = document.querySelectorAll(".fdesc");
const fdates = document.querySelectorAll(".fdate");
const scount = document.getElementById("scount");
const row1 = document.querySelector(".row1");
const row2 = document.querySelector(".row2");
const row3 = document.querySelector(".row3");
const row4 = document.querySelector(".row4");

let current = 0;
let slideCount = slides.length;

// Initially hide all slides and show only the first one
// slides.forEach((slide) => (slide.style.opacity = "0"));
slides[current].style.opacity = "1";

let showpic = setInterval(function () {
  // Hide the current slide
  slides[current].style.opacity = "0";
  // Hide text info
  // fnames[current].style.display = "none";
  // ftexts[current].style.display = "none";
  // fdescs[current].style.display = "none";
  // fdates[current].style.display = "none";

  // Calculate the next slide's index
  let next = (current + 1) % slideCount;
  // while (slides[next].className.includes(pOrientation)) {
  current = next;
  // next = (current + 1) % slideCount;
  // }

  // Show the next slide
  slides[next].style.opacity = "1";

  // Add text information
  // fnames[next].style.display = "block";
  // ftexts[next].style.display = "block";
  // fdescs[next].style.display = "block";
  // fdates[next].style.display = "block";
  scount.innerHTML = next + 1 + "/" + slideCount;
  //infobox.innerHTML = next + 1 + "/" + slideCount;
  row1.innerHTML = fnames[next].innerHTML;
  row2.innerHTML = ftexts[next].innerHTML;
  row3.innerText = fdescs[next].innerHTML;
  row4.innerText = fdates[next].innerHTML;

  // Update the current slide index
  current = next;
}, 7000); // Change image every 7 seconds

function updateOrientation() {
  const orientation = getOrientation();
  console.log("Current orientation is:", orientation);
}

window.addEventListener("resize", updateOrientation);

// Initial check
updateOrientation();

function getOrientation() {
  return window.innerHeight > window.innerWidth ? "portrait" : "landscape";
}

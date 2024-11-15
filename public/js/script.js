let currentIndex = 0;
let slideInterval;

function showSlide(index) {
  const slides = document.querySelectorAll(".carousel-slide");
  const dots = document.querySelectorAll(".dot");
  const totalSlides = slides.length;

  // Adjust the index if it goes out of bounds
  currentIndex = (index + totalSlides) % totalSlides;

  // Move the carousel to show the selected slide
  const offset = -currentIndex * 100;
  document.querySelector(
    ".carousel-container"
  ).style.transform = `translateX(${offset}%)`;

  // Update the active dot
  dots.forEach((dot) => dot.classList.remove("active"));
  dots[currentIndex].classList.add("active");
}

function currentSlide(index) {
  // Clear interval to prevent conflicts when manually navigating
  clearInterval(slideInterval);
  showSlide(index);

  // Restart automatic sliding
  startSlideInterval();
}

function startSlideInterval() {
  slideInterval = setInterval(() => {
    showSlide(currentIndex + 1);
  }, 5000); // Change slide every 5 seconds
}

// Initialize the slider
document.addEventListener("DOMContentLoaded", () => {
  showSlide(currentIndex); // Show the first slide
  startSlideInterval(); // Start automatic sliding
});

function toggleMenu() {
  const navLinks = document.querySelector(".nav-links");
  navLinks.classList.toggle("open");
}

document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".nav-links a");
  navLinks.forEach((link) => {
    link.addEventListener("click", toggleMenu);
  });
});

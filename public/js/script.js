// Mobile Menu Toggle
const mobileMenuBtn = document.querySelector(".mobile-menu-btn");
const nav = document.querySelector("nav ul");

mobileMenuBtn.addEventListener("click", () => {
  nav.style.display = nav.style.display === "flex" ? "none" : "flex";
});

// Handle window resize
window.addEventListener("resize", () => {
  if (window.innerWidth > 768) {
    nav.style.display = "flex";
  } else {
    nav.style.display = "none";
  }
});

// Testimonial Slider
const testimonials = document.querySelectorAll(".testimonial");
const dots = document.querySelectorAll(".slider-dot");
let currentSlide = 0;

function showSlide(index) {
  testimonials.forEach((testimonial) => testimonial.classList.remove("active"));
  dots.forEach((dot) => dot.classList.remove("active"));

  testimonials[index].classList.add("active");
  dots[index].classList.add("active");
  currentSlide = index;
}

dots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
    showSlide(index);
  });
});

// Auto slide change
setInterval(() => {
  currentSlide = (currentSlide + 1) % testimonials.length;
  showSlide(currentSlide);
}, 5000);

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const targetId = this.getAttribute("href");
    if (targetId === "#") return;

    const targetElement = document.querySelector(targetId);
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 70,
        behavior: "smooth",
      });

      // Close mobile menu if open
      if (window.innerWidth <= 768) {
        nav.style.display = "none";
      }
    }
  });
});

// Form submission
const contactForm = document.getElementById("messageForm");
contactForm.addEventListener("submit", function (e) {
  e.preventDefault();

  // Get form values
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const subject = document.getElementById("subject").value;

  // Here you would typically send the form data to a server
  // For this example, we'll just show an alert
  alert(
    `Terima kasih, ${name}! Pesan Anda dengan subjek "${subject}" telah diterima. Kami akan menghubungi Anda melalui email di ${email} segera.`
  );

  // Reset form
  contactForm.reset();
});

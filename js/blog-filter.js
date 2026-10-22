document.addEventListener("DOMContentLoaded", function () {
  // Mobile Nav Toggle
  const mobileNavToggle = document.getElementById("mobileNavToggle");
  const navLinks = document.getElementById("navLinks");
  if (mobileNavToggle && navLinks) {
    mobileNavToggle.addEventListener("click", function () {
      navLinks.classList.toggle("is-open");
    });
  }

  // Category Filtering
  const filterButtons = document.querySelectorAll(".filter-btn");
  const posts = document.querySelectorAll(".blog-post-card");

  if (filterButtons.length > 0 && posts.length > 0) {
    filterButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        // Toggle active button class
        filterButtons.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        const selectedCategory = btn.getAttribute("data-category");

        posts.forEach((post) => {
          const postCategory = post.getAttribute("data-category");
          if (selectedCategory === "all" || postCategory === selectedCategory) {
            post.style.display = "flex";
            post.style.animation = "fadeIn 0.35s ease forwards";
          } else {
            post.style.display = "none";
          }
        });
      });
    });
  }
});
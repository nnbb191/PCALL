<?php 
include "connect.php";
include "header.php";
include "modal.php";
?>
    <style>
      .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s ease, transform 1s ease;
      }

      .fade-in.show {
        opacity: 1;
        transform: translateY(0);
      }

      .hero-section {
        background: url("../images/About_us.jpg") no-repeat center center/cover;
        color: white;
        padding: 100px 0;
        text-align: center;
        margin-bottom: 50px;
        width: 100%;
        display: block;
      }

      .section {
        padding: 60px 15px;
      }

      .team-member img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 15px;
      }

      .team-member {
        text-align: center;
      }

      .content-section {
        padding: 30px;
        margin-bottom: 50px;
      }
    </style>
    
  <div class="container-fluid">
    <!-- Hero Section -->
    <div class="hero-section fade-in">
      <h1>About Us</h1>
      <p>Learn more about our mission, vision, and the team behind PCALL.</p>
    </div>

    <!-- About Section -->
    <div class="container section fade-in">
      <h2 class="text-center">Who We Are</h2>
      <p class="text-center">
        At PCALL, we strive to provide top-quality gaming PCs, laptops, and
        accessories to meet the needs of tech enthusiasts worldwide. With a
        commitment to performance and innovation, we aim to be your one-stop
        destination for all things tech.
      </p>
    </div>

    <!-- Mission and Vision -->
    <div class="container section fade-in">
      <div class="row">
        <div class="col-md-6">
          <h3>Our Mission</h3>
          <p>
            To empower gamers, creators, and professionals with cutting-edge
            technology that elevates their experience and productivity. We
            believe in creating value through exceptional customer service and
            reliable products.
          </p>
        </div>
        <div class="col-md-6">
          <h3>Our Vision</h3>
          <p>
            To become a global leader in providing high-performance computing
            solutions and building a community of tech-savvy individuals who
            trust us for their technology needs.
          </p>
        </div>
      </div>
    </div>

    <!-- Team Section -->
    <div class="container section fade-in">
      <h2 class="text-center mb-5">Meet Our Team</h2>
      <div class="row justify-content-center">
        <div class="col-md-4 col-lg-3 team-member">
          <img src="https://via.placeholder.com/150" alt="Team Member 1" />
          <h5>Nawaf Alsharif</h5>
          <p>UI devloper</p>
        </div>
        <div class="col-md-4 col-lg-3 team-member">
          <img src="https://via.placeholder.com/150" alt="Team Member 2" />
          <h5>Mubark Alhajri</h5>
          <p>Back-End devloper</p>
        </div>
        <div class="col-md-4 col-lg-3 team-member">
          <img src="https://via.placeholder.com/150" alt="Team Member 3" />
          <h5>Faisal Khairallah</h5>
          <p>API devloper</p>
        </div>
        <div class="col-md-4 col-lg-3 team-member">
          <img src="https://via.placeholder.com/150" alt="Team Member 4" />
          <h5>Abdullah Alahmdi</h5>
          <p>Presentor</p>
        </div>
      </div>
    </div>
    <script src="../assets/js/main.js"></script>

<?php 
include("footer.php");
?>
    
    <script>
      // Show fade-in effect on scroll
      document.addEventListener("DOMContentLoaded", function () {
        const fadeInElements = document.querySelectorAll(".fade-in");
        const observer = new IntersectionObserver(
          (entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                entry.target.classList.add("show");
              }
            });
          },
          { threshold: 0.2 }
        );

        fadeInElements.forEach((el) => observer.observe(el));
      });
    </script>

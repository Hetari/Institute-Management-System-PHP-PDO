<?php
$title = "Contact";
require_once("includes/header.php");

if (isset($_SESSION['message'])) {
?>
  <script>
    Swal.fire({
      icon: <?= "'" . $_SESSION['icon'] . "'" ?>,
      position: 'top',
      title: <?= "'" . $_SESSION['message'] . "'" ?>,
      showConfirmButton: false,
      timer: 2000
    })
  </script>
<?php unset($_SESSION['message']);
} else
?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Contact Us</h2>
      <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
        quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div>
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101677.55220286005!2d44.1910976849218!3d15.369445857753919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x16f18d7b4b7a1a1f%3A0x7d4f5b4d8f3e8b65!2sSana&#39;a%2C%20Yemen!5e0!3m2!1sen!2s!4v1635246184026!5m2!1sen!2s" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container">

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="fas fa-map-marker-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
            <div class="email">
              <i class="fas fa-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>
            <div class="phone">
              <i class="fas fa-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <!-- forms/contact.php -->
          <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once("includes/footer.php"); ?>
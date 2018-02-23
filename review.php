<?php
    // FOR DISPLAYING ERRORS
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL| E_STRICT);

    // CLASS INCLUDES
    include 'classes/Database.class.php';
    include 'classes/Review.class.php';
?>

<?php

    $firstName = "";
    $lastName = "";
    $email = "";
    $content = "";
    $submit = true;

    $firstNameValid = true;
    $lastNameValid = true;
    $emailValid = true;
    $contentValid = true;


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstName = test_input($_POST["firstName"]);
            if(empty($firstName)){
                $submit = false;
                $firstNameValid = false;
            }
            if(!preg_match("/^[a-zA-Z ]*$/",$firstName)){
                $submit = false;
                $firstNameValid = false;
            }

        $lastName = test_input($_POST["lastName"]);
            if(empty($lastName)){
                $submit = false;
                $lastNameValid = false;
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                $submit = false;
                $lastNameValid = false;
            }

        $email = test_input($_POST["email"]);
            if(empty($email)){
                $submit = false;
                $emailValid = false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $submit = false;
                $emailValid = false;
            }

        $content = test_input($_POST["content"]);
            if(empty($content)){
                $submit = false;
                $contentValid = false;
            }

        // SUBMIT IF EVERYTHING IS OK
        if($submit){
            $review = new Review();
            $review -> addReview($firstName, $lastName, $email, $content);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Guestbook</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/fonts.css" rel="stylesheet">
    <link href="assets/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
            <a class="blog-header-logo text-dark" href="index.php">Guestbook</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="review.php">Leave a review</a>
          </div>
        </div>
      </header>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">

            <!--  FORM -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mt-4" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">First name </label>
                  <input name="firstName" type="text" class="form-control <?php if(!$firstNameValid){ echo 'is-invalid'; } ?>" id="firstName" value="" required style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input name="lastName" type="text" class="form-control <?php if(!$lastNameValid){ echo 'is-invalid'; } ?>" id="lastName" value="<?= $lastName ?>" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control <?php if(!$emailValid){ echo 'is-invalid'; } ?>" id="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="mb-3">
                <label for="review">Review</label>
                <textarea name="content" id="textarea" class="form-control <?php if(!$contentValid){ echo 'is-invalid'; } ?>" rows="6" required></textarea>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <button class="btn btn-primary btn-lg btn-block" type="submit">Leave a review</button>
          </form> <!-- / FORM -->


        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 mt-4 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">This is a guestbook of my website, it's really cool.</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>


<svg xmlns="http://www.w3.org/2000/svg" width="200" height="250" viewBox="0 0 200 250" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg>
</body>
</html>

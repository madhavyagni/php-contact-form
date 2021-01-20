<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <title>contact form</title>
    <style>
      body{
        background: linear-gradient(20deg, rgb(179, 255, 189) 0%, rgb(179, 255, 189) 16%, #fff 0%, #fff 66%, rgb(179, 255, 189) 0%, rgb(179, 255, 189) 67%);
        background-repeat: no-repeat;
        height: 100vh;
      }
      .form-group input, .form-group textarea{
        border-radius: 10px;
        border: none;
        box-shadow: 0px 5px 10px #979797;
      }
      .btn{
        box-shadow: 0px 5px 10px #979797;
        border: none;
        border-radius: 10px;
      }
      .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
      }
      h3{
        color: rgb(18, 151, 0);
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/practice/contact form">Contact form</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/practice"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/practice/contact form/mesages.php"
                >List <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="https://github.com/madhavyagni/php-contact-form" target="_blank"
                >Source code <span class="sr-only">(current)</span></a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['txt'];

    if (empty($name)) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Enter your name</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    } else if (empty($email)) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Enter your email</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if (empty($msg)) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Enter your message</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "contact";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Unable to connect to server</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        }

        $tbl = "INSERT INTO `info` (`name`, `email`, `message`, `date`) VALUES ('$name', '$email', '$msg', current_timestamp())";
        $result = mysqli_query($conn, $tbl);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> hey ' . $name . ' Your entrie has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Unable to connect to server</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

    }

}

?>
    <div class="container">
      <div class="center">
        <h3>PHP MySQL Contact form</h3>
      <form
        action="/practice/contact form/index.php"
        method="POST"
        autocomplete="off"
        class="mt-3"
      >
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            name="name"
            placeholder="Enter your name"
            class="form-control"
            id="name"
          />
        </div>
        <div class="form-group">
          <label for="Email1">Email</label>
          <input
            type="email"
            name="email"
            placeholder="Enter your email"
            class="form-control"
            id="Email1"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="form-group">
          <label for="txt">Message</label>
          <textarea class="form-control" name="txt" placeholder="Enter your message" id="txt" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-success mt-3 pl-5 pr-5">
          Submit
        </button>
      </form>
    </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

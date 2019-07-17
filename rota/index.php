<?php
  include('server.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Online Roster</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Profile.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Requests.html">Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Roster.html">Roster</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-3">

        </div>

        <div class="col-md-6 pt-2">
          <div class="card my-3 shadow-lg">
            <img class="card-img-top" src="https://khn.org/wp-content/uploads/sites/2/2018/09/hospital-merger.jpg?w=1024" alt="login-image">
            <div class="card-body">

              <form action="index.php" method="post">
              <?php include('errors.php'); ?>
                <div class="form-group">
                  <label class="label ml-2 mt-1">Employee ID</label>
                  <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                  <label class="label ml-2 mt-1">Password</label>
                  <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-outline-primary mt-2">Sign In</button>
                <a class="btn btn-outline-danger mt-2" href="register.php" style="float:right;">Register</a>

              </form>

            </div>
          </div>
        </div>


        <div class="col-md-3">

        </div>
      </div>

    </div>
  </body>
</html>

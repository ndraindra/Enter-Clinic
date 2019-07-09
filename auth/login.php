<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

  <title> Login </title>
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Themify Icons -->
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- Custom Style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/logo.png" type="image/x-icon">

</head>

<body>

  </script>

  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card">

        <div class="card-header">
          <h3> Login Enclin </h3>

        </div>
        <div class="card-body">
          <form action="../login.php" method="post">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
                <input name="username" type="text" class="form-control" placeholder="Username" autocomplete="off" required>
              </div>

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                  <input name="password" type="password" class="form-control" placeholder="Password" required>
              </div>

              <!-- <div class="form-group">
                <select name="level" class="form-control" required>
                  <option value="">Pilih Level User : </option>
                  <option value="admin">Administrator</option>
                  <option value="pegawai">Pegawai</option>
                </select>
              </div> -->

              <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn float-right login_btn">
              </div>
          </form>
        </div>
        <div class="text-center p-t-136">
          <a class="txt2" href="#">
            Created By Enter Clinic
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

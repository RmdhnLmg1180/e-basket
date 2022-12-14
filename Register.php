<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM pelanggan WHERE email='$email' AND username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO pelanggan (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("location: login.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email dan username Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Basket | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/register.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="icon" type="image/x-icon" href="gambar/Logo.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  </head>
  <body>
    <section>
      <div class="login">
        <div class="login-kiri">
          <img class="img-fluid" src="gambar/login1.png" />
        </div>
        <div class="login-kanan">
          <h1>Register</h1>
          <?php echo $_SESSION['error']?>
          <form action="" method="POST">
            <div class="login-form">
              <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" placeholder="Username" class="form-control" name="username" value="<?php echo $username; ?>" required>
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                <label for="password" class="form-label">Password</label>
                <input type="password" placeholder="Password" name="password" class="form-control" value="<?php echo $_POST['password']; ?>" required>
                <label for="cpassword" class="form-label">Confirmasi Password</label>
                <input type="password" placeholder="confirm your Password" name="cpassword" class="form-control" value="<?php echo $_POST['cpassword']; ?>" required>
              </div>
            </div>
            <button name="submit" class="btn btn-primary">Register</button>
          </form>
          <p>jika sudah memiliki akun silahkan <a href="login.php" class="text-decoration-none">Login</a></p>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - POLGAN MART</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f5fa;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background: #006bff;
      padding: 15px 20px;
      color: white;
      font-size: 20px;
      font-weight: bold;
      letter-spacing: 1px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      font-size: 14px;
      background: rgba(255,255,255,0.2);
      padding: 6px 10px;
      border-radius: 6px;
    }
    .container {
      width: 900px;
      margin: 30px auto;
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #0056d2;
      margin-bottom: 20px;
      letter-spacing: 1px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      border-radius: 8px;
      overflow: hidden;
    }
    th {
      background: #e9eef7;
    }
    th, td {
      border: 1px solid #cfd3dc;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }
    .summary {
      margin-top: 15px;
      background: #f8f9fc;
      padding: 15px;
      border-radius: 8px;
      font-size: 15px;
    }
    .footer {
      text-align: center;
      margin-top: 20px;
      color: #777;
      font-size: 12px;
    }
  </style>
</head>
<body>

<div class="navbar">
  <div>POLGAN MART - Dashboard</div>
  <a href="#">Logout</a>
</div>

<div class="container">
  <h2>Daftar Penjualan</h2>

  <table>
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
    </tr>
    <tr>
      <td>1</td>
      <td>BRG001</td>
      <td>Pulpen</td>
      <td>Rp 3.000</td>
      <td>2</td>
      <td>Rp 6.000</td>
    </tr>
    <tr>
      <td>2</td>
      <td>BRG002</td>
      <td>Buku Tulis</td>
      <td>Rp 7.000</td>
      <td>1</td>
      <td>Rp 7.000</td>
    </tr>
  </table>

  <div class="summary">
    <div><strong>Total Belanja:</strong> Rp 13.000</div>
    <div><strong>Diskon:</strong> Rp 650 (5%)</div>
    <div><strong>To<?php
session_start();

// Username & Password yang diizinkan
$valid_username = "admin";
$valid_password = "12345";

$error = "";

// Jika tombol login ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Cek kecocokan
    if ($username === $valid_username && $password === $valid_password) {

        // Simpan sesi login
        $_SESSION['username'] = $username;

        // Arahkan ke dashboard
        header("Location: ../dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>POLGAN MART Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f5fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: #ffffff;
      width: 350px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h2 {
      color: #0056d2;
      margin-bottom: 25px;
      font-size: 22px;
      letter-spacing: 1px;
    }
    label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      margin-bottom: 15px;
      font-size: 14px;
    }
    .btn-login {
      width: 100%;
      background-color: #006bff;
      border: none;
      padding: 10px;
      border-radius: 6px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      margin-bottom: 10px;
    }
    .btn-cancel {
      width: 100%;
      background-color: #ffffff;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 6px;
      color: #444;
      cursor: pointer;
      font-size: 15px;
    }
    footer {
      margin-top: 20px;
      font-size: 12px;
      color: #777;
    }
    .error {
      color: red;
      margin-bottom: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>POLGAN MART</h2>

    <!-- Tampilkan pesan error jika login gagal -->
    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <!-- Form Login -->
    <form method="POST" action="">
      <label>Username</label>
      <input type="text" name="username" placeholder="admin" required />

      <label>Password</label>
      <input type="password" name="password" placeholder="•••" required />

      <button class="btn-login" type="submit">Login</button>
      <button type="reset" class="btn-cancel">Batal</button>
    </form>

    <footer>
      © 2025 POLGAN MART
    </footer>
  </div>
</body>
</html>
tal Bayar:</strong> Rp 12.350</div>
  </div>

  <div class="footer">© 2025 POLGAN MART</div>
</div>

</body>
</html>

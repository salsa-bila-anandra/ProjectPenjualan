<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];

$kode_barang = ['BRG001', 'BRG002', 'BRG003', 'BRG004', 'BRG005'];
$nama_barang = ['Pulpen', 'Buku Tulis', 'Penghapus', 'Penggaris', 'Spidol'];
$harga_barang = [3000, 7000, 2000, 5000, 8000];

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;


$jumlah_transaksi = 5;

for ($i = 0; $i < $jumlah_transaksi; $i++) {
   
    $indexBarang = rand(0, count($kode_barang) - 1);
    $beli[$i] = $indexBarang;

    $jumlah[$i] = rand(1, 5);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - POLGAN MART</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .wrapper {
            width: 800px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
            margin: 0 0 10px 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .logout-btn {
            padding: 6px 10px;
            background: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .logout-btn:hover {
            background: #c82333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th, td {
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }
        th {
            background: #e9ecef;
        }
        .summary {
            margin-top: 15px;
            font-size: 15px;
        }
        .summary div {
            margin: 3px 0;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="header">
        <div>
            <strong>-- POLGAN MART --</strong><br>
            Selamat datang, <strong><?php echo htmlspecialchars($username); ?></strong>
        </div>
        <div>
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>
    </div>

    <h2>Daftar Penjualan (Random)</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
        </tr>

        <?php
        $no = 1;
        $grandtotal = 0; 


        foreach ($beli as $key => $indexBarang) {
            $kode = $kode_barang[$indexBarang];
            $nama = $nama_barang[$indexBarang];
            $harga = $harga_barang[$indexBarang];
            $qty   = $jumlah[$key];

            $subtotal = $harga * $qty;
            $total[$key] = $subtotal; 
            $grandtotal += $subtotal;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $kode; ?></td>
                <td><?php echo $nama; ?></td>
                <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                <td><?php echo $qty; ?></td>
                <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </table>

    <?php

    if ($grandtotal < 50000) {
        $diskonPersen = 5;
    } elseif ($grandtotal >= 50000 && $grandtotal <= 100000) {
        $diskonPersen = 10;
    } else {
        $diskonPersen = 15;
    }

    $diskonNominal = $grandtotal * $diskonPersen / 100;
    $totalAkhir = $grandtotal - $diskonNominal;
    ?>

    <div class="summary">
        <div><strong>Total Belanja:</strong> Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></div>
        <div><strong>Diskon (<?php echo $diskonPersen; ?>%):</strong> Rp <?php echo number_format($diskonNominal, 0, ',', '.'); ?></div>
        <div><strong>Total Bayar Akhir:</strong> Rp <?php echo number_format($totalAkhir, 0, ',', '.'); ?></div>
    </div>
</div>

</body>
</html>
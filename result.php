<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pembelian Bahan Bakar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f0f8ff;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #container {
            width: 80%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .bukti-transaksi {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: #333;
            margin-top: 15px;
            text-align: left;
        }

        .btn-back,
        .btn-print {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover,
        .btn-print:hover {
            background-color: #0056b3;
        }

        @media print {
            .btn-back,
            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div id="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            class Shell
            {
                protected $jenis;
                protected $harga;
                protected $jumlah;
                protected $ppn;

                public function __construct($jenis, $harga, $jumlah)
                {
                    $this->jenis = $jenis;
                    $this->harga = $harga;
                    $this->jumlah = $jumlah;
                    $this->ppn = 10; // PPN tetap 10%
                }


                public function getJenis()
                {
                    return $this->jenis;
                }

                public function getHarga()
                {
                    return $this->harga;
                }

                public function getJumlah()
                {
                    return $this->jumlah;
                }

                public function getPpn()
                {
                    return $this->ppn;
                }
            }

            class Beli extends Shell
            {
                public function hitungTotal()
                {
                    $total = $this->harga * $this->jumlah;
                    $total += $total * $this->ppn / 100; // Calculate total with 10% PPN
                    return $total; 
                }

                public function buktiTransaksi()
                {
                    $total = $this->hitungTotal();
                
                    echo "<h3>Bukti Transaksi:</h3>";
                    echo "<p><strong>Jenis bahan bakar:</strong> " . $this->jenis . "</p>";
                    echo "<p><strong>Harga per liter:</strong> Rp " . number_format($this->harga, 2, ',', '.') . "</p>";
                    echo "<p><strong>Jumlah:</strong> " . $this->jumlah . " Liter</p>";
                    echo "<p><strong>PPN:</strong> " . $this->ppn . "%</p>";
                    echo "<p><strong>Total yang harus anda bayar:</strong> Rp " . number_format($total, 2, ',', '.') . "</p>";
                }
                
            }

            $hargaBahanBakar = [
                "Shell Super" => 15420.00,
                "Shell V-Power" => 16130.00,
                "Shell V-Power Diesel" => 18310.00,
                "Shell V-Power Nitro" => 16510.00,
            ];

            $jenis = $_POST["jenis"];
            $jumlah = $_POST["jumlah"];

            if (array_key_exists($jenis, $hargaBahanBakar)) {
                $harga = $hargaBahanBakar[$jenis];
                $beli = new Beli($jenis, $harga, $jumlah);
                $beli->buktiTransaksi();
            } else {
                echo "<p>Jenis bahan bakar tidak valid.</p>";
            }
        }
        ?>

        <a href="javascript:history.back()" class="btn-back">Kembali</a>
        <button class="btn-print" onclick="window.print()">Cetak Bukti Transaksi</button>
    </div>
</body>

</html>

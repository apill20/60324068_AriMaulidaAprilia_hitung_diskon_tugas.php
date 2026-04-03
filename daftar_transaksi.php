<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Transaksi Peminjaman</h1>
        
        <?php
        $total_transaksi = 0;
        $total_dipinjam = 0;
        $total_dikembalikan = 0;
        
        // Loop pertama untuk hitung statistik
        // Pastikan logika continue dan break sama dengan tabel di bawah agar statistik akurat
        for ($i = 1; $i <= 10; $i++) {
            // Stop di transaksi ke-8
            if ($i == 8) {
                break;
            }
            
            // Skip transaksi genap
            if ($i % 2 == 0) {
                continue;
            }

            // Hitung statistik untuk data yang lolos filter
            $status = ($i % 3 == 0) ? "Dikembalikan" : "Dipinjam";
            
            $total_transaksi++;
            if ($status == "Dipinjam") {
                $total_dipinjam++;
            } else {
                $total_dikembalikan++;
            }
        }
        ?>
        
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Ditampilkan</h5>
                        <h2><?php echo $total_transaksi; ?> Transaksi</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Masih Dipinjam</h5>
                        <h2><?php echo $total_dipinjam; ?> Buku</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Sudah Dikembalikan</h5>
                        <h2><?php echo $total_dikembalikan; ?> Buku</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Hari</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop untuk tampilkan data
                for ($i = 1; $i <= 10; $i++) {
                    
                    // Stop di transaksi ke-8 dengan BREAK
                    if ($i == 8) {
                        break;
                    }

                    // Skip transaksi genap dengan CONTINUE
                    if ($i % 2 == 0) {
                        continue;
                    }
                    
                    // Generate data transaksi
                    $id_transaksi = "TRX-" . str_pad($i, 4, "0", STR_PAD_LEFT);
                    $nama_peminjam = "Anggota " . $i;
                    $judul_buku = "Buku Teknologi Vol. " . $i;
                    $tanggal_pinjam = date('Y-m-d', strtotime("-$i days"));
                    $tanggal_kembali = date('Y-m-d', strtotime("+7 days", strtotime($tanggal_pinjam)));
                    $status = ($i % 3 == 0) ? "Dikembalikan" : "Dipinjam";
                    
                    // Hitung jumlah hari sejak pinjam (karena tanggal_pinjam mundur $i hari, maka jumlah hari = $i)
                    $hari_berjalan = $i; 

                    // Tentukan warna badge berdasarkan status
                    $badge_class = ($status == "Dikembalikan") ? "bg-success" : "bg-warning text-white  ";
                    ?>
                    
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $id_transaksi; ?></td>
                        <td><?php echo $nama_peminjam; ?></td>
                        <td><?php echo $judul_buku; ?></td>
                        <td><?php echo $tanggal_pinjam; ?></td>
                        <td><?php echo $tanggal_kembali; ?></td>
                        <td><?php echo $hari_berjalan; ?> Hari</td>
                        <td><span class="badge <?php echo $badge_class; ?>"><?php echo $status; ?></span></td>
                    </tr>
                    
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
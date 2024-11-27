<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Tugas PHP</title>
</head>
<body>
    <h1>Form Input</h1>

    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <br><br>
        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" required>
        <br><br>
        <label for="pekerjaan">Pekerjaan:</label>
        <select name="pekerjaan" id="pekerjaan" required>
            <option value="Manager">Manager</option>
            <option value="Programmer">Programmer</option>
            <option value="Desainer">Desainer</option>
            <option value="Marketing">Marketing</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Memproses data setelah form disubmit
    if (isset($_POST['submit'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $tgl_lahir = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        $tanggal_lahir = new DateTime($tgl_lahir);
        $tanggal_sekarang = new DateTime();
        $umur = $tanggal_sekarang->diff($tanggal_lahir)->y;

        $gaji = 0;
        switch ($pekerjaan) {
            case "Manager":
                $gaji = 50000000;
                break;
            case "Programmer":
                $gaji = 30000000;
                break;
            case "Desainer":
                $gaji = 25000000;
                break;
            case "Marketing":
                $gaji = 20000000;
                break;
        }

        // Tampilkan output
        echo "<h2>Output Tugas PHP:</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr><td>Nama</td><td>$nama</td></tr>";
        echo "<tr><td>Umur</td><td>$umur tahun</td></tr>";
        echo "<tr><td>Pekerjaan</td><td>$pekerjaan</td></tr>";
        echo "<tr><td>Gaji</td><td>Rp " . number_format($gaji, 0, ',', '.') . "</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>

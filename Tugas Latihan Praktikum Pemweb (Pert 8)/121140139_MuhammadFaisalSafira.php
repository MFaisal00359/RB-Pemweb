<?php
// Konek database XAMPP
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = '121140139_MuhammadFaisalSafira';
$koneksi = new mysqli($host, $username, $password, $database);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Pagination after > 10 value atau data diatas 10 (tombol selanjutnya) dan total data. ok brok
$halaman_sekarang = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$data_per_halaman = 10;
$offset = ($halaman_sekarang - 1) * $data_per_halaman;

$query_total = "SELECT COUNT(*) AS total FROM valo_player";
$result_total = $koneksi->query($query_total);
$total_data = $result_total->fetch_assoc()['total'];
$total_halaman = ceil($total_data / $data_per_halaman);

$query = "SELECT * FROM valo_player LIMIT $offset, $data_per_halaman";
$result = $koneksi->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorant Player Database</title>
    <!-- Bang nop rof izin pake tailwind yaa -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-white min-h-screen flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-4xl bg-white -lg soft-shadow overflow-hidden rounded-xl">
        <div class="bg-white p-4 flex items-center justify-center">
            <h1 class="p-3 text-red-500 text-3xl font-extrabold text-bold">Valorant Best Players By <a href="https://github.com/MFaisal00359/RB-Pemweb/tree/main/Tugas%20Latihan%20Praktikum%20Pemweb%20(Pert%208)" target="_blank" rel="noopener noreferrer" class="hover:underline-offset-1 hover:text-gray-500">Faisal</a></h1>
        </div>
        <table class="w-full">
            <thead>
                <tr class="bg-red-500 text-white hover:bg-red-600">
                    <th class="p-3">ID</th>
                    <th class="p-3">nickname</th>
                    <th class="p-3">Tim</th>
                    <th class="p-3">DPI</th>
                    <th class="p-3">Link Profil</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='border-b hover:text-red-600 hover:bg-gray-100'>";
                    echo "<td class='p-3 text-center'>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td class='p-3 text-center'>" . htmlspecialchars($row['nickname']) . "</td>";
                    echo "<td class='p-3 text-center'>" . htmlspecialchars($row['tim']) . "</td>";
                    echo "<td class='p-3 text-center'>" . htmlspecialchars($row['dpi']) . "</td>";
                    echo "<td class='p-3 text-center'><a href='" . htmlspecialchars($row['profil']) . "' target='_blank' class='text-red-500 hover:text-red-700'>Lihat Profil</a></td>";
                    echo "</tr>";
                }

                $jumlah_data = $result->num_rows;
                for ($i = $jumlah_data; $i < 10; $i++) {
                    echo "<tr class='border-b'>";
                    echo "<td class='p-3 text-center text-gray-400'>-</td>";
                    echo "<td class='p-3 text-center text-gray-400'>-</td>";
                    echo "<td class='p-3 text-center text-gray-400'>-</td>";
                    echo "<td class='p-3 text-center text-gray-400'>-</td>";
                    echo "<td class='p-3 text-center text-gray-400'>-</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="bg-white p-4 flex justify-center space-x-4 border-t">
            <?php if ($halaman_sekarang > 1): ?>
                <a href="?halaman=<?= $halaman_sekarang - 1 ?>" class="px-4 py-2 bg-red-500 text-white hover:bg-red-600">
                    Sebelumnya
                </a>
            <?php endif; ?>

            <span class="self-center text-gray-600">
                Halaman <?= $halaman_sekarang ?> dari <?= $total_halaman ?>
            </span>

            <?php if ($halaman_sekarang < $total_halaman): ?>
                <a href="?halaman=<?= $halaman_sekarang + 1 ?>" class="px-4 py-2 bg-red-500 text-white hover:bg-red-600">
                    Selanjutnya
                </a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$koneksi->close();
?>

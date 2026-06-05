<?php
include "db.php";

// HITUNG DATA
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM comments"))['t'];

$negatif = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM comments WHERE sentiment='Negatif'"))['t'];

$positif = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM comments WHERE sentiment='Positif'"))['t'];

?>

<h2>AI Report (Analisis Otomatis)</h2>

<p>
Berdasarkan total <b><?= $total ?></b> komentar yang dianalisis:
</p>

<ul>
    <li>Positif: <?= $positif ?></li>
    <li>Negatif: <?= $negatif ?></li>
</ul>

<hr>

<h3>Kesimpulan Otomatis:</h3>

<p>
<?php
if ($negatif > $positif) {
    echo "Mayoritas komentar bernilai negatif. Pengguna banyak mengeluhkan layanan atau kualitas. Disarankan meningkatkan pelayanan dan kualitas produk.";
} elseif ($positif > $negatif) {
    echo "Mayoritas komentar bernilai positif. Respon pengguna terhadap produk/layanan cukup baik.";
} else {
    echo "Sentimen pengguna cenderung seimbang antara positif dan negatif.";
}
?>
</p>
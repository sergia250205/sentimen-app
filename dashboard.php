<?php
include "db.php";

// HITUNG DATA SENTIMEN
$positif = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM comments WHERE sentiment='Positif'"))['total'];

$negatif = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM comments WHERE sentiment='Negatif'"))['total'];

$netral = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM comments WHERE sentiment='Netral'"))['total'];

// AMBIL SEMUA DATA
$result = mysqli_query($conn, "SELECT * FROM comments");
?>

<h2>Dashboard Komentar</h2>

<a href="input.php">+ Tambah Data</a>

<br><br>

<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="pieChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div style="width: 300px; margin: auto;">
    <canvas id="pieChart"></canvas>
</div>

<script>
new Chart(document.getElementById("pieChart"), {
    type: 'pie',
    data: {
        labels: ["Positif", "Negatif", "Netral"],
        datasets: [{
            data: [<?= $positif ?>, <?= $negatif ?>, <?= $netral ?>],
            backgroundColor: ["green", "red", "gray"]
        }]
    }
});
</script>

<br><br>

<!-- TABEL DATA -->
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Komentar</th>
        <th>Sentimen</th>
        <th>Aksi</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['text'] ?></td>
    <td><?= $row['sentiment'] ?></td>
    <td>
        <td>
    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin mau hapus?')">
        Hapus
    </a>
</td>
        </a>
    </td>
</tr>
<?php } ?>
</table>
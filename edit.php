<?php
include "db.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM comments WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $username = $_POST['username'];
    $text = $_POST['text'];

    // update sentimen lagi
    if (strpos($text, "bagus") !== false) {
        $sentiment = "Positif";
    } elseif (strpos($text, "jelek") !== false) {
        $sentiment = "Negatif";
    } else {
        $sentiment = "Netral";
    }

    mysqli_query($conn, "UPDATE comments SET 
        username='$username',
        text='$text',
        sentiment='$sentiment'
        WHERE id=$id
    ");

    header("Location: dashboard.php");
}
?>

<h2>Edit Komentar</h2>

<form method="POST">
    Username:<br>
    <input type="text" name="username" value="<?= $row['username'] ?>"><br><br>

    Komentar:<br>
    <textarea name="text"><?= $row['text'] ?></textarea><br><br>

    <button name="update">Update</button>
</form>
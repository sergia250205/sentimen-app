<?php
include "db.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $text = $_POST['text'];

    // SENTIMEN SEDERHANA
    if (strpos($text, "bagus") !== false) {
        $sentiment = "Positif";
    } elseif (strpos($text, "jelek") !== false) {
        $sentiment = "Negatif";
    } else {
        $sentiment = "Netral";
    }

    mysqli_query($conn,
        "INSERT INTO comments (username, text, sentiment)
        VALUES ('$username', '$text', '$sentiment')"
    );

    echo "Data masuk!";
}
?>

<h2>Input Komentar</h2>

<form method="POST">
    Username:<br>
    <input type="text" name="username"><br><br>

    Komentar:<br>
    <textarea name="text"></textarea><br><br>

    <button name="submit">Simpan</button>
</form>
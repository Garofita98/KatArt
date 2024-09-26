<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = htmlspecialchars($_POST['nume']);
    $prenume = htmlspecialchars($_POST['prenume']);
    $email = htmlspecialchars($_POST['email']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $descriere = htmlspecialchars($_POST['descriere']);

    $to = "katart.handmadeoffice@gmail.com"; 
    $subject = "Nouă comandă de la " . $nume . " " . $prenume;
    $body = "Nume: " . $nume . "\nPrenume: " . $prenume . "\nEmail: " . $email . "\nTelefon: " . $telefon . "\nDescriere: " . $descriere;
    $headers = "From: " . $email;

    if (mail($to, $subject, $body, $headers)) {
        echo "Mesajul a fost trimis cu succes!";
    } else {
        echo "Eroare la trimiterea mesajului.";
    }
}
?>


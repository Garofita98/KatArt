<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = htmlspecialchars($_POST['nume']);
    $prenume = htmlspecialchars($_POST['prenume']);
    $email = htmlspecialchars($_POST['email']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $descriere = htmlspecialchars($_POST['descriere']);

    // Validare câmpuri
    if (empty($nume) || empty($prenume) || empty($email) || empty($telefon) || empty($descriere)) {
        echo "Toate câmpurile sunt obligatorii!";
        exit;
    }

    // Validare adresă de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresa de e-mail este invalidă!";
        exit;
    }

    // Configurare email
    $to = "katart.handmadeoffice@gmail.com"; // Adresa unde se trimit comenzile
    $subject = "Nouă comandă de la $nume $prenume";
    $message = "Nume: $nume\nPrenume: $prenume\nEmail: $email\nTelefon: $telefon\nDescriere: $descriere";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Trimiterea emailului
    if (mail($to, $subject, $message, $headers)) {
        echo "Comanda a fost trimisă cu succes!";
    } else {
        echo "A apărut o eroare la trimiterea comenzii.";
    }
}
?>


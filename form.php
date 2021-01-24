<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $from = 'Mesaj de pe site'; 
    $to = 'ihaschickenpie@gmail.com'; 
    $subject = 'De pe site';

    $body = "De la: $name\n E-Mail: $email\n Message:\n $message";
?>

<?php
if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
        echo '<p>Va multumim! O sa va contactam in cel mai scurt timp</p>';
    } else { 
        echo '<p>Oops! O eroare s-a produs :(. Incearca sa trimiti mesajul din nou.</p>'; 
    }
}
?>
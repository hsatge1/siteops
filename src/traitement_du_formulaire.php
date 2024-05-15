
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Vérifiez les données entrantes et nettoyez-les
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
    $type_pc = filter_var($_POST['type_pc'], FILTER_SANITIZE_STRING);
    $type_clavier = filter_var($_POST['type_clavier'], FILTER_SANITIZE_STRING);
    $type_souris = filter_var($_POST['type_souris'], FILTER_SANITIZE_STRING);
    $accessoire = isset($_POST['accessoire']) ? implode(",", $_POST['accessoire']) : '';

    // Créez le message e-mail
    $to = "hugoprojetops@gmail.com";
    $subject = "Nouveau choix de matériel informatique";
    
    // Formatez votre e-mail ici
    $message = "Nom Prénom: " . $prenom . "\r\n" .
               "Type de PC: " . $type_pc . "\r\n" .
               "Type de clavier: " . $type_clavier . "\r\n" .
               "Type de souris: " . $type_souris . "\r\n" .
               "Accessoires: " . $accessoire;

    // Pour envoyer un e-mail HTML, l'en-tête Content-type doit être défini
    $headers = 'From: serverhugo2@gmail.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
               "Content-type: text/html; charset=UTF-8";

    // Envoie l'e-mail
    echo nl2br($message); // nl2br convertit les nouvelles lignes en balises <br> pour l'affichage HTML
    
    // Redirection après l'envoi de l'e-mail (optionnel)
    if(mail($to, $subject, $message, $headers)){
        // Redirigez ici
        header('Location: page_de_remerciement.html');
        exit();
    } else {
        echo 'Le message n\'a pas pu être envoyé.';
        // Gérer ici le cas où le mail n'a pas été envoyé
    }
    
    // exit();
}
?>
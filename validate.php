
<?php

$postData = $_POST;
// Test de l'email

if (!isset($postData['email']) ||
!filter_var($postData['email'], FILTER_VALIDATE_EMAIL) ||
empty($postData['nom']) ||
trim($postData['nom']) === ""){
    echo " Il faut un email valide et remplir le champ nom pour soumettre le formulaire";
    return;
}


// Test de l'upload du fichier 
$isfileLoaded = false;

if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK)
{
    // Test de la taille du fichier 

    if ($_FILES['screenshot']['size'] > 1000000){
        echo "Fichier volumineux (moins de 1 Mo)";
        return;
    }

    // Test de l'extension autorisée

    $fileinfo = pathinfo($_FILES['screenshot']['name']);
    $extension = $fileinfo['extension'];
    $allowedExtension = ['jpg','png', 'jpeg', 'gif'];
    if (!in_array($extension, $allowedExtension)){
        echo " l extension ". $extension . "n est pas autorisée";
        return;
    }


    // test si le fichier uploads est manquant

$path = __DIR__ ."/uploads/";

if (!is_dir($path)){
    echo " le dossier uploads est manquant";
    return;
    
}

// déplacer le fichier du stockage temp au dossier uploads

move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
$isFileLoaded = true

} 


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1>Message bien reçu !</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo($postData['email']); ?></p>
                <p class="card-text"><b>Message</b> : <?php echo(strip_tags($postData['nom'])); ?></p>
                <?php if ($isFileLoaded) : ?>
                    <div class="alert alert-success" role="alert">
                        L'envoi a bien été effectué !
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
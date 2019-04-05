
<?php

function getProject($projectId)
{
    $connect = mysqli_connect("db5000039469.hosting-data.io", "dbs34444", "dbu82893", "5Qq7wpvefufu7FxHnUg9");

    if (mysqli_connect_errno()) {
        die('<p>La connexion au serveur MySQL a échoué: ' . mysqli_connect_error() . '</p>');
    } else {
        echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
    }
    $req = $connect -> prepare("SELECT * FROM `project` WHERE ID = ?");
    $req -> execute(array($projectId));
    $post = $req -> fetch();

    return $post;
}
?>
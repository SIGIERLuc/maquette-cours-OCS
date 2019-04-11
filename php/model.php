
<?php
function request($database, $sql_request)
{
    $request = mysqli_query($database, $sql_request) or die("Erreur SQL ! <br/>" . $sql_request . "<br/>");
    return $request;
}
function getProject($projectId)
{
    $connect = mysqli_connect("db5000039469.hosting-data.io", "dbs34444", "dbu82893", "5Qq7wpvefufu7FxHnUg9");

    if (mysqli_connect_errno()) {
        die('<p>La connexion au serveur MySQL a échoué: ' . mysqli_connect_error() . '</p>');
    } else {
        echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
    }
    $sql = "SELECT * FROM `project` WHERE ID = " . $projectId;

    $project = request($connect, $sql);

    return $project;
}   

function getButton($projectId){ 
    $connect = mysqli_connect("db5000039469.hosting-data.io", "dbs34444", "dbu82893", "5Qq7wpvefufu7FxHnUg9");

    if (mysqli_connect_errno()){
        die("<p>La connexion au serveur MySql a échoué" .  mysqli_connect_error() . "</p>");
    }
    else{
        echo "<p> Connexion au serveur MySQL établie avec succès.</p>";
    }
    $button_sql = "SELECT * FROM `button` WHERE ID = ". $button_id;
    $match_sql = "SELECT button_id FROM `display_project` WHERE project_id = " . $projectId;

    $button_id = request($connect, $match_sql);

    $matching_button = request($connect, $button_sql);
}
?>
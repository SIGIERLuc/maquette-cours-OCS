<?php
$host_name = 'db5000039469.hosting-data.io';
$database = 'dbs34444';
$user_name = 'dbu82893';
$password = '5Qq7wpvefufu7FxHnUg9';
$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: ' . mysqli_connect_error() . '</p>');
} else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
}
?>

<?php
$sql = "SELECT * FROM `project`";


function request($database, $sql_request)
{
    $request = mysqli_query($database, $sql_request) or die("Erreur SQL ! <br/>" . $sql_request . "<br/>");
    return $request;
}

if ($project_results = request($connect, $sql)) {
    while ($project = mysqli_fetch_array($project_results)) {
        $title = $project["project_name"];
        $content = $project["project_description"];
        $img = "<img src='" . $project["project_img"] . "'><br>";
        $request_to_displayproject = "SELECT * FROM `display_project` WHERE `project_id` = " . $project["ID"];
        $button_html = "";
        if ($display_results = request($connect, $request_to_displayproject)) {
            while ($display_project = mysqli_fetch_array($display_results)) {
                $request_to_button = "SELECT * FROM `button` WHERE `ID` = " . $display_project["button_id"];
                
                if ($button_results = request($connect, $request_to_button)) {
                    while ($button = mysqli_fetch_array($button_results)) {
                        $button_html = $button_html + "<a href='" . $button["button_link"] . "'>" . $button["button_text"] . "</a><br>";
                    }
                }
            }
        }
    }
}
mysqli_close($connect);
?>

<?php require('template-project.php'); ?>

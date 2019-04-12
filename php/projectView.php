<?php
$host_name = 'db5000039469.hosting-data.io';
$database = 'dbs34444';
$user_name = 'dbu82893';
$password = '5Qq7wpvefufu7FxHnUg9';
$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {
    die("<script>console.log(". mysqli_connect_error() .");</script>");
} else {
    echo "<script>console.log('Connexion à la base de donées MySQL réussi');</script>";
}
?>

<?php
$sql = "SELECT * FROM `project`";


function request($database, $sql_request)
{
    $request = mysqli_query($database, $sql_request) or die("<script>console.log(". $sql_request .");</script>;");
    return $request;
}

if ($project_results = request($connect, $sql)) {
    foreach ($project_results as $key => $project) {
        $id = $project["ID"];
        $title = $project["project_name"];
        $content = $project["project_description"];
        $button_html = [];

        $request_to_displayproject = "SELECT * FROM `display_project` WHERE `project_id` = " . $project["ID"];

        if ($display_results = request($connect, $request_to_displayproject)) {
            foreach ($display_results as $key => $display_project) {
                $request_to_button = "SELECT * FROM `button` WHERE `ID` = " . $display_project["button_id"];

                if ($button_results = request($connect, $request_to_button)) {
                        foreach ($button_results as $key => $button) {
                        array_push($button_html, $button);
                    }
                }
            }
        }
        require('template-project.php');
    }
}
mysqli_close($connect);
?>



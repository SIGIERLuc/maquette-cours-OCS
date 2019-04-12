<?php
require('model.php');

$array = get_project_id($connect);
?>


<div class="col-sm-12 projectButtonGroup">
    <?php
    foreach ($array as $key => $value) {
        $project_button = get_project($value["ID"],$connect);
        require('template-project-button.php');
    }
    ?>

</div>
<?php
foreach ($array as $key => $value) {
    $project_results = get_project($value["ID"], $connect);
    $button_array = get_button($value["ID"], $connect);
    require('template-project.php');
}
mysqli_close($connect);
?>
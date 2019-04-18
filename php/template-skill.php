<div class="col-md-4 expertise">
    <img src="<?= $value["skill_image"] ?>">
    <h5>
        <?= $value["skill_name"] ?>
    </h5>
    <?php
    for ($i = 0; $i < $value["skill_level"]; $i++) {
        ?>
        <p>Pouet</p>
    <?php
}
for ($i; $i < 5; $i++) {
    ?>
        <p>Prout</p>
    <?php
}
?>
</div>
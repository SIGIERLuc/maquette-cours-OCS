<div class="collapse show col-sm-12 projectFrame" id="collapseP1" data-parent="#myGroup">
    <h2>
        <?= $title ?>
    </h2>
    <p class="projectText">
        <?= $content ?>
    </p>
    <img class="project-img" src="<?= $img ?>">
    <br>
    <?php
        foreach($button_html as $key => $value)
        {
          echo $value;
        }
    ?>
</div>
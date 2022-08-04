<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php foreach ($materials as $material): ?>
            <div class="col-lg-4">
                <h2><?= $material->title ?></h2>

                <p><?= $material->content ?></p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

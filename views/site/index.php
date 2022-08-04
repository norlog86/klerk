<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var $materials */
/** @var $pagination */

$this->title = 'BlogS';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            <?php foreach ($materials as $material): ?>
                <div class="col-lg-4">
                    <h2><?= $material->title ?></h2>

                    <p><?= $material->content ?></p>
                    <p><b>Принадлежит блогу:</b><?= $material->blog->name ?></p>

                    <p> <?= Html::a('Перейти&raquo;', ['view-materials', 'id' => $material->id],
                            ['class' => 'btn btn-outline-secondary']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?= LinkPager::widget(['pagination' => $pagination,  'registerLinkTags' => true]) ?>
    </div>
</div>

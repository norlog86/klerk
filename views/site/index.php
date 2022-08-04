<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var $materials */

$this->title = 'BlogS';
?>
<div class="site-index">

<!--    Если пользователь авторизован, то он может создать статью-->
    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Создать статью', ['create-materials'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <div class="body-content">

        <div class="row">
            <?php foreach ($materials as $material): ?>
                <div class="col-lg-4">
                    <h2><?= $material->title ?></h2>

                    <p><?= $material->content ?></p>

                    <p> <?= Html::a('Перейти&raquo;', ['view-materials', 'id' => $material->id],
                            ['class' => 'btn btn-outline-secondary']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?= LinkPager::widget(['pagination' => $pagination,  'registerLinkTags' => true]) ?>
    </div>
</div>

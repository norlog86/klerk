<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var $subs */
/** @var $pagination */

$this->title = 'BlogS';
?>
<div class="site-index">
    <h2 align="center">Статьи из блогов моих подписок</h2>
    <hr>
    <div class="body-content">

        <div class="row">
            <?php if (empty($subs)): ?>
                <h5 style="margin-left:30%; margin-right: 30% ">Вы еще не подписаны не на один блог</h5>
            <?php else: ?>
                <?php foreach ($subs as $sub): ?>
                    <div class="col-lg-4">
                        <h2><?= $sub->title ?></h2>

                        <p><?= $sub->content ?></p>
                        <p><b>Принадлежит блогу:</b><?= $sub->blog_name ?></p>

                        <p> <?= Html::a('Перейти&raquo;', ['view-materials', 'id' => $sub->mat_id],
                                ['class' => 'btn btn-outline-secondary']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <hr>
    </div>
</div>
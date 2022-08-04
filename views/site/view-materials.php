<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Materials */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materials-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>

<!--            Пользователь не может подписаться сам на себя-->
            <?php if (!($model->blog->user_id == Yii::$app->user->identity->getId())): ?>
                <?= Html::a('Subscript',
                    ['subscription', 'id' => $model->id, 'blog_id' => $model->blog_id, 'user_id' => 1],
                    ['class' => 'btn btn-warning']) ?>
            <?php endif; ?>

<!--            Статью редактировать может только пользователь, который создал ее-->
            <?php if ($model->blog->user_id == Yii::$app->user->identity->getId()): ?>
                <?= Html::a('Update', ['update-materials', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete-materials', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
        ],
    ]) ?>

</div>

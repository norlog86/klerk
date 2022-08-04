<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;


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
                    [
                        'subscription',
                        'id' => $model->id,
                        'blog_id' => $model->blog_id,
                        'user_id' => Yii::$app->user->getId(),
                    ],
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

    <p><?= $model->content ?></p>

    <p><b>Принадлежит блогу:</b><?= $model->blog->name ?></p>
    <hr>
    <b>Комментарии</b>

        <?php foreach ($comments as $comment): ?>
            <div style="background: aliceblue">
                <p><?= $comment->user->name . ': ' . $comment->content ?>
                    <?php if ($comment->user_id == Yii::$app->user->getId()): ?>
                    <?= Html::a('delete', ['delete-comment', 'id' => $comment->id, 'material_id' => $model->id]) ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php if (Yii::$app->user->isGuest): ?>
        <p>комментарии могут оставлять только авторизованные пользователи</p>
    <?php else: ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($new_comment, 'content')->label('Отправить комментарий') ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    <?php endif; ?>
</div>

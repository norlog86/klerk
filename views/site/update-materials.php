<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materials */

$this->title = 'Update Materials: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materials-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-materials', [
        'model' => $model,
    ]) ?>

</div>

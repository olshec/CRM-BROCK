<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distributer */

$this->title = 'Обновить поставщика: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Distributers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idDistributer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distributer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

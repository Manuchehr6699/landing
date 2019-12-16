<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FundingScheme */

$this->title = 'Update Funding Scheme: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Funding Schemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="funding-scheme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CallForProposal */

$this->title = 'Update Call For Proposal: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Call For Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="call-for-proposal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use app\modules\admin\models\ModelStatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProgrammeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programmes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Programme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ModelStatus::getNotify() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'status',
            'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

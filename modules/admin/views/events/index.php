<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="card">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'title',
//                'description:ntext',
                'date_from',
                'date_to',
                'category_id',
                'photo',
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'status',

                    'editableOptions' => array(
                        'formOptions' => array('action' => array('/admin/editable/change-event-status')),
                        'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => array(1 => 'Active', 0 => 'Inactive'),
                        'displayValueConfig' => array(
                            '0' => '<span class="glyphicon glyphicon-remove-sign" style="font-size:25px;color:#C9302C"></span>',
                            '1' => '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px;color:#449D44"></span>',
                        ),
                    ),
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'filter' => array(1 => 'Active', 0 => 'Inactive'),
                    'pageSummary' => true
                ],
                //'created_at',
                //'created_by',
                //'updated_at',
                //'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
</div>

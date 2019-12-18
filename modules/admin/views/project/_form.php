<?php

use app\modules\admin\models\ModelStatus;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'grant_agreement_id')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           <?= $form->field($model, 'description')->widget(TinyMce::className(), [
               'options' => ['rows' => 20],
               'language' => 'en-US',
               'clientOptions' => [
                   'plugins' => [
                       "advlist autolink lists link charmap print preview anchor",
                       "searchreplace visualblocks code fullscreen",
                       "insertdatetime media image table contextmenu paste"
                   ],
                   'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
               ]
           ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?= $form->field($model, 'objective')->widget(TinyMce::className(), [
                'options' => ['rows' => 20],
                'language' => 'en-US',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media image table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Date start - Date end</label>
            <div class="input-group input-daterange" data-provide="datepicker">
                <input type="text" class="form-control" name="start" value="<?= $model->start_date ?>">
                <div class="input-group-addon"> To </div>
                <input type="text" class="form-control" name="end" value="<?= $model->end_date ?>">
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true])->label('Link to (cordis.europa.eu)') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->dropDownList(ModelStatus::listData()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

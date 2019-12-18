<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-categories-form">

   <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
           <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-12">
           <?= $form->field($model, 'description')->widget(TinyMce::className(), [
               'options' => ['rows' => 15],
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
           <?= $form->field($model, 'status')->dropDownList(\app\modules\admin\models\ModelStatus::listData()) ?>
        </div>
    </div>

    <div class="form-group">
       <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

   <?php ActiveForm::end(); ?>

</div>

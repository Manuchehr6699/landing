<?php

use app\modules\admin\models\ModelStatus;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="topic-form">
    <?php if (!empty($topics)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample1">
                    <div class="card bg-gradient10">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <a class=" collapsed" data-toggle="collapse" data-target="#collapseOne"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    Show Topics List
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample1">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <?php foreach ($topics as $topic): ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $topic['name'] ?></td>
                                                        <td><?= $topic['description'] ?></td>
                                                        <td><?= $topic['status'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <?php $form = ActiveForm::begin(['action' => '/admin/project/add-topic']); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
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
            <?= $form->field($model, 'status')->dropDownList(ModelStatus::listData()) ?>
        </div>
        <div class="col-md-12">
            <?php if (!empty($projectId)): ?>
                <?= $form->field($model, 'project_id')->hiddenInput(['value' => $projectId])->label(false) ?>
            <?php else: ?>
                <?= $form->field($model, 'project_id')->dropDownList(ArrayHelper::map(\app\models\Project::getItems(), 'id', 'title')) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

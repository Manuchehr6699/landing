<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */

$this->title = Yii::t('yii2mod.settings', 'Update Setting: {0} -> {1}', [$model->section, $model->key]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii2mod.settings', 'Update Setting');
?>
<div class="setting-update">

<!--    <h3>--><?php //echo Html::encode($this->title); ?><!--</h3>-->

    <?php echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>

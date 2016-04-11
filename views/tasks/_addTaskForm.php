<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
?>


<div class="tasks-list">

    <?php $form = ActiveForm::begin(['options' => ['id'=>'addTaskForm'] ] ); ?>

        <?= $form->field($model, 'task') ?>
        <?= $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::classname(), ['language' => 'ru','dateFormat' => 'yyyy-MM-dd',  ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Добавить задачу'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tasks-list -->
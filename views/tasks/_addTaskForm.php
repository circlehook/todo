<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->registerJs(
   '$("document").ready(function(){ 
        $("#add_task").on("pjax:end", function() {
            $.pjax.reload({container:"#tasks"});  
        });
    });'
);

?>


<div class="tasks-list">
<? Pjax::begin(['id' => 'add_task']); ?>
    <?php $form = ActiveForm::begin(['options' => [ 'data-pjax' => true] ] ); ?>

        <?= $form->field($model, 'task') ?>
        <?= $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::classname(), ['language' => 'ru','dateFormat' => 'yyyy-MM-dd',  ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Добавить задачу'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
  <? Pjax::end(); ?>
</div><!-- tasks-list -->
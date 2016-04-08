<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;


$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_comment").on("pjax:end", function() {
            $.pjax.reload({container:"#comment_uniq"});  
        });
    });'
);

?>

<div class="tasks-list">
	<? Pjax::begin(['id' => 'new_comment']); ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true] ]); ?> 

        <?= $form->field($model, 'username')->input(['value' => 'hidden value']) ?>
        <?= $form->field($model, 'comment') ?>
        
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Добавить комментарий'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    <? Pjax::end(); ?>
</div><!-- tasks-list -->
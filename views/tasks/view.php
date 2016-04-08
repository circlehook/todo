<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['list']];

echo  $this->registerJs(
       "$('#checkbox-name').change(function(){
            $.ajax({
                type     :'get',
                url  : 'index.php?r=tasks/switch',
                data: 'id=".$task['id']."',
                success  : function(result) {
                    if(result == 0){
                        $('#task-label').removeClass();
                        $('#task-label').addClass('normal-internal');
                    }else{
                        $('#task-label').removeClass();
                        $('#task-label').addClass('done-internal');
                    }
                    
                }
            });
        });"

    );
?>

<? $switch = ( $task['status'] == 0 ) ? false : true; ?>
<? $statusClass = ( $task['status'] == 0 ) ? 'normal-internal' : 'done-internal'; ?>


<div class="tasks-index">

   
    <?= Html::checkbox('checkbox-name', $switch, ['id'=>'checkbox-name'] );  ?>

    <div id="task-label" class="<?= $statusClass ?>">
        <?= $task['task']  ?>   
    <br/>
        (<?= $task['deadline'] ?>)
    </div>
    <br/><br/>

    <? Pjax::begin(['id' => 'comment_uniq']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>"",
        'columns' => [
           
            'username',
            'comment',
            ['class' => 'yii\grid\ActionColumn', 'template' => ' {delete}', 'controller' => 'comments'],
        ],
    ]); ?>
    <? Pjax::end(); ?>

</div>


<?= $this->render('_comment', [
        'model' => $model,
    ]) 
?>


<style>
    


</style>


 
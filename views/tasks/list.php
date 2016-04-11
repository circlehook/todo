<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;

echo  $this->registerJs(
    "$(document).on('change','.checkbox', function(){

            var taskId = $(this).attr('taskId');

            $.ajax({
                type     :'get',
                url  : 'index.php?r=tasks/switch',
                data: 'id='+taskId,
                success  : function(result) {
                    if(result == 0){
                        $('#task-label').removeClass();
                        $('#task-label').addClass('normal');
                    }else{
                        $('#task-label').removeClass();
                        $('#task-label').addClass('done');
                    }

                    $.pjax.reload({container:'#tasks'});


                }
            });
        });"
);


?>

<div class="tasks-index">

    <? Pjax::begin(['id' => 'tasks' ); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => "",
                'format' => 'raw',
                'value' => function($data)
                {
                    if( $data['status'] == 0 )
                        return Html::checkbox('', false, [ "class" =>  'checkbox', 'taskId' => $data['id'], 'value'=> 0]);
                    else
                        return Html::checkbox('', true, [ "class" =>  'checkbox','taskId' => $data['id'], 'value'=> 1]);
                },
            ],
            [
                'attribute' => 'task',
                'label' => Yii::t('app','Task'),
                'format' => 'raw',
                'value' => function($data) {
                    if( $data['status'] == 0 )
                        return Html::a( $data['task'], Url::to(['tasks/view', 'id' => $data['id']]));
                    else
                        return Html::a( $data['task'], Url::to(['tasks/view', 'id' => $data['id']]), ['class' => 'done']);
                }

            ],
            'deadline',
            'count',
             ['class' => 'yii\grid\ActionColumn', 'template' => ' {delete}', 'controller' => 'tasks'],
        ],
    ]); ?>
    <? Pjax::end(); ?>
</div>


<?php

    echo $this->render('_addTaskForm', [
        'model' => $model,
    ]);

?>
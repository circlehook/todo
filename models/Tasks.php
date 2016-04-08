<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property string $id
 * @property string $task
 * @property integer $status
 * @property string $deadline
 * @property string $count
 */
class Tasks extends \yii\db\ActiveRecord
{
     /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task', 'deadline'], 'required'],
            [['count'], 'integer'],
            [['count'], 'default', 'value' => 0],
            [['status'], 'boolean'],
            [['status'], 'default', 'value' => 0],
            [['deadline'], 'safe'],
            [['task'], 'string', 'max' => 50],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'task' => Yii::t('app', 'Task'),
            'status' => Yii::t('app', 'Status'),
            'deadline' => Yii::t('app', 'Deadline'),
            'count' => Yii::t('app', 'Count'),
        ];
    }

// =================================================
    /*
    *   Add new task 
    */
    public function add($task, $deadline)
    {
        $newTask = new Tasks();
        $newTask->task      = $task;
        $newTask->deadline  = $deadline;
        $newTask->save();
    }    

    /*
    *   change task Status
    */
    public function changeStatus($id) 
    {
        $task = Tasks::findOne(['id' => $id]);
        $status = $task->status;

        $task->status = ( $status == 0 ) ? 1 : 0;

        if ( $task->save() ) {
            return $task->status;
        }

        
    }
}

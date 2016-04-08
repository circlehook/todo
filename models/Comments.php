<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $username
 * @property string $comment
 * @property string $date_create
 */
class Comments extends \yii\db\ActiveRecord
{
    public $status;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'comment'], 'required'],
            [['comment'], 'string'],
            [['date_create'], 'safe'],
            [['username'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'comment' => Yii::t('app', 'Comment'),
            'date_create' => Yii::t('app', 'Date Create'),
        ];
    }

// =================================================
    /*
    *   Add new comment / count task ++ 
    */
    public function add($id_task, $username, $comment)
    {
        $newComment = new Comments();
        $newComment->id_task    = $id_task;
        $newComment->username   = $username;
        $newComment->comment    = $comment;
        if($newComment->save())
        {
            $task = Tasks::findOne([ 'id' => $id_task ]);
            $task->count = $task->count+1;
            $task->save();


        }

    }  

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int|null $user_id
 * @property int|null $blog_id
 *
 * @property Blogs $blog
 * @property Users $user
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'blog_id'], 'integer'],
            [
                ['blog_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Blogs::className(),
                'targetAttribute' => ['blog_id' => 'id'],
            ],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Users::className(),
                'targetAttribute' => ['user_id' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'blog_id' => 'Blog ID',
        ];
    }

    /**
     * Gets query for [[Blog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blogs::className(), ['id' => 'blog_id']);
    }

    public function getSubscript($blog_id, $user_id)
    {
        $this->blog_id = $blog_id;
        $this->user_id = $user_id;

        if ($this->save()) {
            return true;
        } else {
            die('Error save');
        }

    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}

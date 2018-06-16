<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property int $id
 * @property int $sender_id
 * @property int $recipient_id
 */
class Rooms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender_id', 'recipient_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_id' => 'Sender ID',
            'recipient_id' => 'Recipient ID',
        ];
    }
}

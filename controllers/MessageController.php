<?php

namespace app\controllers;

use app\models\Messages;
use app\models\Rooms;
use app\models\User;

class MessageController extends AppController
{
    public function actionIndex()
    {
        $dialogs = $this->getDialogs();
        $user = $this->getUser();
//        echo '<pre>';
//        print_r($dialogs);
//        echo '</pre>';
        return $this->render('index',[
            'dialogs' => $dialogs,
            'user' => $user
        ]);
    }

    public function actionShow($id) {
        // id комнаты
        $messages = $this->getMessages($id);
        $room = Rooms::findOne($id);
        if((int)$room->recipient_id ==  \Yii::$app->user->id) {
            $recipient = $this->getRecipient($room->sender_id);
        } else {
            $recipient = $this->getRecipient($room->recipient_id);
        }

        $user = $this->getUser();
//        echo '<pre>';
//        print_r($recipient);
//        echo '</pre>';
        return $this->render('show',[
            'user' => $user,
            'recipient' => $recipient,
            'messages' => $messages,
            'room' => $room
        ]);
    }

    protected function getRecipient($id) {
        return User::findOne($id);
    }



    public function getMessages($id) {
        $messages = Messages::find()->where(['room_id'=>$id])->all();
        return $messages;
    }

    public function getUser() {
        return User::findOne(\Yii::$app->user->id);
    }

    public function getDialogs() {
        $userId = \Yii::$app->user->id;
        $rooms = Rooms::find()->select('*')->where(['sender_id'=>$userId])->orWhere(['recipient_id'=>$userId])->asArray()->all();
        $roomsIds = array();
        $c = count($rooms);
        for($i = 0; $i < $c; $i++) {
            $lastMessage = Messages::find()->where(['room_id'=>$rooms[$i]['id']])->orderBy(['date'=>SORT_DESC])->one();
            // to do - change this logic !!!
            $sender = User::findOne($rooms[$i]['sender_id']);
            if((int)$rooms[$i]['recipient_id'] === (int)$userId) {
                $recipient = User::findOne($rooms[$i]['sender_id']);
            } else {
                $recipient = User::findOne($rooms[$i]['recipient_id']);
            }
            $rooms[$i]['lastMessage'] = $lastMessage;
            $rooms[$i]['sender'] = $sender;
            $rooms[$i]['recipient'] = $recipient;
        }
//        $dialogs = Messages::find()->where(['in','room_id',$roomsIds])->all();
        return $rooms;
    }

}

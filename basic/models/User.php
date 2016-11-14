<?php

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Class User
 *
 * @package app\models
 */
class User extends ActiveRecord
{
    public function getLikes() {
        return $this->hasMany(Like::className(),['user_id' => 'id']);
    }
}

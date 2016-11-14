<?php

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Class User
 *
 * @package app\models
 */
class Post extends ActiveRecord
{
    public function fields() {
        return [
'id',
'parent_id',
'user_id',
'created_when',
'created_at',
'description',
            'likes',
'subposts'
        ];
    }

    public function getLikes() {
        return $this->hasMany(Like::className(),['post_id' => 'id']);
    }
    
    public function getSubposts() {
        return $this->hasMany(Post::className(),['parent_id' => 'id']);
    }
}

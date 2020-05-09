<?php


namespace app\common\model;


use app\common\service\Token;
use think\Model;

class Stage extends Model
{
    protected $autoWriteTimestamp = true;
    public function onBeforeInsert($model)
    {
        $model->setAttr('general_branch_id',Token::getCurrentTokenVar('general_branch_id'));
    }
    public function userBranch()
    {
        return $this->belongsToMany('user_branch','user_state','casid','stage_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class,'user_state','casid','stage_id');
    }
    public function userState()
    {
        return $this->hasMany('user_state','stage_id','id');
    }
    public function task()
    {
        return $this->hasMany(Task::class,'stage_id','id');
    }

}
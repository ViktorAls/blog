<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 07.02.2019
 * Time: 13:00
 */

namespace frontend\models;


use yii\base\Model;

class ProfileSettingsForm extends Model
{

    public $file;

    public function rules()
    {
        return [['file'],'image'];
    }


}
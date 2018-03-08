<?php

/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 7/26/2017
 * Time: 2:34 PM
 */
/**
 * This is the model class for table "photos".
 *
 * The followings are the available columns in table 'photos':
 * @property integer $id
 * @property string $image_url
 */
class Ad extends MyActiveRecord
{
    public function getDbConnection()
    {
        return self::getAdvertDbConnection();
    }
}
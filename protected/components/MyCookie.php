<?php
  
class MyCookie extends CWebUser
{
    public static function myHasCookie($name)
      {
        return !empty(Yii::app()->request->cookies[$name]->value);
      }

      public static function myGetCookie($name)
      {
        return Yii::app()->request->cookies[$name]->value;
      }

      public static function mySetCookie($name, $value)
      {
        $cookie = new CHttpCookie($name,$value);
        Yii::app()->request->cookies[$name] = $cookie;
      }

      public static function myRemoveCookie($name)
      {
        unset(Yii::app()->request->cookies[$name]);
      }
}

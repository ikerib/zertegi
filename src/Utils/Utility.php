<?php


namespace App\Utils;



class Utility {

    public function check_key_value_is_in_array($key, $value, $array):bool
    {
      if ( ! array_key_exists($key,$array)) {
          return false;
      }

      if ( !in_array($value, $array[ $key ], true)) {
          return false;
      }

      return true;
    }

}

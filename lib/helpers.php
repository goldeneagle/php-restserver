<?php

/*
 * Rest Server - helper functions
 *
 * (c) August 2011 - Manuel Odendahl - wesen@ruinwesen.com
 */

namespace REST;

function array_clean($array, $allowed_keys) {
  foreach ($array as $k => $v) {
    if (!in_array($k, $allowed_keys)) {
      unset($array[$k]);
    }
  }
  return $array;
}

function object_set_options($obj, $options, $allowed_keys = array()) {
  $options = array_clean($options, $allowed_keys);
  
  foreach ($options as $k => $v) {
    $obj->$k = $v;
  }
}

function var_dump_str($obj) {
  ob_start();
  var_dump($obj);
  return ob_get_clean();
}

function get_class_name($object = null) {
  if (!is_object($object) && !is_string($object)) {
    return false;
  }
    
  $class = explode('\\', (is_string($object) ? $object : get_class($object)));
  return $class[count($class) - 1];
}

function debug_log($str, $level = "NOTICE") {
  global $DEBUG;
  if (in_array($level, $DEBUG)) {
    error_log($str);
  }
}

?>
<?php

$array = array(
  array(
    'id' => 2,
    'parent' => 0,
    'name' => 'category-2'
  ),
  array(
    'id' => 8,
    'parent' => 0,
    'name' => 'category-2'
  ),
  array(
    'id' => 13,
    'parent' => 12,
    'name' => 'category-2'
  ),
  array(
    'id' => 3,
    'parent' => 2,
    'name' => 'category-2'
  ),
  array(
    'id' => 4,
    'parent' => 2,
    'name' => 'category-3'
  ),
  array(
    'id' => 6,
    'parent' => 3,
    'name' => 'category-3'
  ),
  array(
    'id' => 1,
    'parent' => 0,
    'name' => 'category-1'
  ),

  array(
    'id' => 9,
    'parent' => 7,
    'name' => 'category-1'
  ),

  array(
    'id' => 12,
    'parent' => 0,
    'name' => 'category-1'
  ),

  array(
    'id' => 10,
    'parent' => 8,
    'name' => 'category-1'
  ),
  array(
    'id' => 14,
    'parent' => 8,
    'name' => 'category-1'
  ),
  array(
    'id' => 7,
    'parent' => 3,
    'name' => 'category-1'
  ),

);


$nosort = $array;

recursive( $array, $nosort );

foreach( $array as $key => $val ){
  if( $val['parent'] !== 0 ){
    unset( $array[$key] );
  }
}
array_values( $array );

debug($array);

function recursive( &$array, &$nosort ){

  foreach( $array as $key => &$val ){
    $child = array_filter( $nosort, function( $v ) use( $val ){
      return $v['parent'] == $val['id'];
    });
    
    if( empty( $child ) ){
      continue;
    }
    
    foreach( $child as $k => $v ){
      $val['child'][] = $v;
    }

    recursive( $val['child'], $nosort );
  }

}




function debug($val){
  print '<pre>';
  print_r($val);
  print '</pre>';
}
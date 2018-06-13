<?php
namespace MS\Core\Patch;


class DB {


public $m="_Master";
public $d="_Data";
public $basePath='MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR;
public $loadArray=[];


public static function load(){

	

}


public static function loadUnit($module){

	$return[$module.$this->m]=[
								'driver' => 'sqlite',
  						        'database' => base_path($this->basePath.$module.$this->m),
   								'prefix' => '',
							];

	$return[$module.$this->d]=[
								'driver' => 'sqlite',
  						        'database' => base_path($this->basePath.$module.$this->d),
   								'prefix' => '',
							];



}










	  // 'IM_Master' => [
   //          'driver' => 'sqlite',
   //          'database' => base_path('MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR.'IM_Master'),
   //          'prefix' => '',
   //      ],


   //      'IM_Data' => [
   //          'driver' => 'sqlite',
   //          'database' => base_path('MS'.DIRECTORY_SEPARATOR.'DB'.DIRECTORY_SEPARATOR.'Master'.DIRECTORY_SEPARATOR.'IM_Data'),
   //          'prefix' => '',
   //      ],

}
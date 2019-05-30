<?php

namespace App\Exceptions;

use RuntimeException;

class SomthingWentWrongException extends RuntimeException
{
   public $LanguageLine;
   
   public function __construct($mes)
   {
	   $this->LanguageLine	=	$mes;
   }
   
}

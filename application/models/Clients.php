<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Clients extends Eloquent
{
    protected $primaryKey = 'emailClt';
    protected $keyType    = 'string';
    
    public $timestamps   = false;

}

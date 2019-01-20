<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Adminroots extends Eloquent
{
    protected $primaryKey = 'id_admin';
    protected $keyType    = 'string';

    public $incrementing = false;
    public $timestamps   = false;
}

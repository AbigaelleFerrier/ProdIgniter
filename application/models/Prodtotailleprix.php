<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Prodtotailleprix extends Eloquent
{
    protected $primaryKey   = ['idRef', 'idTailleProd'];
    public    $incrementing = false;
    protected $keyType      = 'string';
    public $timestamps   = false;

}

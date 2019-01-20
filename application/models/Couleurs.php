<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Couleurs extends Eloquent
{
    protected $primaryKey = 'refCouleur';
    protected $keyType    = 'string';

    public $incrementing = false;
    public $timestamps   = false;
}

<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categories extends Eloquent
{
    protected $primaryKey = 'idCateg';
    //protected $keyType    = 'string';

    //public $incrementing = false;
    public $timestamps   = false;

    public function Categoriesous() {
        return $this->hasMany('Categoriesous', 'idCateg');
    }
}

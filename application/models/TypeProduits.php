<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Typeproduits extends Eloquent
{
    protected $primaryKey = 'idTypeProd';
    //protected $keyType    = 'string';

    //public $incrementing = false;
    public $timestamps   = false;

    public function Produits() {
        return $this->hasMany('Produits', 'idTypeProd');
    }
}

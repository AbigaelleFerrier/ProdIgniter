<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tailleproduits extends Eloquent
{
    protected $primaryKey = 'idTailleProd';
    //protected $keyType    = 'string';

    //public $incrementing = false;
    public $timestamps   = false;

    public function Produits()
    {
        return $this->belongsToMany('Produits', 'prodtotailleprixes', 'idTailleProd' , 'idRef');
    }
}

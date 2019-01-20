<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Produits extends Eloquent
{
    protected $primaryKey = 'idRef';
    protected $keyType    = 'string';

    public $incrementing = false;
    public $timestamps   = false;


    public function Tailleproduits()
    {
        return $this->belongsToMany('Tailleproduits', 'prodtotailleprixes', 'idRef' ,'idTailleProd');
    }

    public function Categoriesous()
    {
        return $this->belongsToMany('Categoriesous', 'prodtocategs', 'idRef' ,'idCategS');
    }

    public function Typeproduits()
    {
        return $this->belongTo('Typeproduits', 'idTypeProd', 'idTypeProd');
    }

}

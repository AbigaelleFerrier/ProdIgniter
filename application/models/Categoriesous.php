<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categoriesous extends Eloquent
{
    protected $primaryKey = 'idCategS';
    public  $timestamps   = false;

    public function Produits()
    {
        return $this->belongsToMany('Produits', 'prodtocategs', 'idCategS' ,'idRef');
    }

    public function Categories()
    {
        return $this->belongTo('Categories', 'idCateg', 'idCateg');
    }
}

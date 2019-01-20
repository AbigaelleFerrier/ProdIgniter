<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Prodtocategs extends Eloquent
{
    protected $primaryKey   = ['idRef', 'idCategS'];
    public    $incrementing = false;
    protected $keyType      = 'string';
    public    $timestamps   = false;

}

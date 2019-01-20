<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Footer extends Eloquent
{
    protected $primaryKey = 'id_footer';

    public $incrementing = false;
    public $timestamps   = false;
}

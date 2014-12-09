<?php

namespace Model;

use Eloquent;

class Product extends Eloquent {

	protected $table = 'products';
	protected $guarded = array('id');

}

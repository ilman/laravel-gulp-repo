<?php

namespace Model;

use Eloquent;

class Company extends Eloquent {

	protected $table = 'companies';
	protected $guarded = array('id');

}

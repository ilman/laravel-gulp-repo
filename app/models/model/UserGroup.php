<?php

namespace Model;

use Eloquent;

class UserGroup extends Eloquent {

	protected $table = 'groups';
	protected $guarded = array('id');

}

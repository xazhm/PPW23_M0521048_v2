<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
/**
* Get the accounts associated with the role.
*/
public function accounts()
{
return $this->belongsToMany(Account::class);
}
}
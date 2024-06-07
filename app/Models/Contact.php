<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'group_id']; // Change 'group' to 'group_id'

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

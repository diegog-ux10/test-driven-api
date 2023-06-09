<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    public $id;
    protected $fillable = ['name'];
    protected $guarded = array('id', 'password');
}

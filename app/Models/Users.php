<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
    	"username",
    	"password",
    	"pid",
    	"points",
    ];

    protected $hidden = [
    	"_token",
    ];

    public static function getUserByUsername($username)
	{
	    return self::find($username);
	}

    // 模型文件
    public function children() {
        return $this->hasMany(get_class($this), 'pid' ,'id');
    }

    public function allChildren() {
        return $this->children()->with( 'allChildren' );
    }

}
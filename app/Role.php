<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    // protected $fillable = [
    //     'name', 'slug', 'description', 'permissions',
    // ];
    protected $casts = [
        'permissions' => 'array',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }
    private function hasPermission(string $permissions) : bool
    {
        return $this->permissions[$permissions] ?? false;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($role) {
            $relationMethods = ['users'];

            foreach ($relationMethods as $relationMethod) {
                if ($role->$relationMethod()->count() > 0) {
                    session()->put('deletefailed',"Role ");
                    return false;
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}

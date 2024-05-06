<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserType;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DeletedBy;
class User extends Authenticatable
{

    use HasFactory, Notifiable , HasRoles , SoftDeletes , DeletedBy;
    // use HasFactory, Notifiable , HasRoles , SoftDeletes ;


    // protected static function booted(): void
    // {
        
    //     static::deleting(function (User $modal) {
    //     dd('fdfddd');
    //         // 
    //         $modal->deleted_by = Auth::id();
    //         $modal->save();
    //     });
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'super_admin' => 'boolean' , 
            'is_blocked' => 'boolean' , 
            'type' => UserType::class,
            'last_logged_in' => 'datetime'
        ]; 
    }


    public function isSuperAdmin()
    {
        if ($this->super_admin === true ) {
            return true;
        }

        return false;
    }


    public function addedBy()
    {
        return $this->belongsTo(User::class , 'added_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class , 'deleted_by');
    }
}

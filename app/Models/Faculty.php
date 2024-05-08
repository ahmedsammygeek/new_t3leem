<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DeletedBy;
class Faculty extends Model
{
    use HasFactory ,  SoftDeletes , DeletedBy ;
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' )->withTrashed();
    }
}

<?php

namespace App\Traits;
use Auth;
trait DeletedBy
{

    protected static function booted(): void
    {
        static::deleting(function ($object) {
            $object->deleted_by = Auth::id();
            $object->save();
        });
    }
}

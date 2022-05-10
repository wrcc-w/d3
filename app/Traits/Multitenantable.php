<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Multitenantable{

    protected  static  function booted(){
        if (Auth::check() && ! in_array(Auth::id(), getAdminUserIds())) {
            static::saving(function ($modal) {
                $modal->tenant_id = Auth::user()->tenant_id;
            });
        } else {
            static::saving(function ($modal) {
                $modal->tenant_id = $modal->tenant_id;
            });
        }
    }

}

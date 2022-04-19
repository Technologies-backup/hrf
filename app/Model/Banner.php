<?php

namespace App\Model;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Banner extends Model
{
    protected $casts = [
        'published'  => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function translations(){
        return $this->morphMany('App\Model\Translation', 'translationable');
    }

    public function getPhotoAttribute($phone){
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $phone;
        }
        return $this->translations[0]->value ?? $phone;
    }

    public function getUrlAttribute($url){
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $url;
        }
        return $this->translations[0]->value ?? $url;
    }

    protected static function boot(){
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                if (strpos(url()->current(), '/api')){
                    return $query->where('locale', App::getLocale());
                }else{
                    return $query->where('locale', Helpers::default_lang());
                }
            }]);
        });
    }

}

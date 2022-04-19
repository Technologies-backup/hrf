<?php

namespace App\Model;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class BusinessSetting extends Model
{
    public function translations()
    {
        return $this->morphMany('App\Model\Translation', 'translationable');
    }

    public function getValueAttribute($value)
    {
        if(in_array($this->type, ['about_us', 'terms_condition', 'privacy_policy', 'terms_condition_seller'])){
            if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
                return $value;
            }

            if (strpos(url()->current(), '/api')){
                return $this->translations()->where('locale', App::getLocale())->first()->value ?? $value;
            }else{
                return $this->translations()->where('locale', Helpers::default_lang())->first()->value ?? $value;
            }
        }
        return $value;
        // return $this->translations[0]->value ?? $value;
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope('translate', function (Builder $builder) {
    //         $builder->with(['translations' => function ($query) {
    //             if (strpos(url()->current(), '/api')){
    //                 return $query->where('locale', App::getLocale());
    //             }else{
    //                 return $query->where('locale', Helpers::default_lang());
    //             }
    //         }]);
    //     });
    // }
}

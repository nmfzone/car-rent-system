<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('date_range_format', function($attribute, $value, $parameters, $validator) {
            try {
                $value = explode(' - ', $value);

                $getHour = function ($date) {
                    return explode(':', explode(' ', $date)[1])[0];
                };

                if (($hour = (int) $getHour($value[0])) < 10) {
                    $value[0] = str_replace($hour.':', '0'.$hour.':', $value[0]);
                }

                if (($hour = (int) $getHour($value[1])) < 10) {
                    $value[1] = str_replace($hour.':', '0'.$hour.':', $value[1]);
                }

                $dateStart = Carbon::createFromFormat($parameters[0], $value[0]);
                $dateEnd = Carbon::createFromFormat($parameters[0], $value[1]);
            } catch (\Exception $e) {
                return false;
            }

            return $dateStart && $dateEnd
                && ($dateStart->format($parameters[0]) == $value[0])
                && ($dateEnd->format($parameters[0]) == $value[1]);

        });
        Validator::replacer('date_range_format', function($message, $attribute, $rule, $parameters) {
            return str_replace(':format', $parameters[0], $message);
        });

        Validator::extend('date_end_more_than_date_start', function($attribute, $value, $parameters, $validator) {
            try {
                $value = explode(' - ', $value);

                $dateStart = Carbon::createFromFormat($parameters[0], $value[0]);
                $dateEnd = Carbon::createFromFormat($parameters[0], $value[1]);
            } catch (\Exception $e) {
                return false;
            }

            return $dateEnd->gt($dateStart);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

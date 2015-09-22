<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 12-Jul-2015
 * Time: 23:17
 */

namespace app\Helpers\Validators;
use Illuminate\Validation\Validator;


class MainMetaValidator extends Validator
{
    public static function validationRules()
    {
        return [
            'title' => 'min:10|max:70',
            'description' => 'min:20|max:160',
            'keywords' => 'min:3|max:255',
            'google_analytics_code' => 'max:20',
            'yandex_verification' => 'max:70',
            'bing_verification' => 'max:70',
        ];
    }
}
<?php

namespace App;

/**
 * Description of Serie
 *
 * @author arasm_000
 */
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    protected $fillable = ['variable', 'value'];

    public static function set($variable, $value) {
        $var = static::whereVariable($variable)->first();
        $var->value = $value;
        $var->save();
    }

    public static function get($variable) {
        $var = static::whereVariable($variable)->first();
        if (!is_object($var)) {
            $var = static::create(['variable' => $variable, 'value' => '']);
        }
        return $var->value;
    }

    public static function getLike($variable) {
        return static::where('variable', 'like', '%' . $variable);
    }

    public static function getSocialLinks() {
        $vars = static::getLike('link')->where('value', '<>', '')->get();
        $ret = [];
        $vars->each(function($obj) use (&$ret) {
            $ret[] = explode('_', $obj->variable)[0];
        });
        return $ret;
    }

    public static function updateMany($values) {
        foreach ($values as $variable => $values) {
            Configuration::set($variable, $values);
        }
    }

}

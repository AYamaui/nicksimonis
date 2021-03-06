<?php

namespace App;

/**
 * Description of Serie
 *
 * @author arasm_000
 */
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $touches = ['serie'];

    public function getSizes($f)
    {
        $ret = [];
        $f->photos_getSizes($this->id);
        $rep = json_decode($f->response);
        foreach ($rep->sizes->size as $size) {
            switch ($size->label) {
                case "Thumbnail":
                    $ret['thumbnail_source'] = $size->source;
                    break;
                case "Large":
                    $ret['original_source'] = $size->source;
                    break;
            }
        }

        return $ret;
    }

    public function serie()
    {
        return $this->belongsTo('App\Serie');
    }

}

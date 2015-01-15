<?php

namespace App;

/**
 * Description of Serie
 *
 * @author arasm_000
 */
use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    public function getSizes($f) {
        $ret = [];
        $f->photos_getSizes($this->id);
        $rep = json_decode($f->response);
        foreach ($rep->sizes->size as $size) {
            switch ($size->label) {
                case "Thumbnail":
                    $ret['thumbnail_source'] = $size->source;
                    break;
                case "Original":
                    $ret['original_source'] = $size->source;
                    break;
            }
        }
        return $ret;
    }

}

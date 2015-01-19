<?php

namespace App;

/**
 * Description of Serie
 *
 * @author arasm_000
 */
use Illuminate\Database\Eloquent\Model;
use App\Helpers\phpFlickr;
use Carbon\Carbon;

class Serie extends Model {

    public static function deleteSerie($id) {
        $serie = Serie::find($id);
        $serie->photos()->delete();
        $serie->delete();
    }

    public static function storeFromFlickr($f, $type) {
        $f->photosets_getList();
        $response = json_decode($f->response);
        foreach ($response->photosets->photoset as $album) {
            if ($type == "all") {
                $serie = Serie::findOrNew($album->id);
            } else {
                $serie = Serie::find($album->id);
                if (!is_object($serie)) {
                    continue;
                }
            }
            $serie->id = $album->id;
            $serie->title = $album->title->_content;
            $serie->description = $album->description->_content;
            $serie->save();
            $serie->loadPhotos($f);
        }
    }

    public function loadPhotos($f) {
        if ($this->id != "" && $this->id != 0) {
            $this->photos()->delete();
            $f->photosets_getPhotos($this->id);
            $response = json_decode($f->response);
            foreach ($response->photoset->photo as $ph) {
                $photo = Photo::findOrNew($ph->id);
                $photo->id = $ph->id;
                $photo->title = $ph->title;
                $ret = $photo->getSizes($f);
                $photo->thumbnail_source = $ret['thumbnail_source'];
                $photo->original_source = $ret['original_source'];
                $this->photos()->save($photo);
                //if the photo is the primary..
                if ($ph->isprimary) {
                    $this->thumbnail_source = $ret['thumbnail_source'];
                    $this->original_source = $ret['original_source'];
                    $this->save();
                }
            }
        }
    }

    public function checkUpdate() {
        $lastUpdate = $this->updated_at;
        //if pass more than 10 minutes update the photos inside the serie..
        if ($lastUpdate->diffInMinutes() > 10) {
            $user = User::first();
            $f = new phpFlickr(API_KEY, API_SECRET);
            $f->setToken($user->flickr_token);
            \App\Serie::storeFromFlickr($f, "update");
        }
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

}

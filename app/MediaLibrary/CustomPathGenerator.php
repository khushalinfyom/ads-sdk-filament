<?php

namespace App\MediaLibrary;

use App\Models\Qureka;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

/**
 * Class CustomPathGenerator
 */
class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $path = '{PARENT_DIR}' . DIRECTORY_SEPARATOR . $media->id . DIRECTORY_SEPARATOR;

        switch ($media->collection_name) {
            case Qureka::QUREKA_INTERSTITIAL_IMAGE;
                return str_replace('{PARENT_DIR}', Qureka::QUREKA_INTERSTITIAL_IMAGE, $path);
            case Qureka::QUREKA_NATIVE_IMAGE;
                return str_replace('{PARENT_DIR}', Qureka::QUREKA_NATIVE_IMAGE, $path);
            case Qureka::QUREKA_BANNER_IMAGE;
                return str_replace('{PARENT_DIR}', Qureka::QUREKA_BANNER_IMAGE, $path);
            case User::PROFILE;
                return str_replace('{PARENT_DIR}', User::PROFILE, $path);
            case 'default';
                return '';
        }
    }

    /**
     * @param  Media  $media
     *
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'thumbnails/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'rs-images/';
    }
}

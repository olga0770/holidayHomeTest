<?php


namespace App\Http\Controllers\Utils;

use Illuminate\Support\Facades\Storage;

/**
 * Processing of remote images.
 *
 * Class RemoteImageUtil
 * @package App\Http\Controllers\Auth\Utils
 */
class RemoteImageUtil
{

    /**
     * Make an array with the base 64 encoded images from remote storage.
     *
     * @param $posts
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function get_image_array($posts): array
    {
        $base_64_array = [];

        if (env('APP_ENV') != 'local') {

            foreach ($posts as $post) {
                if (!empty($post->image)) {
                    $contents = Storage::disk('s3')->get($post->image);
                    $base_64_img = base64_encode($contents);
                    $base_64_array[$post->id] = $base_64_img;
                }
            }
        }
        return $base_64_array;
    }
}

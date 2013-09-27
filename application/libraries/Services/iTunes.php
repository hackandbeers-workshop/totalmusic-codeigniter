<?php
require_once 'CoolCache.php';

/**
 * Wrapper Class Itunes
 */
class Itunes
{
    const CACHE_KEY = 'itunes';

    protected $apiUrl = 'https://itunes.apple.com/search';

    public function getAlbumsByArtist($artistName)
    {
//        if (false == CoolCache::getInstance()->get(self::CACHE_KEY . $artistName)) {
            $params = array();
            $params['entity'] = 'album';
            $params['media'] = 'music';
            $params['term'] = $artistName;
            $params['limit'] = 5;

            $url = sprintf('%s?%s', $this->apiUrl, http_build_query($params));
            $data = json_decode(file_get_contents($url), true);
//            CoolCache::getInstance()->set(self::CACHE_KEY . $artistName, $data);

            return $data;
//        } else {
//            return CoolCache::getInstance()->get(self::CACHE_KEY .$artistName);
//        }
    }
}

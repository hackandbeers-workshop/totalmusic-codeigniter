<?php
require_once 'CoolCache.php';

class LastFM
{
    const CACHE_KEY = 'lastfm';

    protected $apiKey = '96152410ec0303408b492d85f09fc18e';
    protected $secret = 'c31677b7ec3d382ce357e5b60e0bf7de';
    protected $format = 'json';
    protected $apiUrl = 'http://ws.audioscrobbler.com/2.0/';
    protected $artistUrl = 'artist.getinfo';

    public function getArtistInfo($name)
    {
//        if (false == CoolCache::getInstance()->get(self::CACHE_KEY . $name)) {
            $params = array();
            $params['method'] = $this->artistUrl;
            $params['artist'] = $name;
            $params['api_key'] = $this->apiKey;
            $params['format'] = $this->format;

            $url = sprintf('%s?%s', $this->apiUrl, http_build_query($params));
            $data = json_decode(file_get_contents($url), true);
//            CoolCache::getInstance()->set(self::CACHE_KEY . $name, $data);

            return $data;
//        } else {
//            return CoolCache::getInstance()->get(self::CACHE_KEY . $name);
//        }
    }
}
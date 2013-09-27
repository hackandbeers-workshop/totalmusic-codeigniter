<?php
require_once 'CoolCache.php';

class YouTube
{
    const CACHE_KEY = 'youtube';

    protected $apiKey = 'AIzaSyDBpLfYd502eOy7nYj-mVLSbD_XkB0lbFI';
    protected $apiUrl = 'https://www.googleapis.com/youtube/v3/search';

    public function getVideos($query)
    {
//        if (false == CoolCache::getInstance()->get(self::CACHE_KEY . $query)) {
            $params = array();
            $params['key'] = $this->apiKey;
            $params['q'] = $query;
            $params['part'] = 'snippet';
            $params['maxResults'] = 5;
            $params['type'] = 'video';

            $url = sprintf('%s?%s', $this->apiUrl, http_build_query($params));
            $data = json_decode(file_get_contents($url), true);
//            CoolCache::getInstance()->set(self::CACHE_KEY . $query, $data);
            return $data;
//        } else {
//            return CoolCache::getInstance()->get(self::CACHE_KEY . $query);
//        }
    }
}

<?php
require_once dirname(dirname(__DIR__)) . '/libraries/Services/' . '/YouTube.php';
require_once dirname(__DIR__) . '/video.php';

class VideoRepository
{
    protected $service;

    public function __construct()
    {
        $this->service = new YouTube();
    }

    public function findBy($criteria, $value)
    {
        if ($criteria === 'artist') {
            $videoData = $this->service->getVideos($value);
            $result = array();

            foreach ($videoData['items'] as $video) {
                $result[] = Video::createFromYoutube($video);
            }

            return $result;
        }
    }
}

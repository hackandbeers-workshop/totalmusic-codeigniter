<?php

class Video
{
    /**
     * Factory method
     *
     * @param array $youtubeData
     *
     * @return Video
     */
    public static function createFromYoutube(array $youtubeData)
    {
        $video = new self();

        $video->setTitle($youtubeData['snippet']['title']);
        $video->setDescription($youtubeData['snippet']['description']);
        $video->setPicture($youtubeData['snippet']['thumbnails']['high']['url']);
        $video->setUrl('//www.youtube.com/embed/' . $youtubeData['id']['videoId']);

        return $video;
    }

    protected $description;
    protected $picture;
    protected $title;
    protected $url;

    public function getDescription(){ return $this->description; }
    public function getPicture(){ return $this->picture; }
    public function getTitle(){ return $this->title; }
    public function getUrl(){ return $this->url; }

    public function setDescription($description){ $this->description = $description; }
    public function setPicture($picture){ $this->picture = $picture; }
    public function setTitle($title){ $this->title = $title; }
    public function setUrl($url){ $this->url = $url; }
}

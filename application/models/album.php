<?php
class Album
{
    public static function createFromItunes(array $itunesData)
    {
        $album = new self();
        $album->setTitle($itunesData['collectionName']);
        $album->setPrice($itunesData['collectionPrice']);
        $album->setPicture($itunesData['artworkUrl60']);
        return $album;
    }

    protected $title;
    protected $picture;
    protected $price;
    protected $url;

    public function getPicture(){ return $this->picture; }
    public function getPrice(){ return $this->price; }
    public function getTitle(){ return $this->title; }
    public function getUrl(){ return $this->url; }

    public function setPicture($picture){ $this->picture = $picture; }
    public function setPrice($price){ $this->price = $price; }
    public function setTitle($title){ $this->title = $title; }
    public function setUrl($url){ $this->url = $url; }
}

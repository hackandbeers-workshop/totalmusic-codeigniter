<?php

class ArtistModel
{
    /**
     * Factory method
     *
     * @param array $lastFmData
     *
     * @return ArtistModel
     */
    public static function createFromLastFm(array $lastFmData)
    {
        $artist = new self();
        $artist->setName($lastFmData['artist']['name']);
        $artist->setPicture($lastFmData['artist']['image'][3]['#text']);
        $artist->setBiography($lastFmData['artist']['bio']['summary']);

        return $artist;
    }

    protected $albums;
    protected $biography;
    protected $name;
    protected $picture;
    protected $videos;

    public function getAlbums(){ return $this->albums; }
    public function getBiography(){ return $this->biography; }
    public function getName(){ return $this->name; }
    public function getPicture(){ return $this->picture; }
    public function getVideos(){ return $this->videos; }

    public function setAlbums(array $albums){ $this->albums = $albums; }
    public function setBiography($biography){ $this->biography = $biography; }
    public function setName($name){ $this->name = $name; }
    public function setPicture($picture){ $this->picture = $picture; }
    public function setVideos(array $videos){ $this->videos = $videos; }
}
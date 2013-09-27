<?php
require_once dirname(dirname(__DIR__)) . '/libraries/Services/' . '/iTunes.php';
require_once dirname(__DIR__). '/album.php';

class AlbumRepository
{
    protected $service;

    public function __construct()
    {
        $this->service = new Itunes();
    }

    public function findBy($criteria, $value)
    {
        if ($criteria === 'artist') {
            $serviceData = $this->service->getAlbumsbyArtist($value);
            $albums = array();

            foreach ($serviceData['results'] as $albumInfo) {
               $albums[] =  Album::createFromItunes($albumInfo);
            }

            return $albums;
        }
    }
}
<?php
require_once dirname(dirname(__DIR__)) . '/libraries/Services/' . '/LastFm.php';
require_once dirname(__DIR__) . '/artistmodel.php';

class ArtistRepository
{
    protected $service;

    public function __construct()
    {
        $this->service = new LastFM();
    }

    public function findBy($criteria, $value)
    {
        if ($criteria === 'name') {
            $data = $this->service->getArtistInfo($value);
            return ArtistModel::createFromLastFm($data);
        }
    }
}

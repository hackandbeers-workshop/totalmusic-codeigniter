<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artist extends CI_Controller
{
    public function index()
    {
        // Warning this is vulnerable to injection //
        if (isset($_POST['artistForm'])) {
            $this->load->model('Repository/ArtistRepository');
            $artist = $this->ArtistRepository->findBy('name', $_POST['artistName']);

            $this->load->model('Repository/AlbumRepository');
            $artist->setAlbums($this->AlbumRepository->findBy('artist', $_POST['artistName']));

            $this->load->model('Repository/VideoRepository');
            $artist->setVideos($this->VideoRepository->findBy('artist', $_POST['artistName']));

            $this->load->view('artist/info', array('artist' => $artist));
            return;
        }
		$this->load->view('artist/index');
    }

}
<?php

/**
 * Singleton Class CoolCache
 * To use it first enable memcache in your local environment and uncomment lines in each service
 */
class CoolCache
{
    private static $instance;

    private function __construct()
    {
        $this->memcache = new Memcache();
        $this->memcache->connect('localhost', 11211) or die('could not connect to memcache');
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function set($key, $value)
    {
        $this->memcache->set($key, $value);
    }

    public function get($key)
    {
        return $this->memcache->get($key);
    }
}

<?php
namespace App;

final class Config
{
    private static $instance;
    private array $configs = [];

    private function __construct()
    {
        $this->configs = $this->load();
    }

    private function load()
    {
        $result = [];
        $filesList = array_values(array_diff(scandir(CONFIG_DIR), array('..', '.')));
        for($i = 0; $i < count($filesList); $i++) {
            $keyName = str_replace( '.php','', $filesList[$i]);
            $path = CONFIG_DIR . $filesList[$i];
            $result[$keyName] = require_once  $path;
        }
        return $result;
    }

    public static function getInstance() : Config
    {
        if(null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function getConfig(string $key, $default = null)
    {
        return array_get($this->configs,$key, $defult = null);
    }
}

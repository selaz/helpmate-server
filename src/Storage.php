<?php

namespace Selaz\Helpmate;

class Storage {
    public function __construct()
    {
        
    }

    protected function genereteNewSessioin(int $length) 
    {
        return implode(array_map(function () {
            return dechex(mt_rand(0, 15));
        }, array_fill(0, $length, null)));
    }

    public function saveFile(string $name, string $data, ?string $session = null) 
    {
        $session = $session ?: $this->genereteNewSessioin(32);
        $fileName = \sprintf('%s-%s.json',$session,$name);

        \file_put_contents($fileName,$data);

        return $session;
    }

    public function getFile(string $name, string $session) {
        return \file_get_contents(\sprintf('%s-%s.json',$session,$name));
    }
}
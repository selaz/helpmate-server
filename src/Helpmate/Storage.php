<?php

namespace Selaz\Helpmate;

class Storage {
    private $filepath;

    public function __construct(string $filepath)
    {
        $this->filepath = rtrim($filepath,'/');
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
        $fileName = \sprintf('%s/%s-%s.json',$this->filepath,$session,$name);

        \file_put_contents($fileName,$data);

        return $session;
    }

    public function getFile(string $name, string $session) {
        $file = \sprintf('%s/%s-%s.json',$this->filepath,$session,$name);
        if (!\is_file($file) || !\is_readable($file)) {
            return \json_encode(['error'=>true,'message'=>'file not found']);
        }
        return \file_get_contents($file);
    }
}
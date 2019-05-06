<?php

namespace App;

use Carbon\Carbon;

class GenerateFileName
{
    const SAVE_DIR = 'public/image/';

    /**
     * @var string
     */
    private $fileName;

    /**
     * GenerateFileName constructor.
     * @param string $filename
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * public/image/に保存させる
     * @return int
     */
    public function outPutFileName(): string
    {
        $generateTime = Carbon::now();
        $saveFileName =  self::SAVE_DIR.$generateTime
                      ->format('Y-m-d_H:i:s').$this->fileName;

        return $saveFileName;
    }
}


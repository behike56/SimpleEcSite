<?php
namespace App;

use Carbon\Carbon;

class GenerateFileName
{
    const TIME_FORMAT = 'Y-m-d_H:i:s';

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
        $saveTime = $generateTime->format(self::TIME_FORMAT);
        $saveFileName =  $saveTime.$this->fileName;

        return $saveFileName;
    }
}


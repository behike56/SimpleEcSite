<?php
namespace App;

use Carbon\Carbon;

class GenerateImageFileName
{
    const TIME_FORMAT = 'Y-m-d_H:i:s';

    /**
     * @var string
     */
    private $fileName;

    /**
     * GenerateImageFileName constructor.
     * @param string $filename
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function outPutFileName(): string
    {
        $generateTime = Carbon::now();
        $saveTime = $generateTime->format(self::TIME_FORMAT);
        $saveFileName =  $saveTime.$this->fileName;

        return $saveFileName;
    }
}


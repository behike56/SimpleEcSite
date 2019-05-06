<?php

namespace Tests\Unit;

use App\GenerateFileName;

use Tests\TestCase;

class GenerateFileNameTest extends TestCase
{
    /**
     * @test
     */
    public function fileNameTest()
    {
        $generateFileName = new GenerateFileName('testImage.png');
        $testValue = $generateFileName->outPutFileName();

        $this->assertIsString($testValue);
    }
}


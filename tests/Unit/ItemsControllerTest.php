<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemsController;

use Tests\TestCase;
class SumItemPriceTest extends TestCase
{
    /**
     * @test
     */
    public function 価格1で個数1の場合に合計が1であることを検証()
    {
        $sumItemPrice = new SumItemPrice(1, 1);
        $this->assertSame(1, $sumItemPrice->value());
    }

    public function testSumPrice200()
    {
        $sumItemPrice = new SumItemPrice(100, 2);
        $this->assertSame(200, $sumItemPrice->value());
    }
}

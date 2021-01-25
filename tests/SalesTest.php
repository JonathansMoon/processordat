<?php

use App\Models\Sales;
use App\Models\Salesman;
use App\Services\CreateEntityService;


class SalesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function check_if_sales_is_create()
    {
        $createEntityService = new CreateEntityService();
        $sales = $createEntityService->createSale([003,10,'[1­-10­-100.5', '2-­30-­2.50',' 3­-40-­3.10]' ,'Joana']);

        $expected = new Sales([
            "id" => 3,
            "saleID" => 10,
            "item" => [
              0 => [
                "itemID" => 1,
                "itemQuantity" => 10,
                "itemPrice" => "100.52",
              ],
              1 =>  [
                "itemID" => 3,
                "itemQuantity" => 40,
                "itemPrice" => "3.10",
              ],
            ],
            "salesmanID" => "Joana",
            "totalSale" => 103.62,
          ]);

        $arrayCompared = $sales->item == $expected->item;
        $this->assertEquals(true, $arrayCompared);
    }
}

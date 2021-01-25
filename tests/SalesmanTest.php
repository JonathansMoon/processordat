<?php

use App\Models\Salesman;
use App\Services\CreateEntityService;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SalesmanTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function check_if_salesman_is_create()
    {
        $createEntityService = new CreateEntityService();
        $salesman = $createEntityService->createSalesman([001,1234567891234,'Steve',80000]);
        $expected = new Salesman([
            "id"    => 1,
            "cpf"   => 1234567891234,
            "name"  => "Steve",
            "salary"=> 80000.0
        ]);

        $arrayCompared = $salesman == $expected;

        $this->assertEquals(true, $arrayCompared);
    }
}

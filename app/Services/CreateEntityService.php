<?php
namespace App\Services;

use App\Models\Customer;
use App\Models\Sales;
use App\Models\Salesman;

class CreateEntityService {

    public function createSalesman($value)
    {
        $salesman = new Salesman([
            'id'        =>  $value[0],
            'cpf'       =>  $value[1],
            'name'      =>  $value[2],
            'salary'    =>  (double) $value[3]
        ]);
        return $salesman;
    }

    public function createCustomer($value)
    {
        $customer = new Customer([
            'id'            =>  $value[0],
            'cnpj'          =>  $value[1],
            'name'          =>  $value[2],
            'businessArea'  =>  $value[3]
        ]);
        return $customer;
    }

    public function createSale($value)
    {
        $splitString = stristr(stristr(implode('', $value), '['), ']', true);
        $withoutBrackets = str_replace('[', '', $splitString);
        $withoutSpace = explode(' ', $withoutBrackets);
        $items = [];
        $totalSale = 0;
        foreach ($withoutSpace as $fields) {
            $item = explode('-', $fields);
            $priceWithoutSpaces = preg_replace('~\x{00AD}~u', '',$item[2]);
            $totalSale += $priceWithoutSpaces;
            $items[] = [
                'itemID'         =>  (int) $item[0],
                'itemQuantity'   =>  (int) $item[1],
                'itemPrice'      =>   $priceWithoutSpaces,
                ];
        }

        $sales = new Sales([
            'id'          =>  $value[0],
            'saleID'      =>  (int) $value[1],
            'item'        =>  $items,
            'salesmanID'  =>  trim($value[5]),
            'totalSale'   =>  $totalSale
            ]);

        return $sales;
    }
}

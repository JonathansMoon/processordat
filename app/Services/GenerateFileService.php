<?php
namespace App\Services;

class GenerateFileService {

    public function generateMessage($nameFile, $salesman, $customer, $sales)
    {
        $report = [
            'countSalesman' => count($salesman),
            'countCustomer' => count($customer),
            'mediaSalary' => collect($salesman)->avg('salary'),
            'saleFirst' => collect($sales)->sortByDesc('totalSale')->first()->saleID,
            'saleLast' => collect($sales)->sortBy('totalSale')->first()->saleID,
        ];

        $text = 'Total de vendedores: ' . $report['countSalesman'] ."\n".
                'Total de clientes: ' . $report['countCustomer'] ."\n".
                'Média de salário dos vendedores: ' . $report['mediaSalary'] ."\n".
                'Maior venda foi do ID: ' . $report['saleFirst'] ."\n".
                'Menor venda foi do ID: ' . $report['saleLast'];

        $this->generateFile($text, $nameFile);
    }

    public function generateFile($text, $nameFile)
    {
        $fileOut = fopen(storage_path('app/public/out/') . $nameFile . '.done.dat','w');
        if ($fileOut == false) die('Não foi possível criar o arquivo.');
        fwrite($fileOut, $text);
        fclose($fileOut);
    }
}

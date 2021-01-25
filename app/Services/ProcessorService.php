<?php
namespace App\Services;

use App\Models\Customer;
use App\Models\Sales;
use App\Models\Salesman;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProcessorService {

    private $generateFileService;
    public function __construct(GenerateFileService $generateFileService, CreateEntityService $createEntityService)
    {
        $this->generateFileService = $generateFileService;
        $this->createEntityService = $createEntityService;
    }

    public function processor()
    {
        Storage::disk('local')->makeDirectory('public/out');
        $files = glob(storage_path('app/public/in/') . './*.dat');
        foreach ($files as $file) {
            $nameFile = basename($file, ".dat");

            $data = $this->copyFileContents($file);

            $salesman = [];
            $customer = [];
            $sales = [];
            foreach ($data as $value) {
                $complete[] = $value;
                switch ($value[0]) {
                    case '001':
                        $salesman[] = $this->createEntityService->createSalesman($value);
                        break;
                    case '002':
                        $customer[] = $this->createEntityService->createCustomer($value);
                        break;
                    case '003':
                        $sales[] = $this->createEntityService->createSale($value);
                        break;
                    default:
                        if ($value[0] != '') {
                            throw new Exception("ID does not match standard format", 404);
                        }
                        break;
                }
            }
            $this->generateFileService
                    ->generateMessage($nameFile, $salesman, $customer, $sales);
        }
    }


    public function copyFileContents($file)
    {
        $pointer = fopen($file, 'r');
        $data = [];
        while (!feof($pointer)) {
            $data[] = explode(',', fgets($pointer));
        }
        fclose($pointer);
        return $data;
    }
}

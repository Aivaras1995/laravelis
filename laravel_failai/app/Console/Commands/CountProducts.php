<?php

namespace App\Console\Commands;

use App\Models\Products;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Duomenų bazėje esančių produktų skaičius';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {

        $count = DB::table('products')->count();
        $products = DB::table('products')->select ('id', 'name')->get();

        $tableRows = [];
        foreach ($products as $product) {
            $tableRows[] = [$product->id, $product->name];

            $this->info("Duomenų bazėje yra $count produktai.");
            $this->table(['Id', 'Name'], $tableRows);

            return Command::SUCCESS;
        }
    }
}

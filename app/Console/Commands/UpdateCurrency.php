<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now()->format('Y-m-d');

        $currencies = config('currency.keys');
        $path = config('currency.path');

        foreach ($currencies as $currency) {

            $response = Http::get("https://cbu.uz/ru/arkhiv-kursov-valyut/json/{$currency}/{$date}/");
            if ($response->ok()) {
                if (!is_dir($path . '/' . $currency)) {
                    mkdir($path . '/' . $currency);
                }

                $fp = fopen($path . '/' . $currency . '/currency.json', 'w');
                fwrite($fp, json_encode(json_decode($response->getBody())[0], JSON_UNESCAPED_UNICODE));
                fclose($fp);
            }
        }

        return true;
    }
}

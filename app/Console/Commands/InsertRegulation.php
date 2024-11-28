<?php

namespace App\Console\Commands;

use App\Models\Regulation;
use DateTime;
use Illuminate\Console\Command;
use Carbon\Carbon;

class InsertRegulation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-regulation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonString = file_get_contents(storage_path('app/public/documents.json'));
        $regulations = json_decode($jsonString, true);

        foreach ($regulations as $key => $regulation) {
            foreach ($regulation as $item) {
                $dataInserts = [
                    "number" => $item['number'],
                    "status" => $item['status'],
                    "title" => $item['title'],
                    "issuingAgency" => $item['issuingAgency'],
                    "signer" => $item['signer'],
                    "issuedDate" => Carbon::createFromFormat('d/m/Y', $item['issuedDate'])->format('Y-m-d'),
                    "effectiveDate" => Carbon::createFromFormat('d/m/Y', $item['effectiveDate'])->format('Y-m-d'),
                    "attachment" => $item['attachment'],
                    "download_path" => basename(str_replace('\\', '/', $item['download_path'])),
                    'page' => trim($key, 'page_')
                ];
                Regulation::create($dataInserts);
            }
        }

        $this->info('Updated item');
    }
}

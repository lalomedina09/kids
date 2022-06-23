<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

class UpdateZipcodes extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qd:zipcodes:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update zipcodes';

    const CODE_IDX = 0;
    const SETTLEMENT_IDX = 1;
    const MUNICIPALITY_IDX = 3;
    const STATE_IDX = 4;
    const SETTLEMENT_ID_IDX = 12;

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
     * @return mixed
     */
    public function handle()
    {
        $lines = file(storage_path('app/csv/cp.txt'));
        $register = ['code' => ''];
        $new = true;

        $bar = $this->output->createProgressBar(count($lines));
        $bar->start();
        foreach ($lines as $line) {
            $bar->advance();

            $row = explode("|", $line);

            $code = $row[self::CODE_IDX];
            if ($code === $register['code']) {
                $register['settlements'][$row[self::SETTLEMENT_ID_IDX]] = $row[self::SETTLEMENT_IDX];
                continue;
            }

            if (!$new) {
                $this->dumpToDb($register);
            }

            $register['code'] = $code;
            $register['settlements'] = [$row[self::SETTLEMENT_ID_IDX] => $row[self::SETTLEMENT_IDX]];
            $register['municipality'] = $row[self::MUNICIPALITY_IDX];
            $register['state'] = $row[self::STATE_IDX];
            $new = false;
        }
        $bar->finish();
    }

    private function dumpToDB($register)
    {
        $query = DB::table('zipcodes');
        $fields = [
            'code' => $register['code'],
            'settlements' => json_encode($register['settlements']),
            'municipality' => $register['municipality'],
            'state' => $register['state']
        ];

        if ($query->where('code',$register['code'])->exists()) {
            $query->update($fields);
        } else {
            $query->insert($fields);
        }
    }

}

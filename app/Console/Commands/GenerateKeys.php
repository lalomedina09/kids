<?php

namespace App\Console\Commands;

use phpseclib\Crypt\RSA;
use Illuminate\Console\Command;

class GenerateKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qd:keys:generate {prefix}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the encryption keys for JWT generation';

    /**
     * Execute the console command.
     *
     * @param  RSA  $rsa
     * @return mixed
     */
    public function handle(RSA $rsa)
    {
        $keys = $rsa->createKey(4096);

        $prefix = $this->argument('prefix');
        $private_key_path = "app/keys/{$prefix}-private.key";
        $public_key_path = "app/keys/{$prefix}-public.key";

        file_put_contents(storage_path($private_key_path), array_get($keys, 'privatekey'));
        file_put_contents(storage_path($public_key_path), array_get($keys, 'publickey'));

        $this->info('Encryption keys generated successfully.');
    }
}
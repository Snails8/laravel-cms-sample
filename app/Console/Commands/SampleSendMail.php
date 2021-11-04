<?php

namespace App\Console\Commands;

use App\Jobs\SampleJob;
use Illuminate\Console\Command;

/**
 * 定時処理 メール送信のサンプル処理
 */
class SampleSendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定時処理 サンプルメールの送信';

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
     * @param SampleJob $job
     */
    public function handle(SampleJob $job)
    {
        dispatch($job);
    }
}

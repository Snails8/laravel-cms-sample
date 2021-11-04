<?php

namespace App\Jobs;

use App\Mail\SampleMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * sample jobs
 * Queue の test をする際に使う。
 *
 */
class SampleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * 作成後は呼び出したい処理でdispatchする。
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new SampleMail());
        Log::info('Queue test');
    }
}

<?php

namespace App\Console\Commands;

use App\Mail\AutoMail\NewsMail;
use App\Models\Customer;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewsMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:news-at-today';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定時処理サンプル';

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
    public function handle(): void
    {
        $customers = Customer::query()->orderBy('id')->get();

//        $countAllSendMail = 0;
        foreach ($customers as $customer) {
            $newsLists = News::query()
//                ->where('created_at', '>=', Carbon::now()->subDays(1))
                ->where('is_public', true)
                ->orderBy('id', 'desc')
                ->get();

            $count = $newsLists->count();

            if ($count) {
                // メールに記載する物件数が多すぎるとクレームに繋がりそうなので最大5件とする
                $randomNewsLists = ($count < 5) ? $newsLists->random($count) : $newsLists->random(5);

                Mail::queue(new NewsMail($customer, $randomNewsLists));
            }
        }
    }
}

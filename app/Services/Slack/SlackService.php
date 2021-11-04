<?php

namespace App\Services\Slack;

use App\Notifications\SlackNotification;
use Illuminate\Notifications\Notifiable;

/**
 * Slack 通知処理
 */
class SlackService
{
    use Notifiable;

    public function send($message = null, $attachment = null)
    {
        $this->notify(new SlackNotification($message, $attachment));
    }

    protected function routeNotificationForSlack()
    {
        return env('SLACK_URL');
    }
}
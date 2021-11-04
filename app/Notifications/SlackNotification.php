<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotification extends Notification
{
    use Queueable;

    // 各種環境変数情報
    protected $channel;
    protected $name;
    protected $icon;
    protected $content;

    /**
     * Create a new notification instance.
     *
     * @param null $message
     * @param null $attachment
     * @return void
     */
    public function __construct($message = null, $attachment = null)
    {
        $this->channel = env('SLACK_CHANNEL');
        $this->name = env('SLACK_NAME');
        $this->icon = env('SLACK_ICON');
        $this->content = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the slack representation of the notification.
     *
     * @param $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from($this->name)
            ->image($this->icon)
            ->to($this->channel)
            ->content($this->content);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications\Communicate;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendmailnoAttach extends Notification
{
    use Queueable;
    public $compose;
    public $html;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($compose,$html)
    {
        $this->compose = $compose;
        $this->html = $html;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->compose)
                    ->line('Mail From Oguses School Management System')
                    ->line($this->html)
                    ->line('Thank you for choosing OSMS');
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

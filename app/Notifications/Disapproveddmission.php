<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Disapproveddmission extends Notification implements ShouldQueue
{
    use Queueable;

    public $fullname;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($fullname)
    {
        $this->fullname = $fullname;
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
                    ->subject('Admission Revoked')
                    ->line("{$this->$fullname} we are sorry to announce to you that, your admission has been revoked due to over admission.")
                    ->line('You will get an email to notify you if your admission is reconsidered by management')
                    ->line('Thank you for using choosing OSMS!');
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventNotification extends Notification
{
    use Queueable;


    public $title;
    public $user_name;
    public $event_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title , $user_name , $event_id)
    {
        $this->title = $title;
        $this->user_name = $user_name;
        $this->event_id = $event_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string[]
     */


    public function toDatabase()
    {
        return [
          'title'     => $this->title,
          'user_name' => $this->user_name,
          'event_id'  => $this->event_id
        ];
    }


//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

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

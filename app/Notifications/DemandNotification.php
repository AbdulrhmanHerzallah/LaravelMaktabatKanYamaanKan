<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandNotification extends Notification
{
    use Queueable;

    public $title;
    public $sender;
    public $demand_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title , $sender , $demand_id)
    {
        $this->title = $title;
        $this->sender = $sender;
        $this->demand_id = $demand_id;
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



    public function toDatabase()
    {
        return [
            'title' => $this->title,
            'sender_name' => $this->sender,
            'demand_id'   => $this->demand_id
        ];
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

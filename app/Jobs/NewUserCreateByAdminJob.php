<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewUserCreateByAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $user;
    protected $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user , $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to([$this->user->email])
            ->send(new \App\Mail\NewUserMail($this->user , $this->password));
    }
}

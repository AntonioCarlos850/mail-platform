<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail as FacadesMail;

class ProcessMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Mail $mail)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FacadesMail::to($this->mail->to)
            ->cc($this->mail->cc)
            ->bcc($this->mail->bcc)
            ->send(new SendMail($this->mail));

        $this->mail->update([
            'sended_at' => now(),
        ]);
    }
}

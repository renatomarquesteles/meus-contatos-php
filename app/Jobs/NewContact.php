<?php

namespace App\Jobs;

use App\Mail\NewContactMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewContact implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var string
     */
    private $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contact $contact, string $email)
    {
        $this->contact = $contact;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new NewContactMail($this->contact));
    }
}

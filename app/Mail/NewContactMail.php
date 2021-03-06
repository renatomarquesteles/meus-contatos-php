<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * The contact's info
     *
     * @var Contact
     */
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-reply@meuscontatos.com')
            ->subject('Novo contato adicionado!')
            ->view('emails.newContact')
            ->with([
                'name'         => $this->contact->name,
                'email'        => $this->contact->email,
                'phone'        => $this->contact->phone,
            ]);
    }
}

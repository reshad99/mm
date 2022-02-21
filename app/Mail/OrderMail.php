<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $phone;
    protected $service;
    protected $fromwhere;
    protected $towhere;
    protected $width;
    protected $length;
    protected $height;
    protected $weight;
    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $service, $from, $to, $width, $length, $height, $weight, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->service = $service;
        $this->fromwhere = $from;
        $this->towhere = $to;
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
        $this->weight = $weight;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.emails.order')
        ->with([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'service' => $this->service,
            'from' => $this->fromwhere,
            'to' => $this->towhere,
            'width' => $this->width,
            'length' => $this->length,
            'height' => $this->height,
            'weight' => $this->weight,
            'msg' => $this->message,
        ])->subject('MMLogistics Sifariş');
    }
}

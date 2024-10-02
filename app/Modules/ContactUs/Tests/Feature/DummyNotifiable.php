<?php
namespace App\Modules\ContactUs\Tests\Feature;

use Illuminate\Notifications\Notifiable;

class DummyNotifiable
{
    use Notifiable;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }
    public function getKey()
    {
        return 1; // Return a dummy key value
    }
}
?>
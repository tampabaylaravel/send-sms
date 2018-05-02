# How to send SMS with Laravel
This was a request from somebody in the meetup group. If I was doing this in production, I would most likely choose to use Laravel's built in [SMS Notifications]. However, since that is so easy it felt like "cheating", so I decided to go the route of creating an adapter that used the Twilio SDK, a fake adapter to make testing easier/faster, and even creating a custom Notification object integrating the Twilio adapter. You can follow along through the commits or take a look in the Unit tests and `Features/ExampleTest.php`

[SMS Notifications]: https://laravel.com/docs/5.6/notifications#sms-notifications

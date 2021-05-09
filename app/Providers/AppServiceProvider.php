<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\VerifyEmail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*VerifyEmail::$toMailCallback=function($notifiable, $verificationUrl){
            return (new MailMessage)
            ->subject(Lang::get('Verifica tu correo'))
            ->line(Lang::get('Haga click en el botón para verificar el correo.'))
            ->action(Lang::get('Verificar Correo'), $verificationUrl)
            ->line(Lang::get('Si usted no ha creado una cuenta en Milesy puede ignorar este correo.'));
        };

        VerifyEmail::$createUrlCallback = function($notifiable){
            return URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        };*/
    }
}

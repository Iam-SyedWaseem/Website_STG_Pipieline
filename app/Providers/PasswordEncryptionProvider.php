<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Config;


class PasswordEncryptionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        try {
            // Decrypt the mail password
            $mailPassword = Crypt::decryptString(env('ENCRYPTED_MAIL_PASSWORD'));

            // Update mail configuration
            Config::set('mail.mailers.smtp.password', $mailPassword);

            $awsSecretKey = Crypt::decryptString(env('ENCRYPTED_AWS_SECRET_ACCESS_KEY'));

            // Update the filesystem configuration with decrypted secret key
            Config::set('filesystems.disks.s3.secret', $awsSecretKey);
        } catch (DecryptException $e) {
            //     //
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

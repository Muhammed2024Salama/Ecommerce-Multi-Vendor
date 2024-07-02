<?php
namespace Ecommerce\Base\Helpers;
use Ecommerce\Backend\Controllers\Admin\EmailConfiguration\Models\EmailConfiguration;


class MailHelper
{
    /**
     * @return void
     */
    public static function setMailConfig()
    {
        $emailConfig = EmailConfiguration::first();

        $config = [
            'transport' => 'smtp',
            'host' => $emailConfig->host,
            'port' => $emailConfig->port,
            'encryption' => $emailConfig->encryption,
            'username' => $emailConfig->username,
            'password' => $emailConfig->password,
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ];

        config(['mail.mailers.smtp' => $config]);
        config(['mail.from.address' => $emailConfig->email]);
    }
}

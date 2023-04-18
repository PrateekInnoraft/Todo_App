<?php

/**
 * @file
 * Contains \app\Config.
 *
 * Defines constants for configuration settings used in the application.
 */

namespace app;

class Config
{

    /**
     * The database host.
     */
    const DB_HOST = 'localhost';

    /**
     * The database name.
     */
    const DB_NAME = 'todoapp';

    /**
     * The database username.
     */
    const DB_USER = 'Prateek';

    /**
     * The database password.
     */
    const DB_PASSWORD = 'Prateek@123';

    /**
     * Whether to show errors or not.
     */
    const SHOW_ERRORS = false;

    /**
     * The SMTP host for email sending.
     */
    const SMTP_HOST = 'smtp.gmail.com';
    
    /**
     * The SMTP port for email sending.
     */
    const SMTP_PORT = 465;

    /**
     * The SMTP username for email sending.
     */
    const SMTP_USERNAME = 'prateek.garg@innoraft.com';

    /**
     * The SMTP password for email sending.
     */
    const SMTP_PASSWORD = 'kghxehtocsrvykmv';

    /**
     * The SMTP encryption for email sending.
     */
    const SMTP_ENCRYPTION = 'ssl';

    /**
     * The default "From" email address for sent emails.
     */
    const SMTP_FROM_EMAIL = 'prateek.garg@innoraft.com';
}
?>





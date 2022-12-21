<?php

namespace app\components;

use yii\authclient\OAuth2;

/**
 * Google allows authentication via Google OAuth.
 *
 * In order to use Google OAuth you must create a project at <https://console.developers.google.com/project>
 * and set up its credentials at <https://console.developers.google.com/apis/credentials?project=[yourProjectId]>.
 *
 * Application configuration:
 *
 * ```php
 * 'components' => [
 *     'authClientCollection' => [
 *         'class' => 'yii\authclient\Collection',
 *         'clients' => [
 *             'google' => [
 *                 'class' => 'app\components\GoogleClient',
 *                 'clientId' => 'google_client_id',
 *                 'clientSecret' => 'google_client_secret',
 *             ],
 *         ],
 *     ]
 *     // ...
 * ]
 * ```
 *
 * @see https://console.developers.google.com/project
 *
 * @author Created by ssiva on 21/12/2022
 */

class GoogleClient extends OAuth2
{
    public $authUrl = 'https://accounts.google.com/o/oauth2/auth';
    public $tokenUrl = 'https://accounts.google.com/o/oauth2/token';
    public $apiBaseUrl = 'https://www.googleapis.com/oauth2/v1';
    
    protected function initUserAttributes(): array
    {
        return $this->api('userinfo', 'GET');
    }
    
    protected function defaultName(): string
    {
        return 'google';
    }
    
    protected function defaultTitle(): string
    {
        return 'Google';
    }
    
    protected function defaultViewOptions(): array
    {
        return [
            'popupWidth' => 800,
            'popupHeight' => 500,
        ];
    }
    
    public function init()
    {
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(' ', [
                'https://www.googleapis.com/auth/userinfo.profile',
                'https://www.googleapis.com/auth/userinfo.email',
            ]);
        }
    }
}
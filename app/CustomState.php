<?php

namespace App;

use Illuminate\Auth\AuthManager;

class CustomState
{

    protected $auth;

    /**
     * Class constructor.
     *
     * @param \Illuminate\Auth\AuthManager $auth
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Checks if the user requires onboarding.
     *
     * @return bool
     */
    public function needsOnboarding()
    {
        return $this->auth->user()
            ? $this->auth->user()->created_at->equalTo($this->auth->user()->updated_at)
            : false;
    }
}

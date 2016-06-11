<?php

namespace cms\Listeners;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;

class UpdateLastLoginOnLogin
{
    
    private $auth;
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;   
    }

    /**
     * @param $user
     * @param $remember
     */
    public function handle($event)
    {
        $user = $this->auth->user();

        $user->last_login_at = Carbon::now();
        
        $user->save();
    }
}
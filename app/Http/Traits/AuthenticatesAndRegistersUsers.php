<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 22/12/15
 * Time: 13:59
 */

namespace App\Http\Traits;



use Illuminate\Foundation\Auth\AuthenticatesUsers;

trait AuthenticatesAndRegistersUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    }
}
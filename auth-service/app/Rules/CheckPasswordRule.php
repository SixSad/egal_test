<?php

namespace App\Rules;

use App\Models\User;
use Egal\Core\Session\Session;
use Egal\Validation\Rules\Rule as EgalRule;

class CheckPasswordRule extends EgalRule
{

    public function validate($attribute, $value, $parameters = null): bool
    {
        $attributes = Session::getActionMessage()->getParameters();
        $user = User::query()->where('email', $attributes['email'])->first();

        if (!$user) {
            return false;
        }
        return password_verify($value, $user->getAttribute('password'));

    }

    public function message(): string
    {
        return ('Incorrect password!');
    }

}

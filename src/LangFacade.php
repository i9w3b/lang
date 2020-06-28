<?php

namespace I9w3b\Lang;

use Illuminate\Support\Facades\Facade;

class LangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lang';
    }
}

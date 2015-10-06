<?php
namespace ANavallaSuiza\Adoadomin\Contracts;

interface Adoadomin
{
    public function boot();

    public function register($provider);

    public function modules();

    public function activeModule();
}

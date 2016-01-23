<?php
namespace Anavel\Foundation\Contracts;

interface Anavel
{
    public function boot();

    public function register($provider);

    public function modules();

    public function activeModule();
}

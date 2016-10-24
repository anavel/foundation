<?php

namespace Anavel\Foundation\Contracts;

interface Authenticatable
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getAvatar();

    /**
     * @return bool
     */
    public function isAnavelAuthorized();
}

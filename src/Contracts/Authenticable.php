<?php
namespace Anavel\Foundation\Contracts;

interface Authenticable
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

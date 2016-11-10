<?php

namespace GameInLyonBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GameInLyonBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

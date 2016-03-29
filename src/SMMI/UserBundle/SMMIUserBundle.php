<?php

namespace SMMI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SMMIUserBundle extends Bundle
{
    public function getParent()
    {
        return "FOSUserBundle";
    }
}

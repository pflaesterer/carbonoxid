<?php

namespace Pflaesterer\CarbonOxid\Core;

class Email extends Email_parent
{
    public function send()
    {
        $config = \OxidEsales\Eshop\Core\Registry::getConfig();

        try
        {
            parent::AddBCC($config->getConfigParam(), 'Shop-BCC');
        }
        catch(Exception $e)
        {
            // ...
        }

        return parent::send();
    }
}

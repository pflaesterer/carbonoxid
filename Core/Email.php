<?php

namespace Pflaesterer\CarbonOxid\Core;

class Email extends Email_parent
{
    public function send()
    {
        $config = \OxidEsales\Eshop\Core\Registry::getConfig();

        try
        {
            parent::AddBCC($config->getConfigParam('carbonoxid_mail_bcc', \OxidEsales\Eshop\Core\Registry::getConfig()->getShopId(), 'module:carbonoxid'), 'Shop-BCC');
        }
        catch(Exception $e)
        {
            // ...
        }

        return parent::send();
    }
}

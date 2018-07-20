<?php

namespace Pflaesterer\CarbonOxid\Core;

class Email extends Email_parent
{
    public function send()
    {
        $config = \OxidEsales\Eshop\Core\Registry::getConfig();
        $bcc    = $config->getConfigParam('carbonoxid_mail_bcc_email',  \OxidEsales\Eshop\Core\Registry::getConfig()->getShopId(), 'module:carbonoxid');
        $name   = $config->getConfigParam('carbonoxid_mail_bcc_name',   \OxidEsales\Eshop\Core\Registry::getConfig()->getShopId(), 'module:carbonoxid');

        if(filter_var($bcc, FILTER_VALIDATE_EMAIL))
        {
            parent::AddBCC($bcc, $name);
        }

        return parent::send();
    }
}

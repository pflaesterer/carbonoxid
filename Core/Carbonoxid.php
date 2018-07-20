<?php

namespace Pflaesterer\Flushoxid\Application\Controller\Admin;

class FlushOxid extends \OxidEsales\Eshop\Core\Base
{
    public function flushTmpDir()
    {
        $oConf   = oxRegistry::getConfig();
        $option  = $oConf->getRequestParameter('clearoption');
        $sTmpDir = realpath($oConf->getShopConfVar('sCompileDir'));

        switch($option)
        {
            case 'smarty':
                $aFiles = glob($sTmpDir.'/smarty/*.php');
                break;
            case 'language':
                oxRegistry::get('oxUtils')->resetLanguageCache();
                break;
            case 'database':
                $aFiles = glob($sTmpDir.'/*{_allfields_,i18n,_aLocal,allviews}*',GLOB_BRACE);
                break;
            case 'complete':
                $aFiles = glob($sTmpDir.'/*{.php,.txt}',GLOB_BRACE);
                $aFiles = array_merge($aFiles, glob($sTmpDir.'/smarty/*.php'));
                break;
            case 'seo':
                $aFiles = glob($sTmpDir.'/*seo.txt');
                break;
            case 'none':
            default:
                return;
        }

        $count = count($aFiles);
        if($count > 0)
        {
            foreach($aFiles as $file)
            {
                @unlink($file);
            }

            echo $count;
        }
    }
}

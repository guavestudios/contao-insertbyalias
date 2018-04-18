<?php


namespace Guave\Insertbyalias\ContaoManager;

use Guave\Insertbyalias\InsertbyaliasBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(InsertbyaliasBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['insertbyalias']),
        ];
    }
}
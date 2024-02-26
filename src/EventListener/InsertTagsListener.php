<?php


namespace Guave\Insertbyalias\EventListener;

use Contao\ModuleModel;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\Events;
use Contao\StringUtil;

class InsertTagsListener
{
    /**
     * @var ContaoFramework
     */
    private $framework;

    /**
     * @var array
     */
    private static $supportedTags = [
        'insert_module_alias'
    ];

    /**
     * @param ContaoFramework $framework
     */
    public function __construct(ContaoFramework $framework)
    {
        $this->framework = $framework;
    }

    /**
     * Replaces calendar insert tags.
     *
     * @param string $tag
     * @param bool   $useCache
     * @param mixed  $cacheValue
     * @param array  $flags
     *
     * @return string|false
     */
    public function onReplaceInsertTags(string $tag, bool $useCache = false, $cacheValue = null, array $flags = [])
    {
        $elements = explode('::', $tag);
        $key = strtolower($elements[0]);

        if ('insert_module_alias' === $key) {
          //find a corresponding module
          $adapter = $this->framework->getAdapter(ModuleModel::class);
          $module = $adapter->findByAlias($elements[1]);

          if (!empty($module)) {
            //careful, there can be multiple because its an collection
            return \Controller::getFrontendModule($module[0], false);
          }
          return 'Module not found: '.$elements[1];
        }

        return false;
    }
}
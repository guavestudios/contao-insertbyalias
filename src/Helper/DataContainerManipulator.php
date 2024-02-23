<?php

namespace Guave\Insertbyalias\Helper;

class DataContainerManipulator {

  public function modifyDca($dcaTable) {
    //HACK: we have to modify the dca delayed
    if ($dcaTable == "tl_module") {
      foreach($GLOBALS['TL_DCA']['tl_module']['palettes'] as $name => $palette )
      {
        if ($name == '__selector__')
          continue;
  
        $GLOBALS['TL_DCA']['tl_module']['palettes'][$name] = str_replace('{expert_legend:hide}', '{expert_legend:hide},alias', $palette, $count);
  
        if (!$count)
        {
          $GLOBALS['TL_DCA']['tl_module']['palettes'][$name] .= ';{expert_legend:hide},alias;';
        }
      }

    }
  }
}
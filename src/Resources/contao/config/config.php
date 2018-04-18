<?php

// Registrieren im Hooks replaceInsertTags
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('Guave\Insertbyalias\Helper\DataContainerManipulator', 'modifyDca');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('guave_insertbyalias.listener.insert_tags', 'onReplaceInsertTags');
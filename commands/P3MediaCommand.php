<?php

/**
 * Class file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Composer package update and install command
 *
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3extensions.commands
 * @since 3.0.5
 */
class P3MediaCommand extends CConsoleCommand {

    public function getHelp() {
        echo <<<EOS
n/a
EOS;
    }

    /**
     * Creates data folders
     * @param type $args
     */
    public function run($args) {

        $dataPath = realpath(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . 'data');
        echo "\nCreating data folder '{$dataPath}'...\n";
        @mkdir($dataPath.DIRECTORY_SEPARATOR.'p3media');
        @mkdir($dataPath.DIRECTORY_SEPARATOR.'p3media-import');
        @chmod($dataPath.DIRECTORY_SEPARATOR.'p3media', 0777);
        @chmod($dataPath.DIRECTORY_SEPARATOR.'p3media-import', 0777);
        
    }

}

?>
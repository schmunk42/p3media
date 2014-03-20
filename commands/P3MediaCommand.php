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
    class P3MediaCommand extends CConsoleCommand
    {
        /**
         * @var string the name of the default action. Defaults to 'index'.
         */
        public $defaultAction='setup';

        /**
         * @var bool
         * @description suppress any output
         */
        public $quiet = false;

        /**
         * @var float,
         * @description will delete files older than xx days
         */
        public $daysAlive = 30;

        public function getHelp() {
            echo <<<EOD

USAGE
    yiic p3media (Setup)
    yiic p3media <command> (Runtime cleanup)

COMMANDS are:
    runtime [--daysAlive] [--quiet]

EXAMPLE
    yiic p3media runtime --daysAlive=14 --quiet

DESCRIPTION
    This command will delete files in 'application.runtime.p3media' or 'webroot.runtime.p3media' after they where not modified
    within the [--daysAlive]

PARAMETERS
    * daysAlive[float], default=30 days
    * quiet[bool]

EOD;
        }

        /**
         * Creates data folders
         */
        public function actionSetup() {
            $dataPath = realpath(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . 'data');
            echo "\nCreating data folder '{$dataPath}'...\n";
            @mkdir($dataPath.DIRECTORY_SEPARATOR.'p3media');
            @mkdir($dataPath.DIRECTORY_SEPARATOR.'p3media-import');
            @chmod($dataPath.DIRECTORY_SEPARATOR.'p3media', 0777);
            @chmod($dataPath.DIRECTORY_SEPARATOR.'p3media-import', 0777);
        }

        /**
         * Delete files in runtime.p3media after set $daysAlive
         * @param $daysAlive
         */
        public function actionCleanupRuntime($daysAlive)
        {
            // Find p3media runtime path in application or webroot
            $relPath     = DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'p3media';
            $fullRuntimePath = realpath(Yii::getPathOfAlias('application') . $relPath);
            $lifetime    = time() - ($daysAlive * 24 * 60 * 60);
            if ($fullRuntimePath == null) {
                $fullRuntimePath = realpath(Yii::getPathOfAlias('webroot') . $relPath);
                if ($fullRuntimePath == null) {
                    $this->out("\nRuntime path not found!\n");
                    exit;
                }
            }

            $files = array();
            $index = array();

            if ($handle = opendir($fullRuntimePath)) {

                clearstatcache();
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        $files[] = $file;
                        $index[] = fileatime($fullRuntimePath . DIRECTORY_SEPARATOR . $file);
                    }
                }
                closedir($handle);
            }
            asort($index);

            $count = 0;
            $this->out("\n");
            foreach ($index as $i => $t) {
                if ($t < $lifetime) {
                    $filePath = $fullRuntimePath . DIRECTORY_SEPARATOR . $files[$i];
                    if (@unlink($filePath)) {
                        $this->out($files[$i] . ' deleted!');
                        $count++;
                    }
                }
            }
            if ($count == 0) {
                $this->out("\n" . $fullRuntimePath . ' is clean!' . "\n");
            } else {
                $this->out("\n==========================================================");
                $this->out($count . ' Files has been deleted from "' . $fullRuntimePath . '"');
            }
        }

        /**
         * @param string $msg
         */
        private function out($msg)
        {
            if (!$this->quiet) {

                echo <<<EOD
{$msg}\n
EOD;
            }
        }

    }

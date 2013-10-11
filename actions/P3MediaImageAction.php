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
 * Main description
 *
 * Detail description
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3media.actions
 * @since 3.0.1
 */
class P3MediaImageAction extends CAction {

    public function run() {
        if (!isset(Yii::app()->image)) {
            throw new CException("Application component 'image' not found.");
        }

        Yii::trace("Starting file image action ...", "p3pages.actions.P3MediaImageAction");
        // check preset
        if (isset($_GET['preset']) && isset($this->controller->module->params['presets'][$_GET['preset']])) {
            $preset = new CMap($this->controller->module->params['presets'][$_GET['preset']]);
        } else {
            if (isset($_GET['preset'])) {
                throw new Exception("Invalid preset '{$_GET['preset']}' specified!");
            } else {
                throw new Exception("No preset specified!");
            }
            //$preset = new CMap($this->controller->module->params['presets']['default']);
        }
        
        $identifier = array();
        $id = Yii::app()->request->getParam('id');
        $nameId = Yii::app()->request->getParam('nameId');
        if (!empty($id) && is_numeric($id)) {
            $identifier['id'] = $id;
        } elseif(!empty($nameId)) {
            $identifier['nameId'] = $nameId;
        }

        if (!empty($identifier)) {
            $result = self::processMediaFile($identifier, $preset);
            switch ($result['type']) {
                case 'public':
                    header('location: ' . $result['data']);
                    break;
                case 'protected':
                    $model = self::findModel($identifier);
                    self::sendImage($result['data'], basename($model->title), $preset);
                    break;
                default:
                    self::sendErrorImage($preset);
            }
        } else {
            #throw new Exception('Nor id neither nameId specified!');
            self::sendErrorImage($preset);
        }

        #exit;
    }

    /**
     * Renders an image from P2File specified by id and preset
     *
     * @param array/integer $identifier
     * @param string $preset
     * @return mixed Rendering result, false if an error occured, otherwise an array with 'type' and 'data'
     */

    public static function processMediaFile($identifier, $preset) {
        if (is_integer($identifier)) {
            $identifier = array('id' => $identifier);
        }
        Yii::trace(
            'Processing media file with ' .
            key($identifier) . ' "' . $identifier[key($identifier)] . '" ...',
            'p3pages.actions.P3MediaImageAction');

        // get file from db
        $model = self::findModel($identifier);
        if (!$model) 
            return false;

        $inFile = Yii::getPathOfAlias(Yii::app()->controller->module->dataAlias) . DIRECTORY_SEPARATOR . $model->path;
        $path = self::prepareRenderPath($preset['savePublic']);

        if (is_file($inFile)) {

            $hash = self::generateHash($model, $preset);
            $outFile = $path . DIRECTORY_SEPARATOR . $hash;

            if ($preset['originalFile'] === true) {
                // return original file and exit
                if ($preset['savePublic'] === true) {
                    copy($inFile, $outFile);
                    //echo str_replace(Yii::app()->basePath, Yii::app()->baseUrl, $outFile);exit;
                    $outUrl = str_replace(DIRECTORY_SEPARATOR, "/", $outFile);
                    header('location: '. str_replace(Yii::app()->basePath, Yii::app()->baseUrl, $outUrl));
                    //self::sendImage($outFile, $model, $preset);
                } else {
                    self::sendImage($inFile, basename($model->title), $preset);
                }
            }


            if (is_file($outFile)) {
                // file exists
                #Yii::trace('found existing file.', 'p3pages.actions.P3MediaImageAction');
            } else {
                Yii::log('Creating image from ' . $inFile, CLogger::LEVEL_INFO, 'p3pages.actions.P3MediaImageAction');
                if (!self::generateImage($inFile, $outFile, $preset)) {
                    Yii::log('Error while rendering ' . $inFile, CLogger::LEVEL_INFO, 'p3pages.actions.P3MediaImageAction');

                    $mimeImageDir = Yii::getPathOfAlias('p3media.images.mimetypes');
                    $mimeImageFile = $mimeImageDir . DIRECTORY_SEPARATOR . CFileHelper::getMimeTypeByExtension($inFile) . '.png';
                    #echo $mimeImageFile;exit;

                    if (!is_file($mimeImageFile)) {
                        Yii::log('Missing mime type image ' . $mimeImageFile, CLogger::LEVEL_WARNING, 'p3pages.actions.P3MediaImageAction');
                        $mimeImageFile = $mimeImageDir . DIRECTORY_SEPARATOR . "mime-empty.png";
                    }
                    self::generateImage($mimeImageFile, $outFile, $preset);
                }
            }
        } else {
            Yii::log("File ".key($identifier) . "=>" . $identifier[key($identifier)] ." {$inFile} missing! [uniqid:" . uniqid() . "]", CLogger::LEVEL_WARNING, 'p3pages.actions.P3MediaImageAction'); // TODO: log message appears twice
            return false;
        }

        $info = getimagesize($outFile);

        // output
        if ($preset['savePublic'] === true) {
            return array(
                'type' => 'public',
                'data' => Yii::app()->baseUrl . Yii::app()->getModule('p3media')->params['publicRuntimeUrl'] . "/" . $hash,
                'info' => $info);
        } else {
            return array(
                'type' => 'protected',
                'data' => $outFile,
                'info' => $info);
        }
    }

    /**
     * Process a local file with given preset to a public location
     *
     * @param $file
     * @param $preset
     *
     * @return string URL of outputted file
     */
    public static function processLocalFile($file, $preset){
        $settings = Yii::app()->getModule('p3media')->params['presets'][$preset];
        $path = self::prepareRenderPath(true);
        $hash = $preset.'-'.md5($file.'.'.filemtime($file).'.'.CJSON::encode($settings)).".".$settings['type'];
        $outFile = $path.'/'.$hash;
        $outUrl = Yii::app()->baseUrl . Yii::app()->getModule('p3media')->params['publicRuntimeUrl'].'/'.$hash;
        if (!is_file($outFile)) {
            self::generateImage($file, $outFile, $settings);
        }
        return $outUrl;
    }

    private static function prepareRenderPath($public = false) {
        // set render path
        if ($public === true) {
            !empty(Yii::app()->controller->module->params['publicRuntimeAlias'])
                ? $path = Yii::getPathOfAlias(Yii::app()->getModule('p3media')->params['publicRuntimeAlias'])
                : $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . Yii::app()->getModule('p3media')->params['publicRuntimePath'];
        } else {
            !empty(Yii::app()->controller->module->params['protectedRuntimeAlias'])
                ? $path = Yii::getPathOfAlias(Yii::app()->getModule('p3media')->params['protectedRuntimeAlias'])
                : $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . Yii::app()->getModule('p3media')->params['protectedRuntimePath'];
        }

        if (!is_dir($path)) {
            Yii::log('Creating render path in ' . $path, CLogger::LEVEL_INFO, 'p3pages.actions.P3MediaImageAction');
            if (!@mkdir($path, 0777, true)) {
                throw new CException("Unable to create render path in '{$path}'");
            }
        }

        if (!is_writable($path)) {
            throw new Exception('Runtime data path ' . $path . ' not writable');
        }

        return $path;
    }

    private static function findModel($identifier) {
        if(key($identifier) == 'id') {
            $model = P3Media::model()->findByPk(
                    $identifier[key($identifier)]); // TODO?
        } elseif(key($identifier) == 'nameId') {
            $model = P3Media::model()->findByAttributes(
                    array(key($identifier) => $identifier[key($identifier)])); // TODO?
        }
        return $model;
  }

    private static function generateHash($model, $preset) {
        $pathInfo = pathinfo($model->path);
        $hash = $model->title . "-" . substr(sha1($model->hash . CJSON::encode($preset->toArray())), 0, 10) . "-" . $model->id;
        if (isset($preset['type'])) {
            $hash = $hash . '.' . $preset['type'];
        } else {
            $hash = $hash . '.' . $pathInfo['extension'];
        }
        return $hash;
    }

    private static function generateImage($src, $dest, $preset) {
        try {
            $image = Yii::app()->image->load($src);
        } catch (Exception $e) {
            Yii::log($e->getMessage() . ' ' . $src, CLogger::LEVEL_ERROR, "p3pages.actions.P3MediaImageAction");
            return false;
        }
        if (isset($preset['commands'])) {
            $commands = $preset['commands'];
            foreach ($commands as $command => $value) { // FIXME refelction, see API
                if ($command == 'savePublic') {
                    continue;
                }
                $count = count($value);
                switch ($count) {
                    case '2':
                        $image->$command($value[0], $value[1]);
                        break;
                    case '3':
                        $image->$command($value[0], $value[1], $value[2]);
                        break;
                    case '4':
                        $image->$command($value[0], $value[1], $value[2], $value[3]);
                        break;
                    default:
                        $image->$command($value);
                        break;
                }
            }
        }


        try {
            $image->save($dest);
            return true;
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, "p3pages.actions.P3MediaImageAction");
            return false;
        }
    }

    private static function sendImage($image, $filename, $preset) {

        $etag = md5_file($image);
        header("Etag: $etag");

        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])
            &&
            (strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == filemtime($image))) {
            // send the last mod time of the file back
            header('Last-Modified: '.gmdate('D, d M Y H:i:s', filemtime($image)).' GMT',
                true, 304);
            Yii::app()->end();
        }


        $offset = 60 * 60 * 24 * 365;
        if($expiringDate = gmdate("D, d M Y H:i:s", time() + $offset)) {
            header("Expires: $expiringDate GMT");
        }
        if($lastModified = gmdate("D, d M Y H:i:s", filemtime($image))) {
            header("Last-Modified: $lastModified GMT");
        }
        if($filesize = filesize($image)) {
            header("Content-Length: " . $filesize . "");  // bugs with FF + Flash + ImageLoading - REWORKED - size bug before?
        }
                
       
        if ($preset['contentDisposition'] === 'attachment') {
            header("Content-Disposition: attachment; filename=\"" . $filename . "\";\n\n");
        } else {
            header("Content-Disposition: inline; filename=\"" . $filename . "\";\n\n");
        }

        if ($preset['noCache'] === true) {
            header("Cache-Control: no-store,max-age=0,must-revalidate");
            header("Pragma: public");
            header("Pragma: public_no_cache");
        } else {
            header('Cache-Control: max-age=0');// . $offset);
            header("Pragma:");
        }

        if (function_exists("mime_content_type")) {
            $mime = mime_content_type($image);
        } else if (function_exists("finfo_open")) {
            // untested(!)
            $finfo = finfo_open(FILEINFO_MIME);
            $m = finfo_file($finfo, $image);
            finfo_close($finfo);
        } else {
            $getimagesize = getimagesize($image);
            $mime = $getimagesize['mime'];
        }

        header('Content-type: ' . $mime);
        readfile($image);
        Yii::app()->end();
    }

    private static function sendErrorImage($preset) {
        header('Content-Type: png');
        $path = self::prepareRenderPath($preset['savePublic']);
        $outFile = $path . DIRECTORY_SEPARATOR . "missing-" . substr(sha1(serialize($preset)), 0, 10) . ".png";
        if (!is_file($outFile)) {
            self::generateImage(Yii::getPathOfAlias('p3media.images') . DIRECTORY_SEPARATOR . 'missing.png', $outFile, $preset);
        }
        self::sendImage($outFile, 'error', $preset);
    }

}

?>

<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\FileHelper;

/**
 * Allows to flush all cache dirs and assets dirs.
 *
 * Class FlushController
 * @package console\controllers
 */
class FlushController extends Controller
{
    static $caches = [
        [
            'dir' => '@frontend/runtime/cache',
            'type' => 'cache',
            'title' => 'Frontend cache',
        ],
        [
            'dir' => '@backend/runtime/cache',
            'type' => 'cache',
            'title' => 'Backend cache',
        ],
        [
            'dir' => '@console/runtime/cache',
            'type' => 'cache',
            'title' => 'Console cache',
        ],
        [
            'dir' => '@frontend/web/assets',
            'type' => 'assets',
            'title' => 'Frontend assets cache',
        ],
        [
            'dir' => '@backend/web/assets',
            'type' => 'assets',
            'title' => 'Backend assets cache',
        ],
    ];

    public function actionCache()
    {
        foreach (static::$caches as $cache) {
            if ($cache['type'] == 'cache') {
                $this->stdout($cache['title'] . ' (' . $cache['dir'] . ")\t");
                if (static::flushDir($cache['dir'])) {
                    $this->stdout("OK\t");
                } else {
                    $this->stdout("Fail\t");
                }
                $this->stdout("\n");
            }
        }
        return static::EXIT_CODE_NORMAL;
    }

    public function actionAll()
    {
        foreach (static::$caches as $cache) {
            $this->stdout($cache['title'] . ' (' . $cache['dir'] . ")\t");
            if (static::flushDir($cache['dir'])) {
                $this->stdout("OK\t");
            } else {
                $this->stdout("Fail\t");
            }
            $this->stdout("\n");
        }
        return static::EXIT_CODE_NORMAL;
    }

    private static function flushDir($dir, $options = [])
    {
        $dir = FileHelper::normalizePath(Yii::getAlias($dir));
        if (is_dir($dir)) {

            if (!is_link($dir) || isset($options['traverseSymlinks']) && $options['traverseSymlinks']) {
                if (!($handle = opendir($dir))) {
                    return false;
                }
                while (($file = readdir($handle)) !== false) {
                    if ($file === '.' || $file === '..' || $file == '.gitignore' || $file == '.gitkeep') {
                        continue;
                    }
                    $path = $dir . DIRECTORY_SEPARATOR . $file;
                    if (is_dir($path)) {
                        FileHelper::removeDirectory($path, $options);
                    } else {
                        unlink($path);
                    }
                }
                closedir($handle);
            }
            return true;
        }
        return false;
    }
}
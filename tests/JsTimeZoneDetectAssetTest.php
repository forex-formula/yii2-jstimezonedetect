<?php

namespace yii\jstimezonedetect\tests;

use DirectoryIterator;
use yii\helpers\FileHelper;
use yii\jstimezonedetect\JsTimeZoneDetectAsset;
use yii\phpunit\TestCase;
use Yii;

class JsTimeZoneDetectAssetTest extends TestCase
{

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();
        $iterator = new DirectoryIterator(Yii::$app->getAssetManager()->basePath);
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isDir() && !$fileInfo->isDot()) {
                $directory = $fileInfo->getPathname();
                FileHelper::removeDirectory($directory);
                $this->assertDirectoryNotExists($directory);
            }
        }
    }

    public function testBundle()
    {
        $bundle = Yii::$app->getAssetManager()->getBundle(JsTimeZoneDetectAsset::className());
        $this->assertInstanceOf('yii\jstimezonedetect\JsTimeZoneDetectAsset', $bundle);
        $this->assertArrayHasKey(0, $bundle->js);
        $this->assertFileExists($bundle->basePath . DIRECTORY_SEPARATOR . $bundle->js[0]);
    }
}

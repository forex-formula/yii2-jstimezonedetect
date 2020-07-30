<?php

namespace yii\jstimezonedetect;

use yii\web\AssetBundle;

class JsTimeZoneDetectAsset extends AssetBundle
{

    public $sourcePath = '@vendor/pellepim/jstimezonedetect/dist';

    public $js = ['jstz.min.js'];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        $js = <<<JS
var timeZone = jstz.determine();
document.cookie = 'tz=' + timeZone.name() + '; path=/';
JS;
        $view->registerJs($js);
    }
}

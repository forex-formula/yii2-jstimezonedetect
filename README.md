# yii2-jstimezonedetect

Yii 2 jsTimeZoneDetect Asset

https://pellepim.bitbucket.io/jstz/

## Configuration

```php
<?php

$timeZone = yii\jstimezonedetect\TimeZone::detect(); 

return [
    'timeZone' => $timeZone,
    'components' => [
        'formatter' => ['defaultTimeZone' => $timeZone],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'on afterOpen' => function (yii\base\Event $event) {
                /* @var $db yii\db\Connection */
                $db = $event->sender;
                $db->createCommand('SET time_zone = :timeZone;', ['timeZone' => date('P')])->execute();
            }
        ]
    ]
];
```

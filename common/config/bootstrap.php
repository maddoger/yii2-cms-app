<?php

Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('frontendUrl', '/');

Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('backendUrl', '/administrator');

Yii::setAlias('static', dirname(dirname(__DIR__)) . '/static');
Yii::setAlias('staticUrl', '/static');

Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

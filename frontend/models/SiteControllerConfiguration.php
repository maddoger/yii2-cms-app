<?php

namespace frontend\models;

use maddoger\core\models\ConfigurationModel;

/**
 * Configuration model example
 * @package frontend\models
 */
class SiteControllerConfiguration extends ConfigurationModel
{
    /**
     * @var string
     */
    public $layout = 'main';

    public $title = 'Default title';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'layout'], 'string'],
            ['title', 'string', 'min' => 5],
            ['layout', 'in', 'range' => ['main', 'text']],
        ];
    }
}
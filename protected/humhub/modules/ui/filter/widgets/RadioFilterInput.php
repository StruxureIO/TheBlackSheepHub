<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\ui\filter\widgets;

use yii\helpers\ArrayHelper;

class RadioFilterInput extends CheckboxFilterInput
{
    const STYLE_CHECKBOX = 'checkbox';
    const STYLE_RADIO = 'radio';
    const STYLE_CUSTOM = 'custom';

    /**
     * @var string data-action-click handler of the input event
     */
    public $clickAction = 'toggleFilter';

    /**
     * @inheritdoc
     */
    public $type = 'radio';

    public $force = false;

    public $style;

    /**
     * @var string radio group
     */
    public $radioGroup;

    public function init()
    {
        if(!$this->style) {
            $this->style = ($this->force) ? static::STYLE_RADIO : static::STYLE_CHECKBOX;
        }

        if($this->style === static::STYLE_RADIO) {
            $this->iconActive = 'fa-dot-circle';
            $this->iconInActive = 'fa-circle';
        }
    }

    /**
     * @inheritdoc
     */
    public function prepareOptions()
    {
        parent::prepareOptions();
        $this->options['data-action-click'] = $this->clickAction;
        $this->options['data-radio-group'] = $this->radioGroup;
        $this->options['data-filter-value'] = $this->value;

        if($this->force) {
            $this->options['data-radio-force'] = 1;
        }
    }

}

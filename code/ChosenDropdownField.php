<?php

/**
 * Class SilverStripeChosenDropdownField
 */
class SilverStripeChosenDropdownField extends DropdownField
{

    /**
     * @var bool
     */
    private static $require_css = true;

    /**
     * @var array
     */
    protected $chosen_config = [];

    /**
     * @param array $properties
     * @return HTMLText
     */
    public function Field($properties = [])
    {

        $this->addExtraClass('chosen-select')
            ->setAttribute('data-ss-chosen-config', Convert::array2json($this->chosen_config));

        if ($this->config()->get('require_css') === true) {
            Requirements::css(CHOSEN_DROPDOWN_FIELD_DIR_THIRD_PARTY_DIR . 'chosen_v1.6.2/chosen.css');
        }

        Requirements::javascript(CHOSEN_DROPDOWN_FIELD_DIR_THIRD_PARTY_DIR . 'chosen_v1.6.2/chosen.jquery.min.js');
        Requirements::javascript(CHOSEN_DROPDOWN_FIELD_JAVASCRIPT . '/chosen.dropdown.field.js');

        return parent::Field($properties);
    }

    /**
     * @param null $key
     * @param null $val
     * @return $this
     */
    public function setChosenConfig($key = null, $val = null)
    {
        if ($key === null || $val === null) {
            user_error('Both $key and $val need to have non-null values in setChosenConfig()', E_USER_ERROR);
        }
        $this->chosen_config[$key] = $val;
        return $this;
    }

    /**
     * @return array
     */
    public function getChosenConfig()
    {
        return $this->chosen_config;
    }

}
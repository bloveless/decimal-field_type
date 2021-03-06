<?php namespace Anomaly\DecimalFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class DecimalFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DecimalFieldType
 */
class DecimalFieldType extends FieldType
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.decimal::input';

    /**
     * The field type rules.
     *
     * @var array
     */
    protected $rules = [
        'numeric'
    ];

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'float';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'separator' => ',',
        'point'     => '.',
        'decimals'  => 2,
        'min'       => 0
    ];

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        if ($min = array_get($this->config, 'min')) {
            $rules[] = 'min:' . $min;
        }

        if ($max = array_get($this->config, 'max')) {
            $rules[] = 'max:' . $max;
        }

        return $rules;
    }
}

<?php

namespace ZPhal\Models;

class Resourcemeta extends \Phalcon\Mvc\Model
{

    public $meta_id;

    public $resource_id;

    public $meta_key;

    public $meta_value;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("zphaldb");
        $this->setSource("zp_resourcemeta");

        $this->belongsTo(
            "resource_id",
            "ZPhal\\Models\\Resources",
            "resource_id"
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'zp_resourcemeta';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZpResourcemeta[]|ZpResourcemeta|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZpResourcemeta|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

namespace Hunters\GenderToppik\Model\ResourceModel\Order\Grid;

use Magento\Sales\Model\ResourceModel\Order\Grid\Collection as OrderCollection;

/**
 * Class Collection
 * @package Hunters\GenderToppik\Model\ResourceModel\Order\Grid
 */
class Collection extends OrderCollection
{
    /**
     * @return Collection|OrderCollection|void
     */
    public function _initSelect()
    {
        parent::_initSelect();

        $this->getSelect()
            ->joinLeft(
                ['orders' => 'sales_order'],
                "(main_table.entity_id = orders.entity_id)",
                [
                    'orders.gender_toppik as gender_toppik'
                ]
            );
    }
}

<?php

namespace Hunters\GenderToppik\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class GenderToppik
 * @package Hunters\GenderToppik\Ui\Component\Listing\Column
 */
class GenderToppik extends Column
{
    /**
     * PartialPayment constructor.
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array              $components
     * @param array              $data
     */
    public function __construct(
        ContextInterface            $context,
        UiComponentFactory          $uiComponentFactory,
        array $components           = [],
        array $data                 = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
		$gender = $item['gender_toppik'] ?? NULL;
                $item[$this->getData('name')] = $gender == NULL ? "MULL" :
					ucfirst($gender);
            }
        }
        return $dataSource;
    }
}

<?php

namespace Loreena\AdvMessages\Block;

use Loreena\AdvMessages\Helper\Advmessages as AdvmessagesConfig;
use Magento\Framework\View\Element\Template\Context;

class Advmessage extends \Magento\Framework\View\Element\Template
{
	/**
	 * @var Context
	 */
	protected $context;
	/**
	 * @var AdvmessagesConfig
	 */
	protected $configHelper;
	/**
	 * @param Context         $context
	 * @param AdvmessagesConfig $configHelper
	 */
	public function __construct(
		Context $context,
		AdvmessagesConfig $configHelper
	) {
		parent::__construct($context);
		$this->configHelper = $configHelper;
	}

	/**
	 * Returns Newsletter Popup config
	 *
	 * @return array
	 */
	public function getConfig()
	{
		return [
			'headerFoldable' => $this->isHeaderAdvMessageFoldable()
		];
	}

	/**
	 * Header banner Text.
	 *
	 * @return string
	 */
	public function getHeaderAdvMessageText()
	{
		return $this->configHelper->getConfigParam(AdvmessagesConfig::HEADER_BANNER_TEXT);
	}

	/**
	 * Header banner foldable config.
	 *
	 * @return boolean
	 */
	public function isHeaderAdvMessageFoldable()
	{
		return $this->configHelper->getConfigParam(AdvmessagesConfig::HEADER_BANNER_FOLDABLE);
	}

}

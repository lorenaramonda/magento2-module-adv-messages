<?php

namespace Loreena\AdvMessages\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Stdlib\CookieManagerInterface;

class Advmessages extends AbstractHelper
{

	const BASE_CONFIG_XML_PREFIX  = 'loreena_advmessages/header_banner_settings/%s';
	const HEADER_BANNER_TEXT      = 'text';
	const HEADER_BANNER_FOLDABLE  = 'foldable';

	/**
	 * @var \Magento\Framework\Stdlib\CookieManagerInterface
	 */
	protected $cookieManager;

	/**
	 * @param Context $context
	 */
	public function __construct(
		Context $context,
		CookieManagerInterface $cookieManager)
	{
		parent::__construct($context);
		$this->cookieManager = $cookieManager;
	}

	/**
	 * Return configuration param from module admin settings
	 *
	 * @param string $configField
	 * @return mixed
	 */
	public function getConfigParam($configField)
	{

		return $this->scopeConfig->getValue(
			sprintf(self::BASE_CONFIG_XML_PREFIX, $configField),
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);

	}

	/**
	 * Get data from cookie set in remote address
	 *
	 * @return value
	 */
	public function getCookie($name)
	{
		return $this->cookieManager->getCookie($name);
	}

}

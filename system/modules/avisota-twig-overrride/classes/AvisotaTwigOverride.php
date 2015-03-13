<?php

/**
 * Avisota newsletter and mailing system
 * Copyright (C) 2015 Avisota
 *
 * PHP version 5
 *
 * @copyright  Avisota 2015
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @package    avisota/conto-twig-override
 * @license    LGPL-3.0+
 * @filesource
 */


/**
 * Class AvisotaTwigOverride
 *
 * Overrides defined twig templates
 */
class AvisotaTwigOverride extends \TwigTemplate
{

	/**
	 * If find by globals settings overrides the templates
	 *
	 * Override hierarchy defined by $types
	 *
	 * @param $buffer
	 * @param $context
	 * @param $template
	 *
	 * @return mixed
	 */
	public function parseTwigTemplate($buffer, $context, $template)
	{
		if ($GLOBALS['AvisotaTwigOverride'] && is_array($GLOBALS['AvisotaTwigOverride'])) {
			if (is_object($context['message'])) {
				$this->templateName  = $template->templateName;
				$this->format        = $template->format;
				$this->fileExtension = $template->fileExtension;

				$types = array('theme', 'layout', 'message');

				foreach ($types as $type) {
					if (is_array($GLOBALS['AvisotaTwigOverride'][$type])) {
						$method = 'overrideBy' . str_replace($type[0], strtoupper($type[0]), $type);

						$buffer = $this->$method($buffer, $context, $GLOBALS['AvisotaTwigOverride'][$type]);
					}
				}
			}
		}

		return $buffer;
	}


	/**
	 * Override by message method
	 *
	 * @param $buffer
	 * @param $context
	 * @param $overrides
	 *
	 * @return string
	 */
	protected function overrideByMessage($buffer, $context, $overrides)
	{
		if (is_array($overrides)) {
			foreach ($overrides as $override) {
				$methode = 'get' . str_replace($override[0][0], strtoupper($override[0][0]), $override[0]);

				if ($context['message']->$methode() === $override[1] && $this->templateName === $override[2]) {
					$this->templateName = $override[3];

					$buffer = $this->parse($context);

					$this->templateName = $override[2];
				}
			}
		}

		return $buffer;
	}


	/**
	 * Overrides by layout method
	 *
	 * @param $buffer
	 * @param $context
	 * @param $overrides
	 *
	 * @return string
	 */
	protected function overrideByLayout($buffer, $context, $overrides)
	{
		if (is_array($overrides)) {
			foreach ($overrides as $override) {
				$methode = 'get' . str_replace($override[0][0], strtoupper($override[0][0]), $override[0]);

				if ($context['message']->getLayout()
									   ->$methode() === $override[1] && $this->templateName === $override[2]
				) {
					$this->templateName = $override[3];

					$buffer = $this->parse($context);

					$this->templateName = $override[2];
				}
			}
		}

		return $buffer;
	}


	/**
	 * Overrides by theme method
	 *
	 * @param $buffer
	 * @param $context
	 * @param $overrides
	 *
	 * @return string
	 */
	protected function overrideByTheme($buffer, $context, $overrides)
	{
		if (is_array($overrides)) {
			foreach ($overrides as $override) {
				$methode = 'get' . str_replace($override[0][0], strtoupper($override[0][0]), $override[0]);

				if ($context['message']->getLayout()
									   ->getTheme()
									   ->$methode() === $override[1] && $this->templateName === $override[2]
				) {
					$this->templateName = $override[3];

					$buffer = $this->parse($context);

					$this->templateName = $override[2];
				}
			}
		}

		return $buffer;
	}
}
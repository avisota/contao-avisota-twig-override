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

$GLOBALS['TL_HOOKS']['parseTwigTemplate'][] = array('AvisotaTwigOverride', 'parseTwigTemplate');

/*
 * Example ORIGINALTEMPLATE
 *
 * ORIGINALTEMPLATE = avisota/message/renderer/mailchimp/mce_text
 * you don't write system/modules/avisota/message/renderer/mailchimp/mce_text
 * ypu don't write prefix by filename
 */

/*
 * Example NEWTEMPLATE
 *
 * NEWTEMPLATE = project/file
 * you don't write templates/project/file
 * ypu don't write prefix by filename
 */

// Example override by theme id
//$GLOBALS['AvisotaTwigOverride']['theme'][] = array('id', 'ID', 'ORIGINALTEMPLATE', 'NEWTEMPLATE');

// Example override by theme alias
//$GLOBALS['AvisotaTwigOverride']['theme'][] = array('alias', 'ALIAS', 'ORIGINALTEMPLATE', 'NEWTEMPLATE');

// Example override by layout id
//$GLOBALS['AvisotaTwigOverride']['layout'][] = array('id', 'ID', 'ORIGINALTEMPLATE', 'NEWTEMPLATE');

// Example override by layout alias
//$GLOBALS['AvisotaTwigOverride']['layout'][] = array('alias', 'ALIAS', 'ORIGINALTEMPLATE', 'NEWTEMPLATE');

// Example override by message id
//$GLOBALS['AvisotaTwigOverride']['message'][] = array('id', 'ID', 'ORIGINALTEMPLATE', 'NEWTEMPLATE');

// Example override by message alias
//$GLOBALS['AvisotaTwigOverride']['message'][] = array('alias', 'ALIAS', 'ORIGINALTEMPLATE', 'NEWTEMPLATE');

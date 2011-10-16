<?php

namespace Evolution\Site;
use Evolution\Kernel\Service;
use Evolution\Kernel\Configure;

/**
 * Load EvolutionSDK Kernel
 */
define('Evolution\\Site\\Root', dirname(__DIR__));

$e = dirname(Root) . '/EvolutionSDK/kernel/startup.php';

if(!is_file($e))
	die("Could not find EvolutionSDK startup file at <code>$e</code>");

require_once($e);

/**
 * Add standard configurations
 * TODO: David make this load from JSON
 */
\Evolution\Kernel\Load::from(Root . '/bundles');
Configure::add('portal.location', Root . '/portals');
Configure::add('controller.location', Root . '/controllers');

/**
 * Finally, start the kernel
 */
Service::complete('kernel:startup');
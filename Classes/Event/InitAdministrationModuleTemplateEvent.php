<?php

declare(strict_types=1);

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace DERHANSEN\SfEventMgt\Event;

use DERHANSEN\SfEventMgt\Controller\AdministrationController;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

/**
 * This event is triggered when the module template of the administration module is initialized.
 * The event can be used to e.g. add custom menus, buttons or JavaScript.
 */
final class InitAdministrationModuleTemplateEvent
{
    public function __construct(
        private readonly ModuleTemplate $moduleTemplate,
        private readonly UriBuilder $uriBuilder,
        private readonly AdministrationController $administrationController
    ) {
    }

    public function getModuleTemplate(): ModuleTemplate
    {
        return $this->moduleTemplate;
    }

    public function getUriBuilder(): UriBuilder
    {
        return $this->uriBuilder;
    }

    public function getAdministrationController(): AdministrationController
    {
        return $this->administrationController;
    }
}

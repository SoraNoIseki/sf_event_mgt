<?php

defined('TYPO3') or die();

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

$slugBehaviour = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('sf_event_mgt', 'slugBehaviour');

/**
 * Add slug field to sys_category record (same field name as ext:news)
 */
$newSysCategoryColumns = [
    'slug' => [
        'exclude' => true,
        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:pages.slug',
        'displayCond' => 'VERSION:IS:false',
        'config' => [
            'type' => 'slug',
            'size' => 50,
            'generatorOptions' => [
                'fields' => ['title'],
                'replacements' => [
                    '/' => '-',
                ],
            ],
            'fallbackCharacter' => '-',
            'eval' => $slugBehaviour,
            'default' => '',
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $newSysCategoryColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_category',
    'slug',
    '',
    'after:title'
);

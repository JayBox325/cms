<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace crafttests\unit\services;

use Codeception\Test\Unit;
use Craft;
use UnitTester;
use yii\base\NotSupportedException;

/**
 * Unit tests for ProjectConfig service.
 *
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @author Global Network Group | Giel Tettelaar <giel@yellowflash.net>
 * @since 3.3.16
 */
class ProjectConfigTest extends Unit
{
    // Public Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public Methods
    // =========================================================================

    // Tests
    // =========================================================================

    // @TODO: more tests, obviously.

    /**
     * @param $result
     * @param array $uriParts
     * @param string $template
     * @param string|null $siteUid
     * @param string|null $routeUid
     */
    public function testRebuildIgnoresReadOnly()
    {
        $projectConfig = Craft::$app->getProjectConfig();
        $readOnly = $projectConfig->readOnly;
        $projectConfig->readOnly = true;

        $failToSet = function () use ($projectConfig) {
            $projectConfig->set('oops', true);
        };

        // Must trigger exception
        $this->tester->expectException(NotSupportedException::class, $failToSet);

        // Must not trigger exception
        $projectConfig->rebuild();

        $projectConfig->readOnly = $readOnly;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function _before()
    {
        parent::_before();
    }
}

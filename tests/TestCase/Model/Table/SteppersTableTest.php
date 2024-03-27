<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SteppersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SteppersTable Test Case
 */
class SteppersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SteppersTable
     */
    protected $Steppers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Steppers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Steppers') ? [] : ['className' => SteppersTable::class];
        $this->Steppers = $this->getTableLocator()->get('Steppers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Steppers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SteppersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

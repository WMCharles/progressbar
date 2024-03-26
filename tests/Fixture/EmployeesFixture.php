<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFixture
 */
class EmployeesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '1e405963-2bea-4bff-a9d9-8c851866f41f',
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'created' => '2024-03-26 05:06:58',
                'modified' => '2024-03-26 05:06:58',
            ],
        ];
        parent::init();
    }
}

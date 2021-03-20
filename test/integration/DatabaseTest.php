<?php

namespace adamCameron\serviceOnlyContainers\test\integration;

use PHPUnit\Framework\TestCase;
use \PDO;

class DatabaseTest extends TestCase
{

    private PDO $connection;

    protected function setUp(): void
    {
        $credentials = $this->getCredentialsFromEnv();
        $this->connection = new PDO(
            'mysql:dbname=serviceonlycontainers;host=database.backend',
            $credentials->user,
            $credentials->password
        );
    }

    /**
     * @testDox It can read expected data from the database
     * @coversNothing
     */
    public function testDatabaseRead()
    {

        $statement = $this->connection->query("
            SELECT
                id, value
            FROM
                test
            ORDER BY
                id
        ");
        $statement->execute();

        $testRecords = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->assertCount(2, $testRecords);
        $this->assertEquals(
            [
                ['id' => '101', 'value' => 'Test row 1'],
                ['id' => '102', 'value' => 'Test row 2']
            ],
            $testRecords
        );
    }

    /**
     * @testDox It can write expected data from the database
     * @coversNothing
     */
    public function testDatabaseWrite()
    {
        $testValue = 'TEST_VALUE';

        $this->connection->beginTransaction();

        $statement = $this->connection->prepare("
            INSERT INTO test (
                value
            ) VALUES (
                :value
            ) 
        ");
        $statement->execute(['value' => $testValue]);

        $statement = $this->connection->query("
            SELECT
                value
            FROM
                test
            ORDER BY
                id DESC
            LIMIT
                1
        ");
        $statement->execute();

        $testRecords = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->assertCount(1, $testRecords);
        $this->assertEquals([['value' => $testValue]], $testRecords);

        $this->connection->rollBack();
    }

    /** @SuppressWarnings(PHPMD.Superglobals) */
    private function getCredentialsFromEnv()
    {
        return (object) [
            'user' => $_ENV['MYSQL_USER'],
            'password' =>$_ENV['MYSQL_PASSWORD']
        ];
    }
}

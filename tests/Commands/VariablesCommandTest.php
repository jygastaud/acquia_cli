<?php

namespace AcquiaCli\Tests\Commands;

use AcquiaCli\Tests\AcquiaCliTestCase;

class VariablesCommandTest extends AcquiaCliTestCase
{

    /**
     * @dataProvider variablesProvider
     */
    public function testVariablesCommands($command, $expected)
    {
        $actualResponse = $this->execute($command);
        $this->assertSame($expected, $actualResponse);
    }

    public function variablesProvider()
    {

        $variablesList = <<<TABLE
+----------------+--------------------+
| Name           | Value              |
+----------------+--------------------+
| variable_one   | Sample Value One   |
| variable_two   | Sample Value Two   |
| variable_three | Sample Value Three |
+----------------+--------------------+
TABLE;

        return [
            [
                ['variable:create', 'uuid', 'dev', 'variable_one', 'Sample Value One'],
                '>  Adding variable variable_one:Sample Value One to Dev environment' . PHP_EOL
            ],
            [
                ['variable:delete', 'uuid', 'dev', 'variable_one'],
                '>  Removing variable variable_one from Dev environment' . PHP_EOL
            ],
            [
                ['variable:info', 'uuid', 'dev', 'variable_one'],
                '>  Sample Value One' . PHP_EOL
            ],
            [
                ['variable:list', 'uuid', 'dev'],
                $variablesList . PHP_EOL
            ],
            [
                ['variable:update', 'uuid', 'dev', 'variable_one', 'Sample Value One'],
                '>  Updating variable variable_one:Sample Value One on Dev environment' . PHP_EOL
            ]
        ];
    }
}
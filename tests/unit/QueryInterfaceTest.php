<?php

namespace Dhii\Query\Test\Unit;

use Dhii\Query\QueryInterface as Subject;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class QueryInterfaceTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @return Subject|MockObject The new instance.
     */
    protected function createSubject(): Subject
    {
        $mock = $this->getMockBuilder(Subject::class)
            ->getMockForAbstractClass();

        return $mock;
    }

    public function testCanCreateInstance()
    {
        {
            $subject = $this->createSubject();
        }

        {
            $this->assertInstanceOf(Subject::class, $subject);
        }
    }
}

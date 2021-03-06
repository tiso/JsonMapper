<?php

declare(strict_types=1);

namespace JsonMapper\Tests\Unit\Builder;

use JsonMapper\Builders\PropertyBuilder;
use JsonMapper\Enums\Visibility;
use JsonMapper\Tests\Helpers\AssertThatPropertyTrait;
use PHPUnit\Framework\TestCase;

class PropertyBuilderTest extends TestCase
{
    use AssertThatPropertyTrait;

    /**
     * @covers \JsonMapper\Builders\PropertyBuilder
     */
    public function testCanBuildPropertyWithAllPropertiesSet(): void
    {
        $property = PropertyBuilder::new()
            ->setName('enabled')
            ->setType('boolean')
            ->setIsNullable(true)
            ->setVisibility(Visibility::PRIVATE())
            ->setIsArray(false)
            ->build();

        self::assertThatProperty($property)
            ->hasName('enabled')
            ->hasType('boolean')
            ->hasVisibility(Visibility::PRIVATE())
            ->isNullable()
            ->isNotArray();
    }
}

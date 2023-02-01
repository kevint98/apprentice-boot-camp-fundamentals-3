<?php

namespace McrDigital\PhpFundamentals3\Tax;

use DateTime;
use PHPUnit\Framework\TestCase;

require_once "DefaultTaxCalculator.php";

class TaxCalculatorAfterFirstYearTest extends TestCase
{
    private static DateTime $FIRST_OF_APRIL_2017;
    private TaxCalculator $taxCalculator;

    protected function setUp(): void
    {
        self::$FIRST_OF_APRIL_2017 = new DateTime("2017-04-01");
        $this->taxCalculator = new DefaultTaxCalculator(true, false, 2018);
    }

    public function testSubsequentYearsTaxForPetrol(): void
    {
        $vehicle = new Vehicle(206, FuelType::PETROL, self::$FIRST_OF_APRIL_2017, 20000);

        $this->assertEquals(140, $this->taxCalculator->calculateTax($vehicle));
    }

    public function testSubsequentYearsTaxForElectric(): void
    {
        $vehicle = new Vehicle(206, FuelType::ELECTRIC, self::$FIRST_OF_APRIL_2017, 20000);

        $this->assertEquals(0, $this->taxCalculator->calculateTax($vehicle));
    }

    public function testSubsequentYearsTaxForAlternativeFuel(): void
    {
        $vehicle = new Vehicle(206, FuelType::ALTERNATIVE_FUEL, self::$FIRST_OF_APRIL_2017, 20000);

        $this->assertEquals(130, $this->taxCalculator->calculateTax($vehicle));
    }
}
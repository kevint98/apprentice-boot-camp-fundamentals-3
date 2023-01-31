<?php

namespace McrDigital\PhpFundamentals3\Tax;

date_default_timezone_set('UTC');

abstract class TaxCalculator
{
    private int $year;
    private bool $isStory4;
    private bool $isStory5;

    abstract function calculateTax(Vehicle $vehicle): int;

    public function __construct(bool $isStory4, bool $isStory5, ?int $year = null )
    {
        if (is_null($year)) {
            $this->year = idate('Y');
        } else {
            $this->year = $year;
        }

        $this->isStory4 = $isStory4;
        $this->isStory5 = $isStory5;
    }

    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return bool
     */
    public function isStory4(): bool
    {
        return $this->isStory4;
    }
}
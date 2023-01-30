<?php

namespace tax;

use McrDigital\PhpFundamentals3\Tax\FuelType;
use McrDigital\PhpFundamentals3\Tax\TaxCalculator;
use McrDigital\PhpFundamentals3\Tax\Vehicle;

class DefaultTaxCalculator extends TaxCalculator
{
    public function calculateTax(Vehicle $vehicle) : int
    {

        if ($vehicle->getFuelType() == FuelType::PETROL)
        {
            switch ($emissions = $vehicle->getCo2Emissions())
            {
                case 0:
                    return 0;
                case ($emissions >= 1 && $emissions <= 50) :
                    return 10;
                case ($emissions >= 51 && $emissions <= 75) :
                    return 25;
                case ($emissions >= 76 && $emissions <= 90) :
                    return 105;
                case ($emissions >= 91 && $emissions <= 100) :
                    return 125;
                case ($emissions >= 101 && $emissions <= 110) :
                    return 145;
                case ($emissions >= 111 && $emissions <= 130) :
                    return 165;
                case ($emissions >= 131 && $emissions <= 150) :
                    return 205;
                case ($emissions >= 151 && $emissions <= 170) :
                    return 515;
                case ($emissions >= 171 && $emissions <= 190) :
                    return 830;
                case ($emissions >= 191 && $emissions <= 225) :
                    return 1240;
                case ($emissions >= 226 && $emissions <= 255) :
                    return 1760;
                case ($emissions > 255) :
                    return 2070;
            }
        }

    }
}
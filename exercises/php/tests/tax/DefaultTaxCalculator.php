<?php

namespace McrDigital\PhpFundamentals3\Tax;

class DefaultTaxCalculator extends TaxCalculator
{
    public function calculateTax(Vehicle $vehicle) : int
    {

        if ($vehicle->getFuelType() == FuelType::PETROL)
        {
            return $this->petrolTaxFirstYear($vehicle);
        } else {
            switch ($emissions = $vehicle->getCo2Emissions()) {
                case 0:
                    return 0;
                case ($emissions <= 50) :
                    return 25;
                case ($emissions <= 75) :
                    return 105;
                case ($emissions <= 90) :
                    return 125;
                case ($emissions <= 100) :
                    return 145;
                case ($emissions <= 110) :
                    return 165;
                case ($emissions <= 130) :
                    return 205;
                case ($emissions <= 150) :
                    return 515;
                case ($emissions <= 170) :
                    return 830;
                case ($emissions <= 190) :
                    return 1240;
                case ($emissions <= 225) :
                    return 1760;
                case ($emissions <= 255) :
                    return 2070;
                case ($emissions > 255) :
                    return 2070;
            }
        }
        return 0;
    }

    /**
     * @param Vehicle $vehicle
     * @return int|void
     */
    public function petrolTaxFirstYear(Vehicle $vehicle)
    {
        switch ($emissions = $vehicle->getCo2Emissions()) {
            case 0:
                return 0;
            case ($emissions <= 50) :
                return 10;
            case ($emissions <= 75) :
                return 25;
            case ($emissions <= 90) :
                return 105;
            case ($emissions <= 100) :
                return 125;
            case ($emissions <= 110) :
                return 145;
            case ($emissions <= 130) :
                return 165;
            case ($emissions <= 150) :
                return 205;
            case ($emissions <= 170) :
                return 515;
            case ($emissions <= 190) :
                return 830;
            case ($emissions <= 225) :
                return 1240;
            case ($emissions <= 255) :
                return 1760;
            case ($emissions > 255) :
                return 2070;
        }
    }
}
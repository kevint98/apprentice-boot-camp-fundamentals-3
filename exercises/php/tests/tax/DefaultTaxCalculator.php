<?php

namespace McrDigital\PhpFundamentals3\Tax;

class DefaultTaxCalculator extends TaxCalculator
{

    public function calculateTax(Vehicle $vehicle) : int
    {
        $emissions = $vehicle->getCo2Emissions();
        if ($vehicle->getFuelType() == FuelType::PETROL) {
            return $this->petrolTaxFirstYear($vehicle);
        } else if ($vehicle->getFuelType() == FuelType::ALTERNATIVE_FUEL) {
            return $this->alternativeTaxFirstYear($emissions);
        } else {
            return $this->diselTaxFirstYear($emissions);
        }
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


        return 0;
    }

    /**
     * @param int $emissions
     * @return int
     */
    public function alternativeTaxFirstYear(int $emissions): int
    {
        echo 'test';
        echo $emissions;

        switch ($emissions) {
            case ($emissions <= 50):
                return 0;
            case ($emissions <= 75) :
                return 15;
            case ($emissions <= 90) :
                return 95;
            case ($emissions <= 100) :
                return 115;
            case ($emissions <= 110) :
                return 135;
            case ($emissions <= 130) :
                return 155;
            case ($emissions <= 150) :
                return 195;
            case ($emissions <= 170) :
                return 505;
            case ($emissions <= 190) :
                return 820;
            case ($emissions <= 225) :
                return 1230;
            case ($emissions <= 255) :
                return 1750;
            case ($emissions > 255) :
                return 2060;
        }
        return 0;
    }

    /**
     * @param int $emissions
     * @return int
     */
    public function diselTaxFirstYear(int $emissions): int
    {
        switch ($emissions) {
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
        return 0;
    }
}
<?php

namespace McrDigital\PhpFundamentals3\Tax;

class DefaultTaxCalculator extends TaxCalculator
{

    public function calculateTax(Vehicle $vehicle) : int
    {
        $emissions = $vehicle->getCo2Emissions();
        $isFirstYearsTax = ($this->getYear() - $vehicle->getDateOfFirstRegistration()->format('Y')) < 1;
        if($this->isStory4()){
            if(!$isFirstYearsTax && $vehicle->getListPrice() < 40000){
                switch ($vehicle->getFuelType()) {
                    case FuelType::ELECTRIC:
                        return 0;
                    case FuelType::ALTERNATIVE_FUEL :
                        return 130;
                    default :
                        return 140;
                }
            }
        } else  if ($this->isStory5()) {
            if(!$isFirstYearsTax && $vehicle->getListPrice() > 40000) {
                switch ($vehicle->getFuelType()) {
                    case FuelType::ELECTRIC:
                        return 310;
                    case FuelType::ALTERNATIVE_FUEL :
                        return 440;
                    default :
                        return 450;
                }
            }
        }

        if ($vehicle->getFuelType() == FuelType::PETROL) {
                return $this->petrolTaxFirstYear($emissions);
            } else if ($vehicle->getFuelType() == FuelType::ALTERNATIVE_FUEL) {
            return $this->alternativeTaxFirstYear($emissions);
        } else {
            return $this->dieselTaxFirstYear($emissions);
        }
    }

    /**
     * @param Vehicle $vehicle
     * @return int|void
     */
    public function petrolTaxFirstYear(int $emissions): int
    {
        if($emissions == 0) {
            return 0;
        } else if ($emissions <= 50) {
            return 10;
        } else if ($emissions <= 75) {
            return 25;
        } else if ($emissions <= 90) {
            return 105;
        } else if ($emissions <= 100) {
            return 125;
        } else if ($emissions <= 110) {
            return 145;
        } else if ($emissions <= 130) {
            return 165;
        } else if ($emissions <= 150) {
            return 205;
        } else if ($emissions <= 170) {
            return 515;
        }else if ($emissions <= 190) {
            return 830;
        }else if ($emissions <= 225) {
            return 1240;
        }else if ($emissions <= 255) {
            return 1760;
        }else {
            return 2070;
        }
    }

    /**
     * @param int $emissions
     * @return int
     */
    public function alternativeTaxFirstYear(int $emissions): int
    {
        if ($emissions <= 50) {
            return 0;
        } else if ($emissions <= 75) {
            return 15;
        } else if ($emissions <= 90) {
            return 95;
        } else if ($emissions <= 100) {
            return 115;
        } else if ($emissions <= 110) {
            return 135;
        } else if ($emissions <= 130) {
            return 155;
        } else if ($emissions <= 150) {
            return 195;
        } else if ($emissions <= 170) {
            return 505;
        }else if ($emissions <= 190) {
            return 820;
        }else if ($emissions <= 225) {
            return 1230;
        }else if ($emissions <= 255) {
            return 1750;
        }else {
            return 2060;
        }
    }

    /**
     * @param int $emissions
     * @return int
     */
    public function dieselTaxFirstYear(int $emissions): int
    {

        if($emissions == 0) {
            return 0;
        } else if ($emissions <= 50) {
            return 25;
        } else if ($emissions <= 75) {
            return 105;
        } else if ($emissions <= 90) {
            return 125;
        } else if ($emissions <= 100) {
            return 145;
        } else if ($emissions <= 110) {
            return 165;
        } else if ($emissions <= 130) {
            return 205;
        } else if ($emissions <= 150) {
            return 515;
        } else if ($emissions <= 170) {
            return 830;
        }else if ($emissions <= 190) {
            return 1240;
        }else if ($emissions <= 225) {
            return 1760;
        }else {
            return 2070;
        }
    }
}
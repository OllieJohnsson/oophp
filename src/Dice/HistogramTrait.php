<?php

namespace Oliver\Dice;

/**
 * A trait implementing HistogramInterface.
 */
trait HistogramTrait
{
    /**
     * @var array $serie  The numbers stored in sequence.
     */
    private $serie = [];



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()
    {
        return $this->serie;
    }



    /**
     * Get min value for the histogram.
     *
     * @return int with the min value.
     */
    public function getHistogramMin()
    {
        return 1;
    }



    /**
     * Get max value for the histogram.
     *
     * @return int with the max value.
     */
    public function getHistogramMax()
    {
        return max($this->serie);
    }



    public function updateSerie(array $serie)
    {
        $this->serie = array_merge($this->serie, $serie);
    }

    public function getSerie() : array
    {
        return $this->serie;
    }






    private function createHistogramArray(int $min, int $max) : array
    {
        $res = [];
        for ($i=$min; $i <= $max; $i++) {
            $res["{$i}"] = 0;
        }
        for ($i=0; $i < count($this->serie); $i++) {
            $count = 0;
            for ($j=0; $j < count($this->serie); $j++) {
                if ($this->serie[$i] == $this->serie[$j]) {
                    $count++;
                }
            }
            $res["{$this->serie[$i]}"] = $count;
        }
        return $res;
    }



    public function printHistogram(int $min = null, int $max = null)
    {
        $minVal = $min ?? min($this->serie);
        $maxVal = $max ?? max($this->serie);

        $histogramArray = $this->createHistogramArray($minVal, $maxVal);

        $res = "";
        foreach ($histogramArray as $key => $value) {
            if (($min && $max) || $value) {
                $stars = "";
                for ($i=0; $i < $value; $i++) {
                    $stars = $stars."*";
                }
                $res = $res.$key.": ".$stars."<br>";
            }
        }
        return $res;
    }
}

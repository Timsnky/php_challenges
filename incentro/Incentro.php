<?php
/**
 *
 * @author: Timothy Kimathi <timsnky@gmail.com>
 *
 * Project: challenges.
 *
 */

class Incentro
{
    public function test()
    {
        $data = [2,2,2,2,2,3,4,4,4,6];

        $data =  [1, 1, 1, 1, 50];

        $data = [0,1,3,-2,0,1,0,-3,2,3];

        $data = [2, -4, 6, -3, 9];
    }

    public function solution3($A)
    {
        $n = count($A);

        for ($P = 0; $P < $n - 1; $P++) {
            for ($Q = $P + 1; $Q < $n; $Q++) {
                $sum[$P . '_' . $Q] = abs(array_sum(array_slice($A, $P, $Q + 1 - $P)));
            }
        }

        return min($sum);
    }

    public function solution2($A)
    {
        $n = count($A);
        $depth = [-1];
        $invalidCombinations = [];

        for ($P = 0; $P < $n - 2; $P++)
        {
            for ($Q = $P + 1; $Q < $n - 1; $Q++)
            {
                for ($R = $Q + 1; $R < $n; $R++)
                {
                    if (in_array($Q.$R, $invalidCombinations)) {
                        continue;
                    }

                    //Check value decreasing
                    $valueDecreasing = true;
                    for ($i = $P + 1; $i <= $Q; $i++) {
                        if ($A[$i] >= $A[$i - 1]) {
                            $valueDecreasing = false;
                            break;
                        }
                    }

                    if (!$valueDecreasing) {
                        break;
                    }

                    //Check value increasing
                    $valueIncreasing = true;
                    for ($i = $Q + 1; $i <= $R; $i++) {
                        if ($A[$i] <= $A[$i - 1]) {
                            $valueIncreasing = false;
                            break;
                        }
                    }

                    if (!$valueIncreasing) {
                        $invalidCombinations[] = $Q.$R;
                        continue;
                    }

                    $depth[] = min($A[$P] - $A[$Q], $A[$R] - $A[$Q]);
                }

            }
        }

        return max($depth);
    }

    public  function solution1(&$A) {
        $n = sizeof($A);

        $count = 0;

        $pos = (int) (($n + 1) / 2);

        $candidate = $A[$pos];

        for ($i = 0; $i < $n; $i++) {
            if ($A[$i] == $candidate)
                $count = $count + 1;
        }

        if ($count > $pos)
            return $candidate;
        return (-1);
    }

}
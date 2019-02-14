<?php

namespace App\Service;

class FizzBuzzService
{
    /**
     * exec
     *
     * @access public
     * @return array
     */
    public function exec(int $cnt): array
    {
        $result = array();

        foreach (range(1, $cnt) as $v) {
            if ($v % 15 === 0) {
                $result[] = 'FizzBuzz';

                continue;
            }
            if ($v % 5 === 0) {
                $result[] = 'Buzz';

                continue;
            }
            if ($v % 3 === 0) {
                $result[] = 'Fizz';

                continue;
            }

            $result[] = $v;
        }

        return $result;
    }
}

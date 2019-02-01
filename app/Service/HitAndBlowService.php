<?php

namespace App\Service;

class HitAndBlowService
{
    private $answer = [];

    private $target_numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    private $answer_cnt = 0;

    private $result_string = '';

    public function __construct()
    {
        $keys = array_rand($this->target_numbers, 3);
        shuffle($keys);
        foreach ($keys as $v) {
            $this->answer[] = $this->target_numbers[$v];
        }
    }

    public function getAnswer(): int
    {
        $answer = join('', $this->answer);

        // intに変換
        return $answer + 0;
    }

    public function getAnswerCnt(): int
    {
        return $this->answer_cnt;
    }

    public function getResultString(): string
    {
        return $this->result_string;
    }

    public function checkAnswer(string $user_answer): bool
    {
        $this->answer_cnt++;
        $answer = join('', $this->answer);
        if ($user_answer === $answer) {
            $this->result_string = 'collect!';

            return true;
        }

        $user_answers = str_split($user_answer);
        if (count($user_answers) != 3) {
                throw new \Exception("3桁の数字以外が入力されたので終了します。");
        }

        $hit_cnt             = $this->getHitCnt($user_answers);
        $blow_cnt            = $this->getBlowCnt($user_answers);
        $this->result_string = "H:{$hit_cnt},B:{$blow_cnt}";

        return false;
    }

    private function getHitCnt(array $answer): int
    {
        $result = 0;
        foreach ($answer as $k => $v) {
            if (!preg_match("/^[1-9]+$/", $v)) {
                throw new \Exception("数字以外が入力されたので終了します。");
            }
            if ($v + 0 === $this->answer[$k]) {
                $result++;
            }
        }

        return $result;
    }

    private function getBlowCnt(array $answer): int
    {
        $result = 0;
        foreach ($answer as $k => $v) {
            if ($v + 0 === $this->answer[$k]) {
                continue;
            }
            if (in_array($v + 0, $this->answer, true)) {
                $result++;
            }
        }

        return $result;
    }
}

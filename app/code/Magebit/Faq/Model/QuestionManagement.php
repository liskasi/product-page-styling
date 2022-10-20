<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\QuestionManagementInterface;

class QuestionManagement implements QuestionManagementInterface
{

    public function enableQuestion($question)
    {
        $question->setData("status", 1);
        $question->save();
    }

    public function disableQuestion($question)
    {
        $question->setData("status", 0);
        $question->save();
    }
}

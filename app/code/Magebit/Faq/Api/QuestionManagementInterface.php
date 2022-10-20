<?php

namespace Magebit\Faq\Api;

interface QuestionManagementInterface
{
    public function enableQuestion($question);

    public function disableQuestion($question);
}

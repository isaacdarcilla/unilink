<?php

namespace App\Domain\Admission\Dto;

class CreateAdmissionExaminationAnswerDto
{
    public function __construct(
        public string|int $user_id,
        public string|int $academic_year_id,
        public string|int $admission_questionnaire_id,
        public string|int $admission_examination_id,
        public string|int $answer,
        public string $answer_text,
        public string|int $gathered_points,
        public string|int $correct_answer,
        public string $correct_answer_text,
        public bool $is_correct,
    ) {
    }

    public static function fromArray(array $request): CreateAdmissionExaminationAnswerDto
    {
        return new self(
            user_id: $request['user_id'],
            academic_year_id: $request['academic_year_id'],
            admission_questionnaire_id: $request['admission_questionnaire_id'],
            admission_examination_id: $request['admission_examination_id'],
            answer: $request['answer'],
            answer_text: $request['answer_text'],
            gathered_points: $request['gathered_points'],
            correct_answer: $request['correct_answer'],
            correct_answer_text: $request['correct_answer_text'],
            is_correct: $request['is_correct'],
        );
    }
}
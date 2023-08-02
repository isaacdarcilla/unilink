<?php

if (!function_exists('guidance_questions')) {
    /**
     * Get guidance questions
     * @return array
     */
    function guidance_questions(): array
    {
        return [
            1 => [
                'type' => 'text',
                'title' => 'Identify and discuss four (4) of your distinct personality traits.',
                'description' => '(You may choose from this list: Openness: open to try new things and tackle new ideas, resist new ideas, very imaginative; Conscientiousness: thoughtfulness, good impulse control, goal-directed behaviors, likes structure and schedules, mindful; Extraversion/Introversion: outgoing, excitability, sociability, assertiveness, emotional expressiveness, reserved, prefers solitude; Agreeableness: trust, kindness, affection, altruism, cares about others, empathetic; Neuroticism: sadness, moodiness, emotional instability, irritability, worrisome, easily get upset, feels anxious, difficulty in bouncing back after stressful event.)',
                'options' => null,
            ],
            2 => [
                'type' => 'text',
                'title' => 'Identify your special skills/talents/interests.',
                'description' => '(Example: public speaking, writing, self-management, communication skills- virtual and person-to-person, decision making skills, critical thinking, research, arithmetic, graphics, gaming, science, music, arts, photography, sculpting, video creation, foreign language, financial management, negotiating skills, leadership, time management, etc.)',
                'options' => null,
            ],
            3 => [
                'type' => 'text',
                'title' => 'What is your ultimate goal?',
                'description' => null,
                'options' => null,
            ],
            4 => [
                'type' => 'text',
                'title' => 'What is your guiding principle in life?',
                'description' => null,
                'options' => null,
            ],
            5 => [
                'type' => 'text',
                'title' => 'Do you discuss problems with your parents? If yes, to whom?',
                'description' => null,
                'options' => null,
            ],
            6 => [
                'type' => 'text',
                'title' => 'Do you discuss problems with your friends? If yes, to whom?',
                'description' => null,
                'options' => null,
            ],
            7 => [
                'type' => 'text',
                'title' => 'Do you enjoy the company of others? What makes you enjoy the company of others?',
                'description' => null,
                'options' => null,
            ],
            8 => [
                'type' => 'text',
                'title' => 'People/ friends you goes outside the school, please specify',
                'description' => null,
                'options' => null,
            ],
            9 => [
                'type' => 'text',
                'title' => 'Are you a loner?',
                'description' => null,
                'options' => null,
            ],
            10 => [
                'type' => 'text',
                'title' => 'Are you afraid of teachers?',
                'description' => null,
                'options' => null,
            ],
            11 => [
                'type' => 'select',
                'title' => 'What type of friends do you prefer?',
                'description' => '(Please check)',
                'options' => [
                    'older',
                    'younger',
                    'same age',
                    'all ages',
                    'adults',
                    'male',
                    'female',
                    'both gender',
                ]
            ],
            12 => [
                'type' => 'text',
                'title' => 'What are you strengths:',
                'description' => null,
                'options' => null,
            ],
            13 => [
                'type' => 'text',
                'title' => 'What are your weakness:',
                'description' => null,
                'options' => null,
            ],
            14 => [
                'type' => 'select',
                'title' => 'What are you capacities:',
                'description' => '(Please check to those that apply)',
                'options' => [
                    'Quick Learner',
                    'Creative',
                    'Orderly',
                    'Curious',
                    'Somewhat slow',
                    'Poor in comprehension',
                    'Energetic',
                    'Poor in following directions ',
                    'Easily exhausted',
                    'Imaginative',
                    'Finishes the tasks easily',
                    'Difficulty in finishing the tasks',
                ]
            ],
            15 => [
                'type' => 'text',
                'title' => 'Areas where you need help:',
                'description' => null,
                'options' => null,
            ],
            16 => [
                'type' => 'text',
                'title' => 'Comments/Suggestions:',
                'description' => null,
                'options' => null,
            ],
        ];
    }
}

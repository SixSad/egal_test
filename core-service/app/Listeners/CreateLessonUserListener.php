<?php

namespace App\Listeners;

use App\Helpers\SessionAttributes;
use App\Events\AbstractServiceEvent;
use App\Models\Lesson;
use App\Models\LessonUser;

class CreateLessonUserListener extends AbstractListener
{
    public function handle(AbstractServiceEvent $event): void
    {
        parent::handle($event);
        $attributes = SessionAttributes::getAttributes();
        $lessons = Lesson::query()->where('course_id', $attributes['course_id'])->get();

        foreach ($lessons as $lesson) {
            LessonUser::query()->create([
                'user_id' => $attributes['user_id'],
                'lesson_id' => $lesson->id,
                'is_passed' => 0
            ]);
        }
    }

}

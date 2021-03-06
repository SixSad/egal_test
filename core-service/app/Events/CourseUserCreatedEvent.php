<?php

namespace App\Events;

use App\Models\CourseUser;

class CourseUserCreatedEvent extends AbstractServiceEvent
{
    public function __construct(CourseUser $courseUser)
    {
        parent::__construct($courseUser);
    }
}

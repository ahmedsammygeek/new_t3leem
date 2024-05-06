<?php

namespace App\Enums;

enum UserType: int
{
    case ADMIN = 1;
    case TEACHER = 2;
    case ASSISTANT = 3;
}

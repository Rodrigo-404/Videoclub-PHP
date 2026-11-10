<?php

namespace app\enums;

enum ReturnMode: string
{
    case SINGLE_ELEMENT = "element";
    case ARRAY_OF_COINCIDENCES = "array";
}

<?php

namespace App\Enums;

enum DocumentType: int
{
    case Cedula = 1;

    case TarjetaIdentidad = 2;

    case CedulaExtranjeria = 3;

    case PPT = 4;

    case ReTHUS = 5;
}

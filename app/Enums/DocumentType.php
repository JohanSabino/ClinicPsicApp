<?php

namespace App\Enums;

enum DocumentType: int
{
    /**
     * psychologist and patients
     * Identify number for the colombian adults
     */
    case Cedula = 1;

    /**
     * patients
     * identify number for the under-age in colombia
     */
    case TarjetaIdentidad = 2;

    /**
     * patients
     * identify number for foreigners in colombia
     */
    case CedulaExtranjeria = 3;

    /**
     * patients
     * (permiso de protección temporal)
     */
    case PPT = 4;

    /**
     * patients
     * passport
     */
    case pasaporte = 5;

    /**
     * document types used for psychologist
     * @return DocumentType[]
     */
    public function psychologists(): array
    {
        return [self::Cedula];
    }

    /**
     * document types for psychologist
     * @return DocumentType[]
     */
    public function patients(): array
    {
        return [self::Cedula, self::TarjetaIdentidad, self::CedulaExtranjeria, self::PPT, self::pasaporte];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;

class FuncController extends Controller
{
    // Метод из четвертого модуля
    public function calculateMaterial(
        // Тип продукции
        ProductType $productType,
        // Тип материала
        MaterialType $materialType,
        // Количество получаемой продукции
        int $productQuantity,
        // Первый параметр
        float $p1,
        // Второй параметр
        float $p2,
        // Количество материала на складе
        float $storageQuantity): int
    {
        try {

            if ($productQuantity <= 0 || $p1 <= 0 || $p2 <= 0 || $storageQuantity < 0)
            {
                return -1;
            }
            // Количество необходимого материала на одну единицу продукции
            $requiredMaterial = $p1 * $p2 * $productType->coefficient * $productQuantity;

            // Количество материала с учётом брака
            $materialWithDefect = $requiredMaterial * ($materialType->defect / 100);

            // Разница между требуемым и имеющимся материалом на складе
            return max(0, ceil($materialWithDefect - $storageQuantity));
        } catch (\Exception $e) {
            return -1;
        }
    }
}

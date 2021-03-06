<?php

namespace usc\Engine;

use function cli\{line, prompt};

const COEFFICIENTS = ['water' => 24.89, 'gas' => 7.04, 'electric' => 4.2, 'drainage' => 20.2];
const TITLE = [
    'water' => 'ВОДА',
    'gas' => 'ГАЗ',
    'electric' => 'ЭЛЕКТРИЧЕСТВО',
    'drainage' => 'ВОДООТВЕДЕНИЕ',
    "garbage" => 'МУСОР',
    "hsm" => "СОДЕРЖАНИЕ ЖФ"
];
const NAMES = ['gas', 'electric', 'water', 'drainage'];
const GARBAGE_COST = 81.43;
const HSM = 672.43;

function engine()
{
    $resultCost = [];

    foreach (NAMES as $name) {
        $title = TITLE[$name];
        $coff = COEFFICIENTS[$name];

        line("{$title}");
        $actualValue = prompt("Введите новые показания счётчика");
        $oldValue = prompt("Введите старые показания счётчика");
        line();
        $resultCost[$name] = round(($actualValue - $oldValue) * $coff, 2);
    }
    //    Добавление постоянных величин
    $resultCost['garbage'] = GARBAGE_COST;
    $resultCost['hsm'] = HSM;

    $allCost = array_sum($resultCost);

    line("Итого для оплаты: {$allCost} рублей" . PHP_EOL);
    foreach ($resultCost as $name => $currentCost) {
        $title = TITLE[$name];
        line("{$title}: {$currentCost} рублей");
    }
}

<?php

namespace usc\CLI;

use function  cli\line;
use function usc\Engine\engine;

function start()
{
    line("Добро пожаловать в Калькулятор" . PHP_EOL);
    line("Давайте посчитаем все коммунальные услуги" . PHP_EOL);

    engine();
}

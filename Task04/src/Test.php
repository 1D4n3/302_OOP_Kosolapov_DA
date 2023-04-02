<?php

use App\Stack;

function runTest()
{
    echo "Cоздание СТЕКа и метод __toString:" . PHP_EOL;
    $stack = new Stack(1, 2, 3, 4, 5);
    $isChecked = "НЕ ПРОШЛА";

    $expectedResult = "[5->4->3->2->1]";
    $result = $stack->__toString();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    echo "Метод push:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $stack->push(6, 7);

    $expectedResult = "[7->6->5->4->3->2->1]";
    $result = $stack->__toString();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    echo "Метод pop:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";
    $outputStack = $stack->__toString();

    $expectedResult = 7;
    $result = $stack->pop();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Было: {$outputStack}" . PHP_EOL . "Стало: {$stack}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    echo "Метод top:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";
    $outputStack = $stack->__toString();

    $expectedResult = 6;
    $result = $stack->top();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Было: {$outputStack}" . PHP_EOL . "Стало: {$stack}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    echo "Метод isEmpty:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $stackSecond = new Stack();

    $expectedResult = "[]";
    $result = $stackSecond->__toString();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    echo "Метод copy:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $expectedResult = $stack;
    $stackSecond = $stack->copy();
    $result = $stackSecond;

    if ($expectedResult == $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    echo "Функция checkIfBalanced:" . PHP_EOL;
    $isChecked = "ПРОШЛА";

    $checkedString = "(ab[cd{}])";

    $expectedResult = $result = "Cимволы в строке {$checkedString} сбалансированы";
    if (!checkIfBalanced($checkedString)) {
        $result = "Cимволы в строке {$checkedString} НЕ сбалансированы";
        $isChecked = "НЕ ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    $isChecked = "НЕ ПРОШЛА";

    $checkedString = "(ab[cd{]}";

    $expectedResult = $result = "Cимволы в строке {$checkedString} НЕ сбалансированы";
    if (!checkIfBalanced($checkedString)) {
        $result = "Cимволы в строке {$checkedString} НЕ сбалансированы";
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;
}
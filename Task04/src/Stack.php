<?php

namespace App;

class Stack implements StackInterface
{
    private array $stack = [];

    public function __construct(mixed ...$elements)
    {
        $this->push(...$elements);
    }

    public function push(mixed ...$elements): void
    {
        foreach ($elements as $value) {
            $this->stack[] = $value;
        }
    }

    public function pop(): mixed
    {
        return array_pop($this->stack);
    }

    public function top(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        } else {
            return $this->stack[count($this->stack) - 1];
        }
    }

    public function isEmpty(): bool
    {
        return count($this->stack) === 0;
    }

    public function copy(): Stack
    {
        return new Stack(...$this->stack);
    }

    public function __toString(): string
    {
        if ($this->isEmpty()) {
            return "[]";
        }

        $output = '[';

        for ($i = count($this->stack) - 1; $i >= 0; $i--) {
            $output .= "{$this->stack[$i]}->";
        }

        return substr($output, 0, -2) . "]";
    }
}
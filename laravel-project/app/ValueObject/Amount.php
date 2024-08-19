<?php
namespace App\ValueObject;

use InvalidArgumentException;

class Amount 
{
  private $value;

  public function __construct(string $value)
  {
    $this->validateAmount($value);
    $this->value = $value;
  }

  public function validateAmount(string $value)
  {
    if (empty($value)) {
      throw new InvalidArgumentException('金額を入力してください');
    }

    if(!is_numeric($value)) {
      throw new InvalidArgumentException('金額は有効な数値である必要があります');
    }

    if (floatval($value) <= 0) {
      throw new InvalidArgumentException('金額は0より大きい必要があります。');
    }
  }
  public function getValue(): float
  {
    return $this->value;
  }
}
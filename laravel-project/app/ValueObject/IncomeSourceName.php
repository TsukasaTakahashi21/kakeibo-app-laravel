<?php
namespace App\ValueObject;

use InvalidArgumentException;

class IncomeSourceName
{
  private $value;

  public function __construct(string $value)
  {
    $this->validateIncomeSourceName($value);
    $this->value = $value;
  }

  public function validateIncomeSourceName(string $value)
  {
    if (empty($value)) {
      throw new InvalidArgumentException('カテゴリー名を入力してください');
    }

    if (strlen($value) > 50) {
      throw new InvalidArgumentException('カテゴリー名は50文字以内で入力してください');
    }
  }

  public function getValue(): string
  {
    return $this->value;
  }

  public function __toString(): string
    {
        return $this->value;
    }
}
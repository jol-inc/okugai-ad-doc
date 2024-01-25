<?php

if (! function_exists('h')) {
  /**
   * 関数の説明文
   *
   * @param  string  $xxx
   */
  function h($s)
  {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
  }
}
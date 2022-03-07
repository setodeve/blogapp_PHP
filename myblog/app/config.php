<?php

function htmlconvert($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>
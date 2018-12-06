<?php
defined('BASEPATH') or exit('No direct script access allowed');

function formatDateBR($data = null)
{
  return date("d/m/Y", strtotime($data));
}

function formatPrice($value = null)
{
  return 'R$ ' . number_format($value, 2, ',', '.');
}


<?php

/**
 * @file
 * Hooks provided by the Commerce Email Custom Order Items module.
 */

/**
 * Alter the rows of the order items table.
 * @param $rows
 *   An array of order items rows with integer keys.
 * @param $rows_info
 *   An array of meta and general data about each row.
 * @return $rows
 *   The $rows array after some modification.
 */
function hook_order_items_alter($rows, $rows_info) {
  // Re-arrange the order of the items.
  $rows_copy = $rows;
  $rows = array();
  $custom_order = array('product', 'base_price', 'shipping', 'tax', 'total');
  foreach ($custom_order as $row_type) {
    foreach ($rows_info[$row_type]['indices'] as $index) {
      $rows[] = $rows_copy[$index];
    }
  }
  return $rows;
}

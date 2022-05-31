<?php
/**
 * @version 1.0.0
 */
namespace mvc\app\Controllers;
/**
 * Product page controller
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 */
class ProductController
{
    /**
     * @param int $id
     * @param string $name
     */
    public function show(int $id, string $name = '')
    {
        echo '<h1>Product id =' . $id . '</h1>' . PHP_EOL;
        echo '<h1>Product name =' . $name . '</h1>' . PHP_EOL;

    }

}
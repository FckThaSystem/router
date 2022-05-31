<?php
/**
 * @version 1.0.0
 */
namespace mvc\app\Controllers;
/**
 * Category page controller
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 */
class Category
{
    /**
     *@return string
     */
    public function get(): string
    {
        return 'This is Category Page!' . PHP_EOL;
    }
}
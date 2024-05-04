<?php


/**
 * @param array $route
 * @return string|void
 */
/** Set Sidebar Item Active */

function setActive(array $route)
{
    if (is_array($route))
    {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}

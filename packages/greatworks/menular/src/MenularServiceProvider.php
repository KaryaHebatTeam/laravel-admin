<?php

namespace Greatworks\Menular;

use Illuminate\Support\ServiceProvider;

class MenularServiceProvider extends ServiceProvider
{
    /**
     * Splitting menu by level.
     *
     * @return array
     */
    private function split($menudata)
    {
        $splitted = array(
            'level1' => array(),
            'level2' => array(),
            'level3' => array()
        );

        foreach ($menudata as $menu) {
            if ($menu->level == '1') 
            {
                array_push($splitted['level1'], $menu);
            }
            elseif ($menu->level == '2')
            {
                array_push($splitted['level2'], $menu);
            }
            else
            {
                array_push($splitted['level3'], $menu);
            }
        }

        return $splitted;
    }

    /**
     * Mark parent menu which has a child
     *
     * @return array
     */
    private function mark($splitted)
    { 
        // Install level2 (child) to level1 (parent)
        foreach ($splitted['level2'] as $level2) {
            if ($level2->parent_id) {
                foreach ($splitted['level1'] as &$level1) {
                    if ($level1->id == $level2->parent_id) {
                        $level1['has_child'] = TRUE;
                    }
                }
            }
        }

        // Install level3 (child) to level2 (parent)
        foreach ($splitted['level3'] as $level3) {
            if ($level3->parent_id) {
                foreach ($splitted['level2'] as &$level2) {
                    if ($level2->id == $level3->parent_id) {
                        $level2['has_child'] = TRUE;
                    }
                }
            }
        }

        return $splitted;
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'menular');

        $split   = $this->split(Menular::all());
        $menular = $this->mark($split);

        view()->share('menular', $menular);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}

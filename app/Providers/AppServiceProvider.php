<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menular;

class AppServiceProvider extends ServiceProvider
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
        foreach ($splitted['level2'] as $level2) {
            if ($level2->parent_id) {
                foreach ($splitted['level1'] as &$level1) {
                    if ($level1->id == $level2->parent_id) {
                        $level1['has_child'] = TRUE;
                    }
                }
            }
        }

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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $split   = $this->split(Menular::all());
        $menu    = $this->mark($split);

        view()->share('menu', $menu);
        view()->share('exp', $menu);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

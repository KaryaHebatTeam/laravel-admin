<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menular;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Split menu based on level
     *
     * @param array $rawData Raw menu data from database
     * @return array
     */
    private function splitMenu($rawData)
    {
        $splitted = array(
            '1' => array(),
            '2' => array(),
            '3' => array()
        );

        foreach ($rawData as $menu) {
            if ($menu->level == '1')
            {
                array_push($splitted['1'], $menu);
            }
            elseif($menu->level == '2')
            {
                array_push($splitted['2'], $menu);
            }
            else
            {
                array_push($splitted['3'], $menu);
            }
        }

        return $splitted;
    }

    /**
     * Install splitted data based on their level
     *
     * @param array $splittedData Splitted menu data
     * @return array
     */
    private function installOnParent($splittedData)
    {
        $menuList = $splittedData['1'];

        // Install from level 2 on level 1
        // foreach ($splittedData['2'] as $menuLevel2) {
        //     foreach ($menuList as $menuLevel1) {
        //         if ($menuLevel2->parent_id == $menuLevel1->id)
        //         {   
        //             $menuLevel1['level_2'] = array();
        //             array_push($menuLevel1['level_2'], $menuLevel2);
        //         }
        //     }   
        // }

        // Install from level 3 on level 2
        // foreach ($splittedData['3'] as $menuLevel3) {
        //     foreach ($menuList['level_2'] as $menuLevel2) {
        //         if ($menuLevel3->parent_id == $menuLevel2->id)
        //         {
        //             $menuLevel2['level_3'] = array();
        //             array_push($menuLevel2['level_3'], $menuLevel3);
        //         }
        //     }   
        // }

        return $menuList;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ordering menu data
        // $splitted = $this->splitMenu(Menular::all());
        // $menular = $this->installOnParent($splitted);

        $menular = Menular::all();

        view()->share('menular', $menular);
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

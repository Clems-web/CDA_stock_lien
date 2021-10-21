<?php

namespace Cleme\CdaStockLien\Controller;


class HomeController {

    use RenderView;
    /**
     * Display homepage
     */
    public function homePage() {

        $user = 'Anonymous';

        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        $this->render('home', 'Welcome');
    }

}
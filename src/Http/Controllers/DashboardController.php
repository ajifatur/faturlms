<?php

namespace Ajifatur\FaturLMS\Http\Controllers;

class DashboardController extends \App\Http\Controllers\Controller
{
    /**
     * Menampilkan dashboard admin
     * 
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        // View
        return view('faturlms::template.main');
    }
}
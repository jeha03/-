<?php

namespace App\Http\Controllers\Lineage2\PersonalArea\Auth\Ajax\Admin\Promo;

 use App\Http\Controllers\Controller;
 use App\Service\PersonalArea\AdminPromo\IAdminPromo;
 use App\Service\Utils\FunctionPaginate;
 use App\Service\Utils\FunctionSupport;
 use Config;
 use Illuminate\Http\Request;
 use Lang;
 use Response;


 class AdminPromoCreate extends Controller
{
    //private $tables_db_payments;
    private $servicePromo;
    private $count;


    public function __construct(IAdminPromo $servicePromo)
    {
        $this->count = Config::get('lineage2.server.top_count_promo');
        $this->servicePromo = $servicePromo;
    }

    // /adminPromo/create
    public function create(Request $request)
    {
        $validator = $request->validate([
            'itemsnumber' => 'required|integer|max:100000000',
            'itemspromonumber' => 'required|integer|max:100000000',
            'selectitem' => 'required|integer',
        ]);

        $itemsnumber = FunctionSupport::getDataVariable("itemsnumber" , $validator);
        $itemspromonumber = FunctionSupport::getDataVariable("itemspromonumber" , $validator);
        $selectitem = FunctionSupport::getDataVariable("selectitem" , $validator);

       // info("Hello AdminPromoCreate");

        try
        {
            $arrayPromo = $this->servicePromo->createPromoCodes($itemsnumber , $itemspromonumber , $selectitem);
            $resultArrayPromo = $this->servicePromo->getAllPromoCodes();

            if(isset($arrayPromo)){

                $data_pages = FunctionPaginate::paginate($resultArrayPromo , $this->count);
                $data_pages->withPath('/adminPromo/promo_filter');
                $data_result = FunctionPaginate::unlockedData($data_pages);

                return Response::json(['success'=>Lang::get('messages.lk_admin_panel_windows_success') , 'data_result'=>$data_result]);
            }

            return Response::json(['success'=>Lang::get('messages.lk_admin_panel_windows_success') , 'data_result'=>[]]);

        }
         catch (ModelNotFoundException $exception) {
            return Response::json(['error'=>$exception->getMessage() , 'result'=>[]]);
        }
    }



}

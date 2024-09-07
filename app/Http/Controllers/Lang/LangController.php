<?php

namespace App\Http\Controllers\Lang;
use App;
use App\Http\Controllers\Controller;
use Config;
use Illuminate\Http\Request;


class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {

        return view('l2index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function change(Request $request)
    {
        $lang = $request->query('lang'); // Получаем параметр lang из строки запроса
        App::setLocale($lang); // Устанавливаем язык для текущей сессии
        session()->put('locale', $lang); // Сохраняем язык в сессии
    
        return redirect()->back(); // Возвращаем пользователя на предыдущую страницу
    }
}

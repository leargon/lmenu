<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Menu;
use App\Http\Resources\Menu as MenuResource;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::paginate(15);
        return MenuResource::collection($menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_item = Menu::findOrFail($id);
        return new MenuResource($menu_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Send order to dropbox.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postOrder($id)
    {
        $menu_item = Menu::findOrFail($id);
        Storage::disk('dropbox')->put('order'.$menu_item['id'].'.txt', 'Товар: '.$menu_item['title'].' Цена: '.$menu_item['price']);

    }
}

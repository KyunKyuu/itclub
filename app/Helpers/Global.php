<?php

use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;

function Section()
{
    $data = Section::all()->where('status', 1);
    return $data;
}

function Menu($id)
{
    $data = Menu::where('section_id', $id)->where('status', 1)->get();
    return $data;
}

function Submenu($id)
{
    $data = Submenu::where('menu_id', $id)->where('status', 1)->get();
    return $data;
}

function active($id)
{
    if (request()->segment(3)) {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3);
        $data = Submenu::where('url', $url)->where('menu_id', $id)->count();
    } else {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2);
        $data = Menu::where('url', $url)->where('id', $id)->count();
    }
    return $data > 0 ? 'active' : ' ';
}

function TitleBreadcumb()
{
    if (request()->segment(3)) {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3);
        $data = Submenu::where('url', $url)->get();
    } else {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2);
        $data = Menu::where('url', $url)->get();
    }
    return $data[0]->name;
}

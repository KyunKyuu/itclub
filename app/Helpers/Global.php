<?php

use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;

function Section()
{
    $data = Section::all();
    return $data;
}

function Menu($id)
{
    $data = Menu::where('section_id', $id)->get();
    return $data;
}

function Submenu($id)
{
    $data = Submenu::where('menu_id', $id)->get();
    return $data;
}

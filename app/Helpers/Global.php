<?php

use App\Models\Activity;
use App\Models\Menu;
use App\Models\MenuAccess;
use App\Models\Section;
use App\Models\SectionAccess;
use App\Models\Submenu;
use App\Models\SubmenuAccess;
use App\Models\Suspended;
use DeviceDetector\Parser\Client\Browser;
use Illuminate\Support\Facades\DB;

function Section()
{
    $data = DB::table('section')
        ->join('access_user_section', 'access_user_section.section_id', '=', 'section.id', 'right')
        ->where('user_id', auth()->user()->id)
        ->where('section.status', 1)
        ->where('access_user_section.deleted_at', null)
        ->orderBy('section.id', 'asc')
        ->get();
    return $data;
}

function Menu($id)
{
    $data = DB::table('menu')
        ->join('access_user_menu', 'menu.id', '=', 'menu_id',)
        ->where('section_id', $id)
        ->where('user_id', auth()->user()->id)->where('status', 1)
        ->where('access_user_menu.deleted_at', null)
        ->orderBy('menu.id', 'asc')
        ->get();

    return $data;
}

function Submenu($id)
{
    $data = DB::table('submenu')
        ->join('access_user_submenu', 'submenu.id', '=', 'access_user_submenu.submenu_id')
        ->where('user_id', auth()->user()->id)
        ->where('menu_id', $id)->where('status', 1)
        ->where('access_user_submenu.deleted_at', null)
        ->orderBy('submenu.id', 'asc')
        ->get();

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
        $submenu = Submenu::where('url', $url)->get();
        $data = Menu::where('id', $submenu[0]->menu_id)->get();
    } else {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2);
        $data = Menu::where('url', $url)->get();
    }
    return $data[0]->name;
}

function SubtitleBreadcumb()
{
    $url = '/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3);
    $data = Submenu::where('url', $url)->get();
    return $data[0];
}


function access_create($role, $id = False)
{
    $access_section = DB::table('set_access_section')->where('role_id', $role)->get();
    $access_menu = DB::table('set_access_menu')->where('role_id', $role)->get();
    $access_submenu = DB::table('set_access_submenu')->where('role_id', $role)->get();

    foreach ($access_section as $section) {
        SectionAccess::create(['section_id' => $section->section_id, 'user_id' => $id, 'created_by' => auth()->user()->id ?? 1]);
    }

    foreach ($access_menu as $menu) {
        MenuAccess::create(['menu_id' => $menu->menu_id, 'user_id' => $id, 'created_by' => auth()->user()->id ?? 1]);
    }

    foreach ($access_submenu as $submenu) {
        SubmenuAccess::create(['submenu_id' => $submenu->submenu_id, 'user_id' => $id, 'created_by' => auth()->user()->id ?? 1]);
    }
}

function access_update($role, $id = False)
{
    $access_section = SectionAccess::where('user_id', $id)->get();
    $access_menu = MenuAccess::where('user_id', $id)->get();
    $access_submenu = SubmenuAccess::where('user_id', $id)->get();

    foreach ($access_section as $section) {
        SectionAccess::where('id', $section->id)->delete();
    }

    foreach ($access_menu as $menu) {
        MenuAccess::where('id', $menu->id)->delete();
    }

    foreach ($access_submenu as $submenu) {
        SubmenuAccess::where('id', $submenu->id)->delete();
    }

    access_create($role, $id);
}


function timeMoments($date)
{
    $awal  = date_create(date('Y-m-d H:i:s', strtotime($date)));
    $akhir = date_create(); // waktu sekarang
    $diff  = date_diff($awal, $akhir);
    if ($date) {
        if ($diff->y) {
            $time = $diff->y . ' year';
        } else if ($diff->m) {
            $time = $diff->m . ' month';
        } else if ($diff->d) {
            $time = $diff->d . ' day';
        } else if ($diff->h) {
            $time = $diff->h . ' hours';
        } else if ($diff->i) {
            $time = $diff->i . ' minute';
        } else {
            $time = '';
        }
        $data = $time;
    } else {
        $data = ' ';
    }


    return $data;
}

function Suspended($id)
{
    $suspend = Suspended::where('blog_id', $id)->get()[0];
    return $suspend;
}


// !NOTE FORBIDDEN ACCESS HERE


function activity($desc)
{
    $data = url()->full();
    $link  = preg_split('/(:|-|0|com|\*|=)/', $data);
    $url = end($link);
    $code = auth()->user()->id . date('mdy') . rand(date('dm'), date('mY'));
    $activity = [
        'user_id' => auth()->user()->id,
        'url_access' => $url,
        'description' => $desc,
        'code_activity' => $code,
        'browser' => BrowserDetect()
    ];
    Activity::create($activity);
}

function uriSegment()
{
    $data = url()->full();
    $link  = preg_split('/(:|-|0|com|\*|=)/', $data);
    $url = end($link);
    $uri = explode('/', $url);

    if (count($uri) <= 3) {
        $menu = Menu::where('url', $url)->get()[0];
        if ($menu->status == 1) {
            $aksesMenu = MenuAccess::where('menu_id', $menu->id)->where('user_id', auth()->user()->id)->get();
            if ($aksesMenu->count() > 0) {
                $section = Section::where('id', $menu->section_id)->get()[0];
                if ($section->status == 1) {
                    $aksesSection = SectionAccess::where('section_id', $section->id)->where('user_id', auth()->user()->id)->get();
                    if ($aksesSection->count() > 0) {
                        return 200;
                    } else {
                        return 403;
                    }
                } else {
                    return 404;
                }
            } else {
                return 403;
            }
        } else {
            return 404;
        }
    } else {
        $submenu = Submenu::where('url', $url)->get()[0];
        if ($submenu->status == 1) {
            $aksesSubmenu = SubmenuAccess::where('submenu_id', $submenu->id)->where('user_id', auth()->user()->id)->get();
            if ($aksesSubmenu->count() > 0) {
                $menu = Menu::where('id', $submenu->menu_id)->get()[0];
                if ($menu->status == 1) {
                    $aksesMenu = MenuAccess::where('menu_id', $menu->id)->where('user_id', auth()->user()->id)->get();
                    if ($aksesMenu->count() > 0) {
                        $section = Section::where('id', $menu->section_id)->get()[0];
                        if ($section->status == 1) {
                            $aksesSection = SectionAccess::where('section_id', $section->id)->where('user_id', auth()->user()->id)->get();
                            if ($aksesSection->count() > 0) {
                                return 200;
                            } else {
                                return 403;
                            }
                        } else {
                            return 404;
                        }
                    } else {
                        return 403;
                    }
                } else {
                    return 404;
                }
            } else {
                return 403;
            }
        } else {
            return 404;
        }
    }
}

function BrowserDetect()
{
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
        $data = 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
        $data = 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
        $data = 'Mozilla Firefox';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
        $data = 'Google Chrome';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
        $data = "Opera Mini";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
        $data = "Opera";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
        $data = "Safari";
    else
        $data = 'Unknown';

    return $data;
}

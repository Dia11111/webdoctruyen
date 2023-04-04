<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class indexController extends Controller
{
    public function kytu(Request $request, $kytu)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->where('tentruyen', 'LIKE', $kytu . '%')->orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);

        return view('pages.kytu')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }

    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $truyen = Truyen::where('tinhtrang', 0)->where('tentruyen', 'LIKE', '%' . $data['keywords'] . '%')->get();

            $output = '<ul class="dropdown-menu" style="display:block;">';

            foreach ($truyen as $key => $tr) {
                $output .= '<li class="li_search_ajax m-2 border "><a class="text-dark" href="#">' . $tr->tentruyen . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function home()
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);

        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }

    public function danhmuc($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();

        $tendanhmuc = $danhmuc_id->tendanhmuc;

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'tendanhmuc', 'theloai', 'slide_truyen'));
    }

    public function theloai($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $theloai_id = Theloai::where('slug_theloai', $slug)->first();

        $tentheloai = $theloai_id->tentheloai;

        $truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();
        return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'tentheloai', 'theloai', 'slide_truyen'));
    }

    public function xemtruyen($slug)
    {
        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->with('danhmuctruyen', 'theloai')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();
        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();
        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();
        $chapter_cuoi = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyen->id)->first();
        $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();
        $truyennoibat = Truyen::where('truyen_noibat', 0)->take(20)->get();
        $truyenxemnhieu = Truyen::where('truyen_noibat', 2)->take(20)->get();

        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'cungdanhmuc', 'chapter_dau', 'theloai', 'slide_truyen', 'chapter_cuoi', 'truyennoibat', 'truyenxemnhieu'));
    }

    public function xemchapter($slug)
    {
        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Chapter::where('slug_chapter', $slug)->first();

        //breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')->where('id', $truyen->truyen_id)->first();
        //endbreadcrumb

        $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id', $truyen->truyen_id)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();

        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();

        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug_chapter');
        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug_chapter');

        return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai', 'truyen_breadcrumb', 'slide_truyen', 'truyen'));
    }
    public function timkiem(Request $request)
    {
        $data = $request->all();
        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')->orwhere('tomtat', 'LIKE', '%' . $tukhoa . '%')->orwhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->paginate(12);

        return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tukhoa'));
    }

    public function tag($tag)
    {
        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $tags = explode("-", $tag);

        $truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->where(function ($query) use ($tags) {
            for ($i = 0; $i < count($tags); $i++) {
                $query->orwhere('tukhoa', 'LIKE', '%' . $tags[$i] . '%');
            }
        })->paginate(12);

        return view('pages.tag')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tag'));
    }

    public function info_User()
    {
        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        // $user = User::find
        return view('profile.dashboard')->with(compact('danhmuc', 'slide_truyen', 'theloai'));
    }

    public function change_Pass()
    {
        $slide_truyen = Truyen::with('danhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('profile.changle-password')->with(compact('danhmuc', 'slide_truyen', 'theloai'));;
    }

    public function update_password(Request $request)
    {
        $data = $request->validate(
            [
                'old_password' => 'required|max:100',
                'new_password' => 'required|max:100',
                'confirm_password' => 'required|same:new_password',
            ],
        );
        $current_user = auth()->user();
        $user = User::findOrFail($current_user->id);
        if (Hash::check($data['old_password'], $current_user->password)) {
            $user->update([
                'password' => Hash::make($data['new_password']),
            ]);
            return redirect()->back()->with("success", "Đổi MK thành công");
        } else {
            return redirect()->back()->with("error", "Mật khẩu cũ không chính xác");
        }
    }
}

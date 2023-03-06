<?php

namespace App\Http\Controllers;

use App\Models\ThuocLoai;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Theloai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen','thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->get();
        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc', 'theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'tukhoa' => 'required',
                'tacgia'=> 'required',
                'tomtat' => 'required',
                'truyennoibat' => 'required',
                'hinhanh' => 'required|image|mimes:jpeg,jpg,png,svg,gif,jpeg | max:2048',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'kichhoat' => 'required',
                'tinhtrang' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã được chọn, xin điền tên khác',
                'slug_truyen.unique' => 'Slug trùng điền slug khác',
                'tentruyen.required' => 'Tên truyện phải có nhé',
                'tukhoa.required' => 'Từ khóa phải có nhé',
                'hinhanh.required' => 'Hình ảnh hải có',
                'tacgia.required' => 'Tác giả phải có nhé',
            ]
        );
        $data = $request->all();
        // dd($data['theloai']);
        $truyen = new truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->tinhtrang = $data['tinhtrang'];
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->danhmuc_id = $data['danhmuc'];

        foreach($data['theloai'] as $key =>$the){
            $truyen->theloai_id = $the[0];
        }

        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $truyen->hinhanh = $new_image;

        $truyen->save();

        $truyen->thuocnhieutheloaitruyen()->attach($data['theloai']);

        return redirect()->back()->with('status', 'Thêm truyện thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $truyen = Truyen::find($id);

        $thuoctheloai = $truyen->thuocnhieutheloaitruyen;

        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.edit')->with(compact('truyen', 'danhmuc', 'theloai','thuoctheloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate(
            [
                'tentruyen' => 'required|max:255',
                'tukhoa' => 'required',
                'tacgia'=> 'required',
                'tomtat' => 'required',
                'truyennoibat' => 'required',
                'slug_truyen' => 'required|max:255',
                'kichhoat' => 'required',
                'tinhtrang' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã được chọn, xin điền tên khác',
                'slug_truyen.unique' => 'Slug trùng điền slug khác',
                'tukhoa.required' => 'Từ khóa phải có nhé',
                'tacgia.required' => 'Tác giả phải có nhé',
                'tentruyen.required' => 'Tên truyện phải có nhé',
                'tomtat.required' => 'Tóm tắt phải có nhé',
            ]
        );
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->tinhtrang = $data['tinhtrang'];
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->danhmuc_id = $data['danhmuc'];

        foreach($data['theloai'] as $key =>$the){
            $truyen->theloai_id = $the[0];
        }

        $truyen->thuocnhieutheloaitruyen()->sync($data['theloai']);

        $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->hinhanh;
        if ($get_image) {
            $path = 'public/uploads/truyen/' . $truyen->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $truyen->hinhanh = $new_image;
        }

        $truyen->save();
        return redirect()->back()->with('status', 'Cập nhật truyện thành công');
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
        $truyen = Truyen::find($id);
        Truyen::find($id)->delete();
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
}

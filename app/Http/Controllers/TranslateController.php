<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
//use Illuminate\Validation\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('addtranslate');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        //  dd($request->post());
        $validated = $request->validate([
            'english' => Rule::unique('translations')->where(fn($query) => $query->where('russian', $request['russian'])),
            'russian' => 'required',
            'example' => 'required'
        ]);
        $data = $request->post();
        $data['user'] = auth()->user()->id;
        Translation::create($data);
        return redirect()->to('/edit_translate')->with('status', 'Успешно создана запись');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        $d = Translation::where('english', $id)->first();
        return view('translate', ['english' => $id, 'translates' => $d]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id = 0)
    {
        $translation = Translation::where('id', $id)->first();
        return view('edittranslate', ['translation' => $translation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     */
    public function update(Request $request)
    {
        $data = [];

        Validator::make($data, [
            'user' => [
                'required',
                Rule::in([auth()->user()->id]),
            ],
            'english' => Rule::unique('translations')
                ->where(fn($query) => $query
                    ->where('russian', $request['russian'])
                    ->where('id', '<>', $request['id'])),
            'russian' => 'required',
            'example' => 'required'
        ]);
        $data = $request->post();
        unset($data['id']);
        unset($data['user']);
        unset($data['_token']);
        Translation::where('id', $request->id)
            ->where('user', auth()->user()->id)
            ->update($data);
        return redirect()->to('/edit_translate')->with('status', 'Успешно изменена запись');
//        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

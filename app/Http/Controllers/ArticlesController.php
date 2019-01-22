<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //즉시로드
        // $articles = \App\Article::with('user')->get();

        //지연로드
        // $articles = \App\Article::get();
        // $articles->load('user');

        //paginate
        $articles = \App\Article::latest()->paginate(3);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $article = \App\User::find(1)->articles()->create($request->all());

        if (!$article) {
          return back()->with('flash_message', 'not saved')->withInput();
        }

        return redirect(route('articles.index'))->with('flash_message', 'saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__ . '는 다음 기본 키를 가진 Article 모델을 조회.'. $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . '는 다음 기본 키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환.'. $id;
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
        return __METHOD__ . '는 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 Article 모델을 수정.'. $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . '는 다음 기본 키를 가진 Article 모델을 삭제.'. $id;
    }
}

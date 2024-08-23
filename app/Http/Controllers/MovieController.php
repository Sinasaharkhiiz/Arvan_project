<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {

        $movies = "";
        if (request('search')) {
            $movies = Movie::where('Title', 'like', '%' . request('search') . '%')->paginate(15);
            $c_order = "";
        }
        elseif(request('order')) {
            if(request()->order=="newest"){
            $movies = Movie::orderBy('Year', 'DESC')->paginate(15);
            $c_order = "جدید ترین";
            }elseif(request()->order=="best"){
                $movies = Movie::orderByRaw('Rating DESC')->paginate(15);
                $c_order = "برترین";
            }elseif(request()->order=="random"){
                $movies = Movie::inRandomOrder()->paginate(15);
                $c_order = "تصادفی";
            }
        }else{
            $movies = Movie::inRandomOrder()->paginate(15);
                $c_order = "تصادفی";
        }
        return view('movie.movies', ['movies'=> $movies, 'c_order'=>$c_order]);
    }
    public function show_movie(){
        $m_data = Movie::find($_GET['id']);
        if(Auth::check()){
        $playlist = DB::table('movie_user')->where('user_id',Auth::user()->id)->where('movie_id',$_GET['id'])->get();
        if(!$playlist->toArray()){
                    //movie is not in playlist
                    $Check_playlist=0;
             }
             if($playlist->toArray()){
                    // user found
                    $Check_playlist=1;
             }
            }
            else{
            $Check_playlist=0;
            }
        $p_count = DB::table('movie_user')->where('movie_id',$_GET['id'])->count();
        $co_data = Comment::where('movie_id', '=' , $_GET['id'])->orderBy('comments.created_at', 'DESC')->paginate(3);
        return view('movie.movie', ['m_data'=> $m_data,'co_data'=>$co_data,'Check_playlist'=>$Check_playlist,'p_count'=>$p_count]);
    }
    public function add_comment(Request $req)
    {
        $comment = new Comment;
        $comment->sender_id = Auth::user()->id;
        $comment->movie_id = $req->input('m_id');
        $comment->comment=$req->input('comment');
        $comment->save();
        toast('نظر شما با موفقیت ثبت شد','success')->position('top');
        return redirect('movie/'.'?id='.$req->input('m_id'));
    }
    public function show_movies_management()
    {

        if (request('search')) {
            $all_movies = Movie::where('Title', 'like', '%' . request('search') . '%')->orWhere('id', 'like', '%' . request('search') . '%')->paginate(10);
        } else {
            $all_movies = Movie::paginate(15);
        }
        return view('movie.movies_management', ['all_movies'=> $all_movies]);

    }

    public function delete_movie(Request $req)
    {
        Movie::where('id',$req->input('movie_id'))->delete();
        toast('فیلم مورد نظر با موفقیت حذف شد','success')->position('top');
        return redirect('movies_management');
    }
    public function show_add_movie()
    {
        return view('movie.add_movie');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function rate(Request $req)
    {
        DB::table('rates')->updateOrInsert(
            [
                'user_id' => Auth::user()->id,
                'movie_id' => $req->input('m_id')
            ],
            [
                'rate' => $req->input('btnradio'),
            ]
        );
        $movie=Movie::find($req->input('m_id'));
        $averageRate = DB::table('rates')->where('movie_id', $req->input('m_id'))->where('rate', '>', 0)->avg('rate');
        $movie->Rating=$averageRate;
        $movie->save();
        toast('امتیاز شما با موفقیت ثبت شد','success')->position('top');
        return redirect('movie/'.'?id='.$req->input('m_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $movie = new Movie();
        $movie->Title=$req->input('Title');
        $movie->Genre=$req->input('Genre');
        $movie->Year=$req->input('Year');
        $movie->Duration=$req->input('Duration');
        $movie->Description = $req->input('Description');
        $movie->Director = $req->input('Director');
        $movie->Cast = $req->input('Cast');
        if($req->hasFile('cover')){
            $movie_cover = $req->input('Title').$req->input('Year').".png";
            $movie->Poster=$req->file('Poster')->storeAs('movies_poster',$movie_cover , 'public');
        }else{
            $movie->Poster = $req->input('Poster');
        }

        $movie->Publisher_id = Auth::user()->id;
        $movie->save();
        alert()->success('فیلم با موفقیت ثبت شد ','با تشکر .');
        return redirect('movies');
    }
    public function add_playlist(Request $req)
    {
        $movie = Movie::find($req->input('mo_id'));
        $user= User::find(Auth::user()->id);
        $playlist = DB::table('movie_user')->where('user_id',Auth::user()->id)->where('movie_id',$req->input('mo_id'))->get();
        if(!$playlist->toArray()){
                    //user is not found
                    $user->movies()->save($movie);
                   # $movie->downloads=$downloads+1;
                    $movie->save();
                    toast('فیلم با موفقیت به لیست مورد علاقه شما اضافه شد','success')->position('top');
             }
             if($playlist->toArray()){
                    // user found
                    toast('شما قبلا این فیلم را به لیست خود اضافه کرده اید!','warning')->position('top');
             }
             return redirect('movie'.'?id='.$req->input('mo_id'));
    }
    public function rm_playlist(Request $req){
        DB::table('movie_user')->where('user_id',Auth::user()->id)->where('movie_id',$req->input('mv_id'))->delete();
        toast('فیلم با موفقیت از لیست مورد علاقه شما حذف شد','success')->position('top');
        return redirect('movie'.'?id='.$req->input('mv_id'));
    }
    public function delete_comment(Request $req)
    {
        Comment::where('id',$req->input('com_id'))->delete();
        toast('نظر با موفقیت حذف شد','success')->position('top');
        return redirect('movie?id='.$req->Input('cou_id').'#comments');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_movie()
    {
        $m_data = Movie::find($_GET['id']);

        return view('movie.edit_movie', ['m_data'=> $m_data]);
    }
    public function edit(Request $request)
    {
    $movie = Movie::find($request->input('movie_id'));
    if($request->input('Title')) $movie->Title = $request->input('Title');
    if($request->input('Genre')) $movie->Genre = $request->input('Genre');
    if($request->input('Year')) $movie->Year = $request->input('Year');
    if($request->input('Duration')) $movie->Duration = $request->input('Duration');
    if($request->input('Description')) $movie->Description = $request->input('Description');
    if($request->input('Poster')) $movie->Poster = $request->input('Poster');
    if($request->input('Director')) $movie->Director = $request->input('Director');
    if($request->input('Cast')) $movie->Cast = $request->input('Cast');

    if($request->hasFile('cover')){
        $movie_cover = $movie->cover.".png";
        $movie->cover=$request->file('cover')->storeAs('movie_cover',$movie_cover , 'public');
        }
    $movie->save();
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('movies_management');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

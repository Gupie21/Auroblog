<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Posts;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at','DESC')->get();

        return view('pages.public.home')->with(['posts' => $posts]);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store(Request $request)
    {

        try {
            $input = $request->all();

            $post = new Posts($input);
            $post['author'] = $input['author'];
            $post['title'] = $input['title'];
            $post['slug'] = $input['slug'];
            $post['content'] = $input['content'];
            $post->save();

            $msj = 'Se ha guardado con exito.';
            $status = 'success';

        } catch (\Exception $e) {
            $msj = 'No se ha podido guardar este posts.';
            $status = 'warning';
        }

        return redirect('/')
            ->with([
                'msj'=>$msj,
                'status'=>$status,
            ]);
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('mutuoPayment.edit')
            ->with([
                'author'=> $post['author'],
                'title'=> $post['title'],
                'slug'=> $post['slug'],
                'content'=> $post['content'],
            ]);
    }

    public function update(Request $request, $id)
    {

        try {
            $input = $request->all();

            $post = Posts::findOrFail($id);
            $post['author'] = $input['author'];
            $post['title'] = $input['title'];
            $post['slug'] = $input['slug'];
            $post['content'] = $input['content'];
            $post['updated_at'] = Carbon::now()->toDateString();
            $post->save();

            $msj = 'Se ha actualizado con exito.';
            $status = 'success';

        } catch (\Exception $e) {
            $msj = 'No se ha podido actualizar este posts.';
            $status = 'warning';
        }

        return redirect('/')->with([
            'msj'=>$msj,
            'status'=>$status,
        ]);
    }

    public function destroy($id)
    {
      try {
          $post = Posts::findOrFail($id);
          $post->delete();
          return redirect()->back()->with([
              'status'=>'success',
              'msj'=>'Se eliminó el post con éxito',
          ]);
      } catch (\Exception $e) {
        return redirect()->back()->with([
            'status'=>'error',
            'msj'=>'No se ha podido eliminar el post.',
        ]);
      }
    }
}

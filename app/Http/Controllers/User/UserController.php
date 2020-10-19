<?php

namespace App\Http\Controllers\User;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Inertia\Inertia;
use App\Advertisements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|\Inertia\Response
     */
    public function index()
    {
        $advertisements = Advertisements::all()->where('id', Auth::id());
        return Inertia::render('User/AdView', [
            'advertisements' => $advertisements
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response|\Inertia\Response
     */
    public function showPostForm()
    {
        return Inertia::render('User/Post', [
            'user' => Auth::id(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|\Inertia\Response
     */
    public function create()
    {
        return Inertia::render('User/Post',[
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
//        Advertisements::create($request->all());
//        return redirect()->back();
        $postData = $this->validate($request, [
            'name' => 'required|max:50',
            'description' => 'required'
        ]);
        Advertisements::create([
            'name' => $postData['name'],
            'description' => $postData['description'],
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('dash');
    }

    /**
     * Display the specified resource.
     *
     * @param Advertisements $advertisement
     * @return Response|\Inertia\Response
     */
    public function show(Advertisements $advertisement)
    {
        $user_id = DB::select("SELECT * FROM advertisements WHERE user_id = 1");
        return Inertia::render('User/AdView', [
            'advertisement-prop' => $advertisement,
            'user_id' => $user_id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function update(Advertisements $advertisement, Request $request)
    {
        // if ($request->has('id')) {
            return Inertia::render('User/UpdatePost',[
                'advertisement-prop' => $advertisement
            ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Advertisements::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertisements $advertisement
     * @return \Inertia\Response
     */
    public function viewPost(Advertisements $advertisement): \Inertia\Response
    {
        return Inertia::render('User/ViewPost', [
            'advertisement-prop' => $advertisement
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertisements $advertisement
     * @return \Inertia\Response
     */
    public function showAllPost()
    {
        $posts = Advertisements::all();
        return Inertia::render('User/AllPost', [
            'posts' => $posts
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserUpdate;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class UserController extends Controller
{
    private $storageBasePath = 'storage';
    private $basePath = 'public/avatars';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('home', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, User $user)
    {
        $data = $request->all();
        
        if (!empty($data['photo'])) {
            $imagePath = $this->getPath($request->photo);
            $isSaved = \Storage::put($imagePath, file_get_contents($data['photo']->getRealPath()));
            if ($isSaved) {
                $data['photo'] = $request->photo->getClientOriginalName();
            }
        }

        $user->update($data);

        return redirect()->route('home');
    }

    private function getPath(UploadedFile $file): string
    {
        return $this->basePath . '/' . $file->getClientOriginalName();
    }

    private function getNowAsTimestamp(): int
    {
        return Carbon::now()->timestamp;
    }

    public function confirm(User $user)
    {
        return view('confirm', [
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('home');
    }
}

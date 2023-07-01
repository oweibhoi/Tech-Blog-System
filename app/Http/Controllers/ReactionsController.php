<?php

namespace App\Http\Controllers;

use App\Models\Reactions;

class ReactionsController extends Controller
{
    public function reaction(Reactions $reactions)
    {
        $reaction = $reactions->where('post_id', request('post_id'))
        ->where('user_id', auth()->id())
        ->get();
        
        $react = request('reacted') === 'true' ? request('reaction') : 2;
        if(count($reaction))
        {
            $reactions->where('post_id', request('post_id'))
            ->where('user_id', auth()->id())
            ->update(['reaction' => $react]);
        } 
        else 
        {
            $data = [
                'post_id' => request('post_id'),
                'reaction' => $react,
                'user_id' => auth()->id()
            ];
            $reactions->create($data);
        }

        return json_encode(['success' => true]);
    }
}

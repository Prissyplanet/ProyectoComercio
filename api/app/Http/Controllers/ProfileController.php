<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'current_password' => 'sometimes|required_with:new_password',
            'new_password' => 'sometimes|min:8|confirmed'
        ]);
        
        // Actualizar datos básicos
        $user->name = $validated['name'];
        $user->bio = $validated['bio'] ?? null;
        
        // Cambiar contraseña si se proporcionó
        if (!empty($validated['current_password'])) {
            if (!Hash::check($validated['current_password'], $user->password)) {
                return response()->json(['message' => 'La contraseña actual es incorrecta'], 422);
            }
            $user->password = Hash::make($validated['new_password']);
        }
        
        $user->save();
        
        return response()->json($user);
    }
    
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048'
        ]);
        /** @var \App\Models\User $user */

        $user = Auth::user();
        
        
        if ($user->avatar) {
            Storage::disk('public')->delete('avatars/'.$user->avatar);
        }
        
        $path = $request->file('avatar')->store('public/avatars');
        $filename = basename($path);
        
        $user->avatar = $filename;
        $user->save();
        
        return response()->json([
            'avatar_url' => asset('storage/avatars/'.$filename)
        ]);
    }
}
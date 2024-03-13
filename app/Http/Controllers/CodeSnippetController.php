<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CodeSnippetController extends Controller
{
    /**
     * @param \App\Models\CodeSnippet|null $snippet
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(CodeSnippet $snippet): View
    {
        return view('pastebin.index', [
            'content' => $snippet->content,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required',
        ]);

        $snippet = new CodeSnippet([
            'content' => $request->input('code'),
        ]);

        $request->user()
            ? $request->user()->codeSnippets()->save($snippet)
            : $snippet->save();

        return redirect()->route('pastebin', $snippet);
    }
}

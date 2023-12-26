<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMailRequest;
use App\Http\Requests\UpdateMailRequest;
use App\Jobs\ProcessMail;
use App\Mail\SendMail;
use App\Models\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Mail::paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailRequest $request)
    {
        $mail = Mail::create($request->validated());
        ProcessMail::dispatch($mail);

        return response()->json(['message' => 'Mail added in queue'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $mail)
    {
        return $mail;
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\ProductMailJob;
use App\Models\Book;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    public function products($id)
    {
        $product = Book::findOrFail($id);

        $emails = User::pluck('email')->toArray();

        foreach($emails as $email) {

            ProductMailJob::dispatch($email, $product);
        }

        return redirect()->back();
        
    }
}


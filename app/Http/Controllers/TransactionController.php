<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Failed;

class TransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::with('user', 'book')->get();

        if($transaction->isEmpty()){
            return response()->json([
                'success' => true,
                'message' => 'Resouces data not found'
            ], 200);
        }

        // return view('authors', ['authors' => $authors]);
        return response()->json([
            "success" => true,
            "message" => "Get all resource",
            "data" => $transaction
        ], 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);
        }

        // Generate norderNumber
        $uniqueCode = "ORD-".strtoupper(uniqid());

        // Cek data user, apakah sudah terdaftar
        $user = auth('api')->user();

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        // Mencari data buku dari request
        $book = Book::find($request->book_id);
        // Cek stok buku
        if($book->stock < $request->quantity){
            return response()->json([
                'success' => false,
                'message' => 'Stok barang  tidak cukup!'
            ]);
        }
        // Hitung total harga = quantity * price
        $totalAmount = $book->price * $request->quantity;

        // Kurangi stok buku(Update)
        $book->stock -= $request->quantity;
        $book->save();
        // Simpan data
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transaction
        ], 201);
    }

    public function show(string $id){
        $transaction = Transaction::with('user', 'book')->find($id);
        if(!$transaction){
            $data = [
                'success' => false,
                'message' => 'data not found',
            ];
            return response()->json($data, 404);
        }

        $data = [
            'success' => true,
            'message' => 'data is found',
            'data' => $transaction
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'data is wrong',
                'data' => $validator
            ], 422);
        }

        $input = $validator->validated();

        $dataBaru = [
            'book_id' => $input['book_id'] ?? null ?: $transaction->book_id,
            'quantity' => $input['quantity'] ?? null ?: $transaction->quantity,
        ];

        $transaction->update($dataBaru);
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully to update data',
            'data' => $dataBaru
        ], 200);
    }

    public function destroy(string $id)
    {
        $transaction = Transaction::with('user', 'book')->find($id);

        if(!$transaction){
            $data = [
                'success' => false,
                'message' => 'Data not found'
            ];
            return response()->json($data, 404);
        }

        $transaction->delete();

        $data = [
            'success' => true,
            'message' => 'Resource deleted successfully',
            'data' => $transaction
        ];
        return response()->json($data, 200);
    }
}

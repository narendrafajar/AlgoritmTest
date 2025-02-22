<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function reverseString(Request $request)
    {
       $inputString = $request->inputString;

       $data['result'] = strrev($inputString);

       return json_encode($data);
    }

    public function loopinCondition(Request $request)
    {
        // dd($request->all());
        $inputString = $request->inputString;
        $inputNumber = (int) $request->inputNumber;

        $data['oddEvenResult'] = [];
        $data['vowelConsonantResult'] = [];
        $data['factorialResult'] = [];
        $data['fibonacciResult'] = [];
        $data['primeNumbersResult'] = [];
        $data['palindromeResult'] = [];

        // **1. Ganjil & Genap**
        for ($i = 1; $i <= $inputNumber; $i++) {
            $data['oddEvenResult'][] = "$inputString - " . ($i % 2 == 0 ? "Genap" : "Ganjil") . " [$i]";
        }

        // **2. Konsonan & Vokal**
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        foreach (str_split(strtolower($inputString)) as $char) {
            $type = in_array($char, $vowels) ? "Vokal" : "Konsonan";
            $data['vowelConsonantResult'][] = strtoupper($char) . " - " . $type;
        }

        // **3. Faktorial**
        $factorial = 1;
        for ($i = 1; $i <= $inputNumber; $i++) {
            $factorial *= $i;
            $data['factorialResult'][] = "$i! = $factorial";
        }

        // **4. Fibonacci**
        $fib = [0, 1];
        for ($i = 2; $i < $inputNumber; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }
        $data['fibonacciResult'] = array_slice($fib, 0, $inputNumber);

        // **5. Bilangan Prima**
        for ($i = 2; $i <= $inputNumber; $i++) {
            $isPrime = true;
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j == 0) {
                    $isPrime = false;
                    break;
                }
            }
            if ($isPrime) {
                $data['primeNumbersResult'][] = $i;
            }
        }

        // **6. Palindrom**
        $reversed = strrev($inputString);
        $data['palindromeResult'] = ($inputString === $reversed) ? "Palindrome" : "Bukan Palindrome";

        return response()->json(['data' => $data]);
    }

    public function arrayTest(Request $request)
    {
        // Ambil data dari request
        $arrayNumber = explode(",", $request->inputString);
        $arrayNumber = array_map('trim', $arrayNumber);
        $arrayMethode = $request->methodeSelect;

        // Filter hanya angka
        $numericArray = array_filter($arrayNumber, 'is_numeric');
        $numericArray = array_map('floatval', $numericArray);

        $data = [];

        switch ($arrayMethode) {
            case '0':
                $data['result'] = implode(", ", $arrayNumber);
                $data['explain'] = "Menampilkan array dalam bentuk aslinya tanpa perubahan.";
                break;
            case '1':
                sort($numericArray);
                $data['result'] = implode(", ", $numericArray);
                $data['explain'] = "Mengurutkan array dari kecil ke besar.";
                break;
            case '2':
                rsort($numericArray);
                $data['result'] = implode(", ", $numericArray);
                $data['explain'] = "Mengurutkan array dari besar ke kecil.";
                break;
            case '3':
                $data['result'] = implode(", ", array_filter($numericArray, fn($num) => $num % 2 == 0));
                $data['explain'] = "Menampilkan hanya angka genap dari array.";
                break;
            case '4':
                $data['result'] = implode(", ", array_filter($numericArray, fn($num) => $num % 2 !== 0));
                $data['explain'] = "Menampilkan hanya angka ganjil dari array.";
                break;
            case '5':
                $data['result'] = implode(", ", array_map(fn($num) => $num * 2, $numericArray));
                $data['explain'] = "Mengalikan setiap angka dengan 2.";
                break;
            case '6':
                $data['result'] = array_sum($numericArray);
                $data['explain'] = "Menjumlahkan semua angka dalam array.";
                break;
            case '7':
                $found = array_filter($numericArray, fn($num) => $num > 3);
                $data['result'] = $found ? reset($found) : "Tidak ada";
                $data['explain'] = "Menampilkan angka pertama yang lebih dari 3.";
                break;
            case '8':
                $data['result'] = count($numericArray) > 0 && min($numericArray) > 0 ? "Ya" : "Tidak";
                $data['explain'] = "Menentukan apakah semua angka lebih dari 0.";
                break;
            case '9':
                $data['result'] = count(array_filter($numericArray, fn($num) => $num > 3)) > 0 ? "Ya" : "Tidak";
                $data['explain'] = "Menentukan apakah ada angka yang lebih dari 3.";
                break;
            case '10':
                $data['result'] = implode(", ", array_reverse($arrayNumber));
                $data['explain'] = "Membalik urutan elemen dalam array.";
                break;
            case '11':
                $data['result'] = implode(" - ", $arrayNumber);
                $data['explain'] = "Menggabungkan elemen array dengan tanda '-'.";
                break;
            default:
                $data['result'] = "Metode tidak valid";
                $data['explain'] = "Silakan pilih metode yang tersedia.";
        }

        return response()->json(['data' => $data]);
    }
}

<?php

use App\Models\HistoryFile;
use App\Models\LogActivity;
use Carbon\Carbon;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;

// reformat number to float with 2 decimal format
function number2df($number)
{
    return number_format((float)$number, 2, '.', '');
}

// reformat to rupiah format
function formatRupiah($number)
{
    return 'Rp ' . number_format((float)$number, 2, ',', '.');
}

// reformat date to 'd-MMM-Y' -> Ex : 1 Januari 2023
function dateWithFullMonthFormat($date)
{
    if (!$date) {
        return '-';
    }
    return Carbon::parse($date)->locale(config('app.locale'))->translatedFormat('j F Y');
}

// reformat date to 'd-MMM-Y, h:i:s' -> Ex : 1 Januari 2023, 12:30:00
function dateWithFullMonthAndTimeFormat($date)
{
    if (!$date) {
        return '-';
    }
    return Carbon::parse($date)->locale(config('app.locale'))->translatedFormat('j F Y, H:i:s');
}

// encrypting a value
function enkrip(string $value)
{
    try {
        return Crypt::encryptString($value);
    } catch (EncryptException $e) {
        return $e->getMessage();
    }
}

// decrypting a value
function dekrip(string $value)
{
    try {
        return Crypt::decryptString($value);
    } catch (DecryptException $e) {
        return $e->getMessage();
    }
}

// create log activity user
function createLogActivity(string $activity)
{
    $log = [
        'ip_access' => Request::ip(),
        'user_id' => Auth::check() ? Auth::user()->id : 0,
        'activity_content' => $activity,
        'url' => Request::fullUrl(),
        'operating_system' => Browser::platformName(),
        'device_type' => Browser::deviceType(),
        'browser_name' => Browser::browserName(),
        'method' => Request::method(),
    ];
    LogActivity::create($log);
}

// create log file
function createHistoryFile(string $kodeFile, string $pathFile, string $keterangan): HistoryFile
{
    return HistoryFile::create([
        'kode_file' => $kodeFile,
        'path_file' => $pathFile,
        'keterangan' => $keterangan,
        'status_upload' => 1,
        'created_by' => Auth::check() ? Auth::user()->id : null,
    ]);
}

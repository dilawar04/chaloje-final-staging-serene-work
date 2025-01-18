<?php

//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('/testingserenee', 'FlightController@testingserenee');
Route::get('/testingsereneereq', 'FlightController@testingsereneereq');



Route::get('/getTimeLeft', function () {
    $currentTime = Carbon\Carbon::now();
    // dd($currentTime);
    // exit;
    $url = $_SERVER['HTTP_REFERER'];
    // $url = 'http://chaloge-serene.test/manage-booking?pnr=5FXBHR&email=s.dilawarali95@gmail.com';
    // Parse the URL
    $urlComponents = parse_url($url);
    // Get the query parameters
    parse_str($urlComponents['query'], $queryParams);
    // Get the value of 'pnr'
    $pnr = $queryParams['pnr'];

    // Air Blue
    $Hours312 = $currentTime->copy()->addHours(312);
    $Hours96 = $currentTime->copy()->addHours(96);
    $Hours48 = $currentTime->copy()->addHours(48);
    $Hours24 = $currentTime->copy()->addHours(24);

    // Airsial
    $AirsialHours216 = $currentTime->copy()->addHours(216);
    $AirsialHours144 = $currentTime->copy()->addHours(144);
    $AirsialHours96 = $currentTime->copy()->addHours(96);
    $AirsialHours72 = $currentTime->copy()->addHours(72);
    $AirsialHours30 = $currentTime->copy()->addHours(30);

    // Air Serene
    $SereneHours2424 = $currentTime->copy()->addHours(2424);
    $SereneHours984 = $currentTime->copy()->addHours(984);
    $SereneHours136 = $currentTime->copy()->addHours(136);
    $SereneHours96 = $currentTime->copy()->addHours(96);
    $SereneHours76 = $currentTime->copy()->addHours(76);
    $SereneHours24 = $currentTime->copy()->addHours(24);

    $record = App\Booking::where('pnr', $pnr)->first();

    $departureTime = Carbon\Carbon::parse($record->departuretime);
    $createdAt = Carbon\Carbon::parse($record->created_at);

    $timeDifference = $createdAt->diffInMinutes($departureTime);
    // Air Blue
    if($record->airline == 'Airblue'){
        // 24 hours difference
        if ($timeDifference >= (312 * 60)) 
        {
            $isBefore = $departureTime->isBefore($Hours312);
            $addHours = $createdAt->copy()->addHours(24)->isPast();
            
            $newTime = $currentTime->subMinutes(1440);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // $formattedRemainingTime = $remainingTime->format('H:i:s');
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 1440 || $formattedRemainingTime >= "24:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 12 hours diffrence
        elseif ($timeDifference >= (96 * 60) && $timeDifference <= (312 * 60)) 
        {
            $isBefore = $departureTime->isBefore($Hours312);
            $addHours = $createdAt->copy()->addHours(12)->isPast();

            $newTime = $currentTime->subMinutes(720);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 720 || $formattedRemainingTime >= "12:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 6 hours diffrence 
        elseif ($timeDifference >= (48 * 60) && $timeDifference <= (96 * 60)) 
        {
            $isBefore = $departureTime->isBefore($Hours96);
            $addHours = $createdAt->copy()->addHours(6)->isPast();

            $newTime = $currentTime->subMinutes(360);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 360 || $formattedRemainingTime >= "06:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 3 hour difference
        elseif ($timeDifference >= (24 * 60) && $timeDifference <= (48 * 60)) 
        {
            $isBefore = $departureTime->isBefore($Hours48);
            $addHours = $createdAt->copy()->addHours(3)->isPast();

            $newTime = $currentTime->subMinutes(180);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 180 || $formattedRemainingTime >= "03:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 15 minutes
        elseif ($timeDifference <= (24 * 60)) 
        {
            $isBefore = $departureTime->isBefore($Hours24);
            $addHours = $createdAt->copy()->addMinutes(15)->isPast();

            $newTime = $currentTime->subMinutes(15);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 15 || $formattedRemainingTime >= "00:15:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }
    }
    // Airsial
    elseif($record->airline == 'Airsial'){
        // 12 hours difference
        if ($timeDifference >= (216 * 60)) 
        {
            $isBefore = $departureTime->isBefore($AirsialHours216);
            $addHours = $createdAt->copy()->addHours(12)->isPast();
            
            $newTime = $currentTime->subMinutes(720);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // $formattedRemainingTime = $remainingTime->format('H:i:s');
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 720 || $formattedRemainingTime >= "12:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }
        // 10 hours diffrence
        elseif ($timeDifference >= (144 * 60) && $timeDifference <= (216 * 60)) 
        {
            $isBefore = $departureTime->isBefore($AirsialHours216);
            $addHours = $createdAt->copy()->addHours(10)->isPast();

            $newTime = $currentTime->subMinutes(600);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 600 || $formattedRemainingTime >= "10:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }  
        // 6 hours diffrence
        elseif ($timeDifference >= (96 * 60) && $timeDifference <= (144 * 60)) 
        {
            $isBefore = $departureTime->isBefore($AirsialHours144);
            $addHours = $createdAt->copy()->addHours(6)->isPast();

            $newTime = $currentTime->subMinutes(360);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 360 || $formattedRemainingTime >= "06:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 5 hours diffrence 
        elseif ($timeDifference >= (72 * 60) && $timeDifference <= (96 * 60)) 
        {
            $isBefore = $departureTime->isBefore($AirsialHours96);
            $addHours = $createdAt->copy()->addHours(5)->isPast();

            $newTime = $currentTime->subMinutes(300);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 300 || $formattedRemainingTime >= "05:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 4 hour difference
        elseif ($timeDifference >= (30 * 60) && $timeDifference <= (72 * 60)) 
        {
            $isBefore = $departureTime->isBefore($AirsialHours72);
            $addHours = $createdAt->copy()->addHours(4)->isPast();

            $newTime = $currentTime->subMinutes(240);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 240 || $formattedRemainingTime >= "04:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 60 minutes
        elseif ($timeDifference <= (30 * 60)) 
        {
            $isBefore = $departureTime->isBefore($AirsialHours30);
            $addHours = $createdAt->copy()->addMinutes(60)->isPast();

            $newTime = $currentTime->subMinutes(60);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 60 || $formattedRemainingTime >= "01:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }
    }
    // Air Serene
    elseif($record->airline == 'Air Serene'){
        // 12 hours difference
        if ($timeDifference >= (2424 * 60)) 
        {
            $isBefore = $departureTime->isBefore($SereneHours2424);
            $addHours = $createdAt->copy()->addHours(12)->isPast();
            
            $newTime = $currentTime->subMinutes(720);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // $formattedRemainingTime = $remainingTime->format('H:i:s');
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 720 || $formattedRemainingTime >= "12:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }
        // 20 hours diffrence
        elseif ($timeDifference >= (136 * 60) && $timeDifference <= (984 * 60)) 
        {
            $isBefore = $departureTime->isBefore($SereneHours984);
            $addHours = $createdAt->copy()->addHours(20)->isPast();

            $newTime = $currentTime->subMinutes(1200);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 1200 || $formattedRemainingTime >= "20:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }  
        // 16 hours diffrence
        elseif ($timeDifference >= (96 * 60) && $timeDifference <= (136 * 60)) 
        {
            $isBefore = $departureTime->isBefore($SereneHours136);
            $addHours = $createdAt->copy()->addHours(16)->isPast();

            $newTime = $currentTime->subMinutes(960);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 960 || $formattedRemainingTime >= "16:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 14 hours diffrence 
        elseif ($timeDifference >= (76 * 60) && $timeDifference <= (96 * 60)) 
        {
            $isBefore = $departureTime->isBefore($SereneHours96);
            $addHours = $createdAt->copy()->addHours(14)->isPast();

            $newTime = $currentTime->subMinutes(840);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 840 || $formattedRemainingTime >= "14:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 2 hour difference
        elseif ($timeDifference >= (24 * 60) && $timeDifference <= (76 * 60)) 
        {
            $isBefore = $departureTime->isBefore($SereneHours76);
            $addHours = $createdAt->copy()->addHours(2)->isPast();

            $newTime = $currentTime->subMinutes(120);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 120 || $formattedRemainingTime >= "02:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        } 
        // 60 minutes
        elseif ($timeDifference <= (24 * 60)) 
        {
            $isBefore = $departureTime->isBefore($SereneHours24);
            $addHours = $createdAt->copy()->addMinutes(60)->isPast();

            $newTime = $currentTime->subMinutes(60);

            $remainingTime = $currentTime->diff($record->created_at);
            if ($remainingTime->invert === 0) {
                // Remaining time is greater than 10 minutes
                $formattedRemainingTime = sprintf('%02d:%02d:%02d',$remainingTime->h,$remainingTime->i,$remainingTime->s);
                if ($remainingTime->i >= 60 || $formattedRemainingTime >= "01:00:00") {
                    return response()->json(['timeLeft' => '00:00:00']);
                } else {
                    return response()->json(['timeLeft' => $formattedRemainingTime]);
                }
            }

            if ($isBefore && $addHours) {
                // Update order_cancel to 'Yes'
                App\Booking::where('id', $record->id)
                            ->update(['order_cancel' => 'Yes']);
            }
        }
    }
    
});

// Route::get('/ASD', 'Admin\BookingController@cronjobs');
// Route::get('/cronjobs',function(){
    
//     $tenMinutesAgo = Carbon\Carbon::now()->subMinutes(10);

//     // Fetch records created within the last 10 minutes
//     $records = App\BookingDetail::where('created_at', '>=', $tenMinutesAgo)->get();
//     // dd($records);
//     // exit;

//     // Check records that have exceeded the time limit and update order_cancel to 'Yes'
//     foreach ($records as $record) {
//         $createdAt = Carbon\Carbon::parse($record->created_at);
//         $currentTime = Carbon\Carbon::now();
//         $differenceInMinutes = $createdAt->diffInMinutes($currentTime);

//         if ($differenceInMinutes > 10) {
//                         App\BookingDetail::where('id', $record->id)->update(['order_cancel' => 'Yes']);

//         }
//     }

//     return $records;
// });

// Route::get('/cronjobs', function () {

    
//     $tenMinutesAgo = Carbon\Carbon::now()->subMinutes(10);

//     // Fetch records created within the last 10 minutes
//     $records = App\Booking::where('departuretime', '>=', $tenMinutesAgo)->get();

//     // Check records that have exceeded the time limit and update order_cancel to 'Yes'
//     foreach ($records as $record) {
//         $departuretime = Carbon\Carbon::parse($record->departuretime);
//         $currentTime = Carbon\Carbon::now();

//         if ($currentTime->greaterThan($departuretime->addMinutes(10))) {
//             App\BookingDetail::where('id', $record->id)->update(['order_cancel' => 'Yes']);
//         }
//     }

//     return $records;
// });

// Route::get('/cronjobs', function () {
//     $currentTime = Carbon\Carbon::now();
//     $twentyFourHoursFromNow = $currentTime->copy()->addHours(24);

//     $records = App\Booking::where('departuretime', '<=', $currentTime)
//         ->get();
//         return $records;
//         exit;
//     foreach ($records as $record) {
//         $departureTime = Carbon\Carbon::parse($record->departuretime);
//         $creationTime = Carbon\Carbon::parse($record->created_at);

//         // Check if departure time is within 24 hours and departure is after current time
//         $isWithinTwentyFourHours = $departureTime->diffInHours($currentTime) <= 24;

//         // Check if created_at time is after 10 minutes of the current time
//         $isAfterTenMinutes = $creationTime->addMinutes(10)->isPast();

//         if ($isWithinTwentyFourHours && $isAfterTenMinutes) {
//             // Update order_cancel to 'Yes'
//             App\Booking::where('id', $record->id)->update(['order_cancel' => 'Yes']);
//         }
//     }

//     return $records;
// });


Route::get('/cronjobs', function () {
    $currentTime = Carbon\Carbon::now();
    $thirtyHoursFromNow = $currentTime->copy()->addHours(30);

    $records = App\Booking::where('departuretime', '<=', $thirtyHoursFromNow)
                          ->get();

    foreach ($records as $record) {
        $departureTime = Carbon\Carbon::parse($record->departuretime);
        $createdAt = Carbon\Carbon::parse($record->created_at);

        $isWithinThirtyHours = $departureTime->isBefore($thirtyHoursFromNow);
        $isAfterTenMinutes = $createdAt->addMinutes(10)->isPast();

        if ($isWithinThirtyHours && $isAfterTenMinutes) {
            // Update order_cancel to 'Yes'
            App\Booking::where('id', $record->id)
                        ->update(['order_cancel' => 'Yes']);
        }
    }

    return $records;
});

// Route::get('/cronjobs', function () {
//     $currentTime = Carbon\Carbon::now();
//     $thirtyHoursFromNow = $currentTime->copy()->addHours(30);
//     $sixtyHoursFromNow = $currentTime->copy()->addHours(60);

//     $records = App\Booking::where('departuretime', '<=', $thirtyHoursFromNow)->get();

//     foreach ($records as $record) {
//         $departureTime = Carbon\Carbon::parse($record->departuretime);
//         $createdAt = Carbon\Carbon::parse($record->created_at);

//         $isWithinThirtyHours = $departureTime->isBefore($thirtyHoursFromNow);
//         $isAfterTenMinutes = $createdAt->addMinutes(10)->isPast();

//         if ($isWithinThirtyHours) {
//             if ($isAfterTenMinutes) {
//                 // Update order_cancel to 'Yes'
//                 App\Booking::where('id', $record->id)
//                             ->update(['order_cancel' => 'Yes']);
//             }
//         } else {
//             $isAfterThirtyHours = $departureTime->isAfter($thirtyHoursFromNow);
//             $isWithinSixtyHours = $departureTime->isBefore($sixtyHoursFromNow);
//             $isAfterOneHour = $createdAt->addHours(1)->isPast();

//             if (($isWithinSixtyHours && $isAfterThirtyHours) || $isAfterOneHour) {
//                 // Update order_cancel to 'Yes'
//                 App\Booking::where('id', $record->id)
//                             ->update(['order_cancel' => 'Yes']);
//             }
//         }
//     }

//     return $records;
// });





Route::get('/clear-cache/{module?}', function($module = '') {

    if(!empty($module)){
        \Cache::forget($module);
        dd("Cache forget: " . $module);
    } else {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Cache::flush();

        Gregwar\Image\GarbageCollect::dropOldFiles(__DIR__ . '/../../assets/cache', 1, true);
        dd("Cache is cleared");
    }
});



/**‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Admin
 *‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒*/
Route::get(env('ADMIN_URI') . '/login', 'Admin\LoginController@index');
Route::post(env('ADMIN_URI') . '/login/do_login', 'Admin\LoginController@do_login');
Route::get(env('ADMIN_URI') . '/login/logout', 'Admin\LoginController@logout');

Route::middleware(['auth', 'admin'])->prefix(env('ADMIN_URI'))->group( function () {
    Route::any('/{controller}/{method?}/{params?}', function ($controller, $method = 'index', $params = null) {
        $app = app();
            $controller = Str::studly(Str::singular($controller));
            $controller_cls = "App\Http\Controllers\\".Str::studly(env('ADMIN_DIR'))."\\{$controller}Controller";
            if(class_exists($controller_cls)) {
                $controller = $app->make($controller_cls);
                try {
                    return $controller->callAction($method, ['params' => $params]);
                } catch (Exception $e) {
                    developer_log('', $e);
                    return View::make('errors.error', compact('e'));
                }
            } else {
                return View::make('errors.404');
            }
        }
    )->where('params', '.*');

    Route::get('/', 'Admin\LoginController@index');
});

Route::get(env('ADMIN_URI'), 'Admin\LoginController@index')->name('login');
/**‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Auth Login
 *‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒*/

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/login', 'AuthController@login')->name('login');
//Route::post('/registration', 'AuthController@registration')->name('register');
//Route::get('/verify', 'AuthController@verify')->name('verify');

/*Route::get('/login', 'AuthController@index')->name('login');
Route::get('/register', 'AuthController@register')->name('register');*/
//Route::get('/logout', 'AuthController@logout')->name('logout');




Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/category/{slug}', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@detail');

Route::get('projects', 'ProjectController@index');
Route::get('project/{slug}', 'ProjectController@detail');
// Route::get('cronjobs', [app/Http/Controllers/Admin/BookingController::class, 'cronjobs']);

/**‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Front End
 *‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒*/
Route::any('/{controller}/{method?}/{params?}', function ($controller = 'index', $method = 'index', $params = null) {

        $app = app();
        $controller = Str::studly(Str::singular($controller));
        $controller_cls = "App\Http\Controllers\\{$controller}Controller";
        if(class_exists($controller_cls)) {
            $controller = $app->make($controller_cls);
            try {
                return $controller->callAction($method, ['params' => $params]);
            } catch (Exception $e) {
                developer_log('', $e);
                return View::make('errors.404');
            }
        } else {
            $controller_cls = "App\Http\Controllers\IndexController";
            if(class_exists($controller_cls)) {
                $controller = $app->make($controller_cls);
                try {
                    return $controller->callAction('index', ['params' => $params]);
                } catch (Exception $e) {
                    developer_log('', $e);
                    return View::make('errors.404');
                }
            }

            return View::make('errors.404');
        }
    }
)->where('params', '.*');








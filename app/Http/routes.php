<?php


Route::get('/', function () {
    $results = DB::table("high_scores")
                 ->orderBy("score", "desc")
                 ->take(10)
                 ->get();

    return response()->json($results)
                     ->header("Access-Control-Allow-Origin", "*")
                     ->header("Access-Control-Allow-Methods", "GET, POST, OPTIONS")
                     ->header("Content-Type", "application/json; charset=utf-8");
});


Route::post("/", function () {
    DB::table("high_scores")->insert([
        "name"  => Input::get("name"),
        "email" => Input::get("email"),
        "score" => Input::get("score")
    ]);

    $rank = DB::table("high_scores")
              ->where("score", ">=", Input::get("score"))
              ->count();

    return response()->json(["rank" => $rank])
                     ->header("Access-Control-Allow-Origin", "*")
                     ->header("Access-Control-Allow-Methods", "GET, POST, OPTIONS")
                     ->header("Content-Type", "application/json; charset=utf-8");
});

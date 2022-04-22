<?php
//API routes
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'API', 'middleware' => 'api', 'namespace' => "App\Modules\API\Controllers"], function () {

    Route::group(["prefix" => "api"], function () {
        
        Route::get("token", function (Request $request) {
            return response(["token" => csrf_token()], 200)->header('Content-Type', 'application/json');
        });
        //Users
        Route::group(["prefix" => "users"], function () {
            Route::get("/wallet", ["as" => "api.users.linkwallet", "uses" => "users@linkwallet"]);
        });
        //Wallets
        Route::group(["prefix" => "wallet"], function () {
            Route::get("/", ["as" => "api.wallets.index", "uses" => "Wallets@index"]);
            Route::post("/create", ["as" => "api.wallets.create", "uses" => "Wallets@create"]);
        });
        //Categories:
        Route::group(["prefix" => "categories"], function() {
            Route::get("/", ["as" => "api.category.getlist_categories", "uses" => "Category@getlist_categories"]);
        });
        //Faq:
        Route::group(["prefix" => "faq"], function() {
            Route::get("/", ["as" => "api.faq.index", "uses" => "Faq@index"]);
            Route::get("/category", ["as" => "api.categoryfaq.index", "usess" => "categoryfaq@index"]);
            Route::get("/category/relationship", ["as" => "api.faq.relationship", "uses" => "faq@relationship"]);
        });
        Route::group(["prefix" => "config"], function () {
            Route::get("/", ["as" => "api.config.index", "uses" => "Config@index"]);
        });
        
        
        /*
        Route::post("login-token", ["as" => "api.admin.login", "uses" => "Admin@login"]);
        Route::post("register-admin", ["as" => "api.admin.register", "uses" => "Admin@register"]);

        //Route::middleware('auth:api')->group(function () {

        Route::group(["prefix" => "nft"], function () {
            Route::post("/create", ["as" => "api.nft.create", "uses" => "Nft@create"]);
        });

        Route::group(["prefix" => "users"], function () {
            Route::post("/create", ["as" => "api.users.create", "uses" => "Users@create"]);
        });

        Route::get("test", ["as" => "api.test.index", "uses" => "Test@index"]);
        Route::group(["prefix" => "config"], function () {
            Route::get("/", ["as" => "api.config.index", "uses" => "Config@index"]);
        });
        Route::group(["prefix" => "privacy"], function () {
            Route::get("/", ["as" => "api.config.privacy", "uses" => "Config@privacy"]);
        });
        Route::get("aboutus/{language}", ["as" => "api.config.aboutus", "uses" => "Config@aboutus"]);
        Route::get("visa/{language}", ["as" => "api.config.visa", "uses" => "Config@visa"]);
        Route::get("safety/{language}", ["as" => "api.config.visa", "uses" => "Config@safety"]);
        Route::get("emergency/{language}", ["as" => "api.config.emergency", "uses" => "Config@emergency"]);
        Route::get("embassy/{language}", ["as" => "api.config.embassy", "uses" => "Config@embassy"]);

        //for welcome
        Route::group(["prefix" => "welcome"], function () {
            Route::get("/", ["as" => "api.welcome.index", "uses" => "Welcome@index"]);
            Route::get("/test-mail", ["as" => "api.welcome.test", "uses" => "Welcome@test"]);
        });
        //for users
        Route::group(["prefix" => "users"], function () {
            Route::post("register", ["as" => "api.users.register", "uses" => "Users@register"]);
            Route::post("login", ["as" => "api.users.login", "uses" => "Users@login"]);
            Route::post("info", ["as" => "api.users.info", "uses" => "Users@info"]);
            Route::post("update-profile", ["as" => "api.users.updateProfile", "uses" => "Users@updateProfile"]);
            Route::post("update-photo", ["as" => "api.users.updatePhoto", "uses" => "Users@updatePhoto"]);
            Route::post("forgotpassword-sendmail", ["as" => "api.users.forgotPassword_SendMail", "uses" => "Users@forgotPassword_SendMail"]);
            Route::post("forgotpassword-checkcode", ["as" => "api.users.forgotPassword_checkcode", "uses" => "Users@forgotPassword_checkcode"]);
            Route::post("change-password", ["as" => "api.users.changePassword", "uses" => "Users@changePassword"]);
            Route::get("find", ["as" => "api.users.findUsers", "uses" => "Users@findUsers"]);
        });
        //for slider
        Route::group(["prefix" => "sliders"], function () {
            Route::get("/{language}", ["as" => "api.sliders.index", "uses" => "Sliders@index"]);
        });
        //for category
        Route::group(["prefix" => "category"], function () {
            Route::get("/{language}", ["as" => "api.category.index", "uses" => "Category@index"]);
            Route::get("/all/{language}", ["as" => "api.category.allCategory", "uses" => "Category@allCategory"]);
        });
        //for news
        Route::group(["prefix" => "news"], function () {
            Route::get("/{language}/{limit?}", ["as" => "api.news.index", "uses" => "News@index"]);
            Route::get("/detail/{language}/{id}", ["as" => "api.news.detail", "uses" => "News@detail"]);
        });
        //for ask
        Route::group(["prefix" => "ask"], function () {
            Route::get("/", ["as" => "api.ask.index", "uses" => "Ask@index"]);
            Route::post("/create", ["as" => "api.ask.create", "uses" => "Ask@create"]);
        });
        //for post
        Route::group(["prefix" => "post"], function () {
            Route::get("/{language}", ["as" => "api.post.index", "uses" => "Post@index"]);
            Route::get("/allpost/{language}", ["as" => "api.post.allpost", "uses" => "Post@allpost"]);
            Route::get("/detail/{language}", ["as" => "api.post.detail", "uses" => "Post@detail"]);
            Route::get("/topplaces/{language}", ["as" => "api.post.topplace", "uses" => "Post@topplaces"]);
            Route::get("/toppopular/{language}", ["as" => "api.post.toppopular", "uses" => "Post@toppopular"]);
        });

        //for gallery
        Route::group(["prefix" => "gallery"], function () {
            Route::get("/{language}", ["as" => "api.gallery.index", "uses" => "Gallery@index"]);
            Route::get("/detail/{language}", ["as" => "api.gallery.detail", "uses" => "Gallery@detail"]);
        });
        Route::group(["prefix" => "tips"], function () {
            Route::get("/", ["as" => "api.tips.index", "uses" => "Tips@index"]);
            Route::get("/detail", ["as" => "api.tips.detail", "uses" => "Tips@detail"]);
        });
        Route::group(["prefix" => "search"], function () {
            Route::get("/{language}", ["as" => "api.serch.index", "uses" => "Search@index"]);
        });
        //});
        */
    });
});

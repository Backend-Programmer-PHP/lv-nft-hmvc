<?php
//Dashboard routes
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'dashboard', 'middleware' => 'web', 'namespace' => "App\Modules\Dashboard\Controllers"], function () {
    //login
    Route::get("dashboard/login", ["as" => "dashboard.login", "uses" => "Authentication@login"]);
    Route::post("dashboard/login", ["as" => "dashboard.login_request", "uses" => "Authentication@login_request"]);
    Route::get("dashboard/logout", ["as" => "dashboard.logout", "uses" => "Authentication@logout"]);
    Route::get("dashboard/create", ["as" => "dashboard.create", "uses" => "Authentication@create"]);

    Route::group(['middleware' => 'auth:admin', "prefix" => "dashboard"], function () {

        Route::get("/access", ["as" => "RolePermission.access", "uses" => "RolePermission@access"]);

        //Dashboard
        Route::get("/", ["as" => "dashboard.index", "uses" => "Dashboard@index"]);

        Route::group(["prefix" => "rules"], function () {
            Route::get("/", ["as" => "admin.rules", "uses" => "Rules@index"]);
            Route::get("add", ["as" => "admin.rules.add", "uses" => "Rules@add"]);
            Route::post("add", ["as" => "admin.rules.add", "uses" => "Rules@postAdd"]);
            Route::get("edit", ["as" => "admin.rules.edit", "uses" => "Rules@edit"]);
            Route::post("edit", ["as" => "admin.rules.eidt", "uses" => "Rules@postEdit"]);
        });

        //users
        Route::group(["prefix" => "users"], function () {
            Route::get("/", ["as" => "admin.users", "uses" => "Users@index"]);
            Route::post("/", ["as" => "admin.users.post", "uses" => "Users@postIndex"]);
            Route::get("add", ["as" => "admin.getAdd", "uses" => "Users@add"]);
            Route::post("add", ["as" => "admin.postAdd", "uses" => "Users@postAdd"]);
            Route::get("edit", ["as" => "admin.users.Edit", "uses" => "Users@edit"]);
            Route::post("edit", ["as" => "admin.users.Eidt", "uses" => "Users@postEdit"]);
            Route::get("edit/{id}", ["as" => "admin.users.edit", "uses" => "Users@edit"]);
            Route::post("edit/{id}", ["as" => "admin.users.postEdit", "uses" => "Users@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.users.delete", "uses" => "Users@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.users.status", "uses" => "Users@status"]);
            Route::get("status-role/{id}/{status}", ["as" => "admin.users.role.status", "uses" => "Users@statusRole"]);
        });

        Route::group(["prefix" => "smartcontract"], function () {
            Route::get("/", ["as" => "admin.smartcontract", "uses" => "SmartContract@index"]);
            Route::get("/frozen", ["as" => "admin.smartcontract.frozen", "uses" => "SmartContract@frozen"]);
            Route::post("/frozen", ["as" => "admin.smartcontract.frozen.post", "uses" => "SmartContract@frozenPost"]);
            Route::get("/transaction", ["as" => "admin.smartcontract.transaction", "uses" => "SmartContract@transaction"]);
        });

        //profile
        Route::get("myaccount", ["as" => "admin.myaccount", "uses" => "MyAccount@index"]);
        Route::post("myaccount", ["as" => "admin.myaccount.update", "uses" => "MyAccount@update"]);


        //blog
        Route::group(["prefix" => "blog"], function () {
            Route::get("/", ["as" => "admin.blog", "uses" => "Blog@index"]);
            Route::post("/", ["as" => "admin.blog", "uses" => "Blog@postIndex"]);
            Route::get("add", ["as" => "admin.blog.add", "uses" => "Blog@add"]);
            Route::post("add", ["as" => "admin.blog.postAdd", "uses" => "Blog@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.blog.edit", "uses" => "Blog@edit"]);
            Route::post("edit/{id}", ["as" => "admin.blog.postEdit", "uses" => "Blog@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.blog.delete", "uses" => "Blog@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.blog.status", "uses" => "Blog@status"]);
            Route::get("/trash", ["as" => "admin.blog.trash", "uses" => "Blog@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.blog.trash", "uses" => "Blog@trashDelete"]);
        });

        //Category
        Route::group(["prefix" => "category"], function () {
            Route::get("/", ["as" => "admin.category", "uses" => "Category@index"]);
            Route::post("/", ["as" => "admin.category", "uses" => "Category@postIndex"]);

            Route::get("/en", ["as" => "admin.category", "uses" => "Category@index"]);
            Route::post("/en", ["as" => "admin.category", "uses" => "Category@postIndex"]);

            Route::get("/vi", ["as" => "admin.category", "uses" => "Category@indexVi"]);
            Route::post("/vi", ["as" => "admin.category", "uses" => "Category@postIndexVi"]);

            Route::get("add", ["as" => "admin.category.add", "uses" => "Category@add"]);
            Route::post("add", ["as" => "admin.category.postAdd", "uses" => "Category@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.category.edit", "uses" => "Category@edit"]);
            Route::post("edit/{id}", ["as" => "admin.category.postEdit", "uses" => "Category@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.category.delete", "uses" => "Category@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.category.status", "uses" => "Category@status"]);
            Route::get("/trash", ["as" => "admin.category.trash", "uses" => "Category@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.category.trash", "uses" => "Category@trashDelete"]);
        });

        //sliders
        Route::group(["prefix" => "sliders"], function () {
            Route::get("/", ["as" => "admin.sliders", "uses" => "Sliders@index"]);
            Route::post("/", ["as" => "admin.sliders", "uses" => "Sliders@postIndex"]);

            Route::get("/en", ["as" => "admin.sliders", "uses" => "Sliders@index"]);
            Route::post("/en", ["as" => "admin.sliders", "uses" => "Sliders@postIndex"]);

            Route::get("/vi", ["as" => "admin.sliders", "uses" => "Sliders@indexVi"]);
            Route::post("/vi", ["as" => "admin.sliders", "uses" => "Sliders@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.sliders.add", "uses" => "Sliders@add"]);
            Route::post("add/{lang}", ["as" => "admin.sliders.postAdd", "uses" => "Sliders@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.sliders.edit", "uses" => "Sliders@edit"]);
            Route::post("edit/{id}", ["as" => "admin.sliders.postEdit", "uses" => "Sliders@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.sliders.delete", "uses" => "Sliders@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.sliders.status", "uses" => "Sliders@status"]);
            Route::get("/trash", ["as" => "admin.sliders.trash", "uses" => "Sliders@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.sliders.trash", "uses" => "Sliders@trashDelete"]);
        });

        //Post
        Route::group(["prefix" => "post"], function () {
            Route::get("/", ["as" => "admin.post", "uses" => "Post@index"]);
            Route::post("/", ["as" => "admin.post", "uses" => "Post@postIndex"]);

            Route::get("/en", ["as" => "admin.post", "uses" => "Post@index"]);
            Route::post("/en", ["as" => "admin.post", "uses" => "Post@postIndex"]);

            Route::get("/vi", ["as" => "admin.post", "uses" => "Post@indexVi"]);
            Route::post("/vi", ["as" => "admin.post", "uses" => "Post@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.post.add", "uses" => "Post@add"]);
            Route::post("add/{lang}", ["as" => "admin.post.postAdd", "uses" => "Post@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.post.edit", "uses" => "Post@edit"]);
            Route::post("edit/{id}", ["as" => "admin.post.postEdit", "uses" => "Post@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.post.delete", "uses" => "Post@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.post.status", "uses" => "Post@status"]);
            Route::get("/trash", ["as" => "admin.post.trash", "uses" => "Post@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.post.trash", "uses" => "Post@trashDelete"]);

            Route::get("photo/{id}", ["as" => "admin.post.photoImage", "uses" => "Post@photo"]);
            Route::post("photo/{id}", ["as" => "admin.post.photoPost", "uses" => "Post@photoPost"]);
            Route::get("photo/delete/{id}", ["as" => "admin.post.photoDelete", "uses" => "Post@photoDelete"]);
            Route::get("photo/status/{id}/{status}", ["as" => "admin.post.status", "uses" => "Post@photoStatus"]);
        });

        //news
        Route::group(["prefix" => "news"], function () {
            Route::get("/", ["as" => "admin.news", "uses" => "News@index"]);
            Route::post("/", ["as" => "admin.news", "uses" => "News@postIndex"]);

            Route::get("/en", ["as" => "admin.news", "uses" => "News@index"]);
            Route::post("/en", ["as" => "admin.news", "uses" => "News@postIndex"]);

            Route::get("/vi", ["as" => "admin.news", "uses" => "News@indexVi"]);
            Route::post("/vi", ["as" => "admin.news", "uses" => "News@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.news.add", "uses" => "News@add"]);
            Route::post("add/{lang}", ["as" => "admin.news.postAdd", "uses" => "News@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.news.edit", "uses" => "News@edit"]);
            Route::post("edit/{id}", ["as" => "admin.news.postEdit", "uses" => "News@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.news.delete", "uses" => "News@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.news.status", "uses" => "News@status"]);
            Route::get("/trash", ["as" => "admin.news.trash", "uses" => "News@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.news.trash", "uses" => "News@trashDelete"]);
        });

        //top place
        Route::group(["prefix" => "topplace"], function () {
            Route::get("/", ["as" => "admin.topplace", "uses" => "TopPlace@index"]);
            Route::post("/", ["as" => "admin.topplace", "uses" => "TopPlace@postIndex"]);

            Route::get("/en", ["as" => "admin.topplace", "uses" => "TopPlace@index"]);
            Route::post("/en", ["as" => "admin.topplace", "uses" => "TopPlace@postIndex"]);

            Route::get("/vi", ["as" => "admin.topplace", "uses" => "TopPlace@indexVi"]);
            Route::post("/vi", ["as" => "admin.topplace", "uses" => "TopPlace@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.topplace.add", "uses" => "TopPlace@add"]);
            Route::post("add/{lang}", ["as" => "admin.topplace.postAdd", "uses" => "TopPlace@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.topplace.edit", "uses" => "TopPlace@edit"]);
            Route::post("edit/{id}", ["as" => "admin.topplace.postEdit", "uses" => "TopPlace@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.topplace.delete", "uses" => "TopPlace@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.topplace.status", "uses" => "TopPlace@status"]);
            Route::get("/trash", ["as" => "admin.topplace.trash", "uses" => "TopPlace@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.topplace.trash", "uses" => "TopPlace@trashDelete"]);
        });

        //top 
        Route::group(["prefix" => "toppopular"], function () {
            Route::get("/", ["as" => "admin.toppopular", "uses" => "TopPopular@index"]);
            Route::post("/", ["as" => "admin.toppopular", "uses" => "TopPopular@postIndex"]);

            Route::get("/en", ["as" => "admin.toppopular", "uses" => "TopPopular@index"]);
            Route::post("/en", ["as" => "admin.toppopular", "uses" => "TopPopular@postIndex"]);

            Route::get("/vi", ["as" => "admin.toppopular", "uses" => "TopPopular@indexVi"]);
            Route::post("/vi", ["as" => "admin.toppopular", "uses" => "TopPopular@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.toppopular.add", "uses" => "TopPopular@add"]);
            Route::post("add/{lang}", ["as" => "admin.toppopular.postAdd", "uses" => "TopPopular@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.toppopular.edit", "uses" => "TopPopular@edit"]);
            Route::post("edit/{id}", ["as" => "admin.toppopular.postEdit", "uses" => "TopPopular@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.toppopular.delete", "uses" => "TopPopular@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.toppopular.status", "uses" => "TopPopular@status"]);
            Route::get("/trash", ["as" => "admin.toppopular.trash", "uses" => "TopPopular@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.toppopular.trash", "uses" => "TopPopular@trashDelete"]);
        });

        //Tips
        Route::group(["prefix" => "tips"], function () {
            Route::get("/", ["as" => "admin.tips", "uses" => "Tips@index"]);
            Route::post("/", ["as" => "admin.tips", "uses" => "Tips@postIndex"]);

            Route::get("/en", ["as" => "admin.tips", "uses" => "Tips@index"]);
            Route::post("/en", ["as" => "admin.tips", "uses" => "Tips@postIndex"]);

            Route::get("/vi", ["as" => "admin.tips", "uses" => "Tips@indexVi"]);
            Route::post("/vi", ["as" => "admin.tips", "uses" => "Tips@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.tips.add", "uses" => "Tips@add"]);
            Route::post("add/{lang}", ["as" => "admin.tips.postAdd", "uses" => "Tips@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.tips.edit", "uses" => "Tips@edit"]);
            Route::post("edit/{id}", ["as" => "admin.tips.postEdit", "uses" => "Tips@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.tips.delete", "uses" => "Tips@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.tips.status", "uses" => "Tips@status"]);
            Route::get("/trash", ["as" => "admin.tips.trash", "uses" => "Tips@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.tips.trash", "uses" => "Tips@trashDelete"]);
        });

        //Ask
        Route::group(["prefix" => "ask"], function () {
            Route::get("/", ["as" => "admin.ask", "uses" => "Ask@index"]);
            Route::post("/", ["as" => "admin.ask", "uses" => "Ask@postIndex"]);

            Route::get("/en", ["as" => "admin.ask", "uses" => "Ask@index"]);
            Route::post("/en", ["as" => "admin.ask", "uses" => "Ask@postIndex"]);

            Route::get("/vi", ["as" => "admin.ask", "uses" => "Ask@indexVi"]);
            Route::post("/vi", ["as" => "admin.ask", "uses" => "Ask@postIndexVi"]);

            Route::get("add/{lang}", ["as" => "admin.ask.add", "uses" => "Ask@add"]);
            Route::post("add/{lang}", ["as" => "admin.ask.postAdd", "uses" => "Ask@postAdd"]);

            Route::get("edit/{id}", ["as" => "admin.ask.edit", "uses" => "Ask@edit"]);
            Route::post("edit/{id}", ["as" => "admin.ask.postEdit", "uses" => "Ask@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.ask.delete", "uses" => "Ask@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.ask.status", "uses" => "Ask@status"]);
            Route::get("/trash", ["as" => "admin.ask.trash", "uses" => "Ask@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.ask.trash", "uses" => "Ask@trashDelete"]);
        });

        //kyC
        Route::group(["prefix" => "kyc"], function () {
            Artisan::call('cache:clear');
            Route::get("/", ["as" => "admin.kyc", "uses" => "KYC@index"]);
            Route::post("/", ["as" => "admin.kyc", "uses" => "KYC@postIndex"]);
            Route::get("add", ["as" => "admin.kyc.add", "uses" => "KYC@add"]);
            Route::post("add", ["as" => "admin.kyc.postAdd", "uses" => "KYC@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.kyc.edit", "uses" => "KYC@edit"]);
            Route::post("edit/{id}", ["as" => "admin.kyc.postEdit", "uses" => "KYC@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.kyc.delete", "uses" => "KYC@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.kyc.status", "uses" => "KYC@status"]);
            Route::get("cancel-bonus/{bonus_id}/{airdrop_id}", ["as" => "admin.kyc.cancelbonus", "uses" => "KYC@cancelBonus"]);
            Route::get("send-bonus/{bonus_id}", ["as" => "admin.kyc.sendbonus", "uses" => "KYC@sendBonus"]);
            Route::get("transfer", ["as" => "admin.kyc.transfer", "uses" => "KYC@transfer"]);
            Route::get("/trash", ["as" => "admin.kyc.trash", "uses" => "KYC@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.kyc.trash", "uses" => "KYC@trashDelete"]);
        });

        // Referral
        Route::group(["prefix" => "referral"], function () {
            Artisan::call('cache:clear');
            Route::get("/", ["as" => "admin.referral", "uses" => "Referral@index"]);
            Route::post("/", ["as" => "admin.referral", "uses" => "Referral@postIndex"]);
            Route::get("add", ["as" => "admin.referral.add", "uses" => "Referral@add"]);
            Route::post("add", ["as" => "admin.referral.postAdd", "uses" => "Referral@postAdd"]);

            Route::get("details/{id}", ["as" => "admin.referral.details", "uses" => "Referral@details"]);
            //Route::post("edit/{id}", ["as" => "admin.referral.postEdit", "uses" => "Referral@postEdit"]);

            Route::get("edit/{id}", ["as" => "admin.referral.edit", "uses" => "Referral@edit"]);
            Route::post("edit/{id}", ["as" => "admin.referral.postEdit", "uses" => "Referral@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.referral.delete", "uses" => "Referral@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.referral.status", "uses" => "Referral@status"]);
            Route::get("cancel-bonus/{bonus_id}/{airdrop_id}", ["as" => "admin.referral.cancelbonus", "uses" => "Referral@cancelBonus"]);
            Route::get("/trash", ["as" => "admin.referral.trash", "uses" => "Referral@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.referral.trash", "uses" => "Referral@trashDelete"]);
        });

        //Wallet
        Route::group(["prefix" => "wallet"], function () {
            Route::get("/", ["as" => "admin.wallet", "uses" => "Wallet@index"]);
            Route::post("/", ["as" => "admin.wallet", "uses" => "Wallet@postIndex"]);
            Route::get("add", ["as" => "admin.wallet.add", "uses" => "Wallet@add"]);
            Route::post("add", ["as" => "admin.wallet.postAdd", "uses" => "Wallet@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.wallet.edit", "uses" => "Wallet@edit"]);
            Route::post("edit/{id}", ["as" => "admin.wallet.postEdit", "uses" => "Wallet@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.wallet.delete", "uses" => "Wallet@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.wallet.status", "uses" => "Wallet@status"]);
            Route::get("/trash", ["as" => "admin.wallet.trash", "uses" => "Wallet@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.wallet.trash", "uses" => "Wallet@trashDelete"]);
        });

        //Withdrawl
        Route::group(["prefix" => "withdrawalrule"], function () {
            Route::get("/", ["as" => "admin.withdrawalrule", "uses" => "WithdrawalRule@index"]);
            Route::post("/", ["as" => "admin.withdrawalrule", "uses" => "WithdrawalRule@postIndex"]);
            Route::get("add", ["as" => "admin.withdrawalrule.add", "uses" => "WithdrawalRule@add"]);
            Route::post("add", ["as" => "admin.withdrawalrule.postAdd", "uses" => "WithdrawalRule@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.withdrawalrule.edit", "uses" => "WithdrawalRule@edit"]);
            Route::post("edit/{id}", ["as" => "admin.withdrawalrule.postEdit", "uses" => "WithdrawalRule@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.withdrawalrule.delete", "uses" => "WithdrawalRule@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.withdrawalrule.status", "uses" => "WithdrawalRule@status"]);
            Route::get("/trash", ["as" => "admin.withdrawalrule.trash", "uses" => "WithdrawalRule@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.withdrawalrule.trash", "uses" => "WithdrawalRule@trashDelete"]);
        });

        //Maintain
        Route::group(["prefix" => "maintain"], function () {
            Route::get("/", ["as" => "admin.maintain", "uses" => "Maintain@index"]);
            Route::post("/", ["as" => "admin.maintain", "uses" => "Maintain@postIndex"]);
            Route::get("add", ["as" => "admin.maintain.add", "uses" => "Maintain@add"]);
            Route::post("add", ["as" => "admin.maintain.postAdd", "uses" => "Maintain@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.maintain.edit", "uses" => "Maintain@edit"]);
            Route::post("edit/{id}", ["as" => "admin.maintain.postEdit", "uses" => "Maintain@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.maintain.delete", "uses" => "Maintain@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.maintain.status", "uses" => "Maintain@status"]);
            Route::get("/trash", ["as" => "admin.maintain.trash", "uses" => "Maintain@trash"]);
            Route::get("/trash/delete/{id}", ["as" => "admin.maintain.trash", "uses" => "Maintain@trashDelete"]);
        });



        Route::group(["prefix" => "aboutus"], function () {
            Route::get("/en", ["as" => "admin.aboutus.english", "uses" => "AboutUs@editEN"]);
            Route::post("/en", ["as" => "admin.aboutus.english.post", "uses" => "AboutUs@postEditEN"]);
            Route::get("/vi", ["as" => "admin.aboutus.vietnam", "uses" => "AboutUs@editVI"]);
            Route::post("/vi", ["as" => "admin.aboutus.vietnam.post", "uses" => "AboutUs@postEditVI"]);
        });

        Route::group(["prefix" => "visa"], function () {
            Route::get("/en", ["as" => "admin.visa.english", "uses" => "Visa@editEN"]);
            Route::post("/en", ["as" => "admin.visa.english.post", "uses" => "Visa@postEditEN"]);
            Route::get("/vi", ["as" => "admin.visa.vietnam", "uses" => "Visa@editVI"]);
            Route::post("/vi", ["as" => "admin.visa.vietnam.post", "uses" => "Visa@postEditVI"]);
        });

        Route::group(["prefix" => "safety"], function () {
            Route::get("/en", ["as" => "admin.safety.english", "uses" => "Safety@editEN"]);
            Route::post("/en", ["as" => "admin.safety.english.post", "uses" => "Safety@postEditEN"]);
            Route::get("/vi", ["as" => "admin.safety.vietnam", "uses" => "Safety@editVI"]);
            Route::post("/vi", ["as" => "admin.safety.vietnam.post", "uses" => "Safety@postEditVI"]);
        });

        Route::group(["prefix" => "emergency"], function () {
            Route::get("/en", ["as" => "admin.emergency.english", "uses" => "Emergency@editEN"]);
            Route::post("/en", ["as" => "admin.emergency.english.post", "uses" => "Emergency@postEditEN"]);
            Route::get("/vi", ["as" => "admin.emergency.vietnam", "uses" => "Emergency@editVI"]);
            Route::post("/vi", ["as" => "admin.emergency.vietnam.post", "uses" => "Emergency@postEditVI"]);
        });

        Route::group(["prefix" => "embassy"], function () {
            Route::get("/en", ["as" => "admin.embassy.english", "uses" => "Embassy@editEN"]);
            Route::post("/en", ["as" => "admin.embassy.english.post", "uses" => "Embassy@postEditEN"]);
            Route::get("/vi", ["as" => "admin.embassy.vietnam", "uses" => "Embassy@editVI"]);
            Route::post("/vi", ["as" => "admin.embassy.vietnam.post", "uses" => "Embassy@postEditVI"]);
        });


        //blog category
        Route::group(["prefix" => "blog-category"], function () {
            Route::get("/", ["as" => "admin.blog_category", "uses" => "BlogCategory@index"]);
            Route::post("/", ["as" => "admin.blog_category", "uses" => "BlogCategory@postSetting"]);
            Route::get("add", ["as" => "admin.blog_category.add", "uses" => "BlogCategory@add"]);
            Route::post("add", ["as" => "admin.blog_category.postAdd", "uses" => "BlogCategory@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.blog_category.edit", "uses" => "BlogCategory@edit"]);
            Route::post("edit/{id}", ["as" => "admin.blog_category.postEdit", "uses" => "BlogCategory@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.blog_category.delete", "uses" => "BlogCategory@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.blog_category.status", "uses" => "BlogCategory@status"]);
        });



        //region - khu vuc
        Route::group(["prefix" => "region"], function () {
            Route::get("/", ["as" => "admin.region", "uses" => "Region@index"]);
            Route::post("/", ["as" => "admin.region", "uses" => "Region@postSetting"]);
            Route::get("add", ["as" => "admin.region.add", "uses" => "Region@add"]);
            Route::post("add", ["as" => "admin.region.postAdd", "uses" => "Region@postAdd"]);
            Route::get("edit/{id}", ["as" => "admin.region.edit", "uses" => "Region@edit"]);
            Route::post("edit/{id}", ["as" => "admin.region.postEdit", "uses" => "Region@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.region.delete", "uses" => "Region@delete"]);
            Route::get("status/{id}/{status}", ["as" => "admin.region.status", "uses" => "Region@status"]);
        });

        //orders - don hang
        Route::group(["prefix" => "orders"], function () {
            Route::get("/", ["as" => "admin.orders", "uses" => "Order@index"]);
            Route::post("/", ["as" => "admin.orders", "uses" => "Order@postIndex"]);
            Route::get("edit/{id}", ["as" => "admin.orders.edit", "uses" => "Order@edit"]);
            Route::post("edit/{id}", ["as" => "admin.orders.postEdit", "uses" => "Order@postEdit"]);
            Route::get("delete/{id}", ["as" => "admin.orders.delete", "uses" => "Order@delete"]);
        });

        //config
        Route::group(["prefix" => "config"], function () {
            Route::get("/", ["as" => "admin.config", "uses" => "Configuration@setting"]);
            Route::post("/", ["as" => "admin.config", "uses" => "Configuration@postSetting"]);
            Route::get("seo", ["as" => "admin.config.seo", "uses" => "Configuration@seo"]);
            Route::post("seo", ["as" => "admin.config.postSeo", "uses" => "Configuration@postSeo"]);
            Route::get("social", ["as" => "admin.config.social", "uses" => "Configuration@social"]);
            Route::post("social", ["as" => "admin.config.postSocial", "uses" => "Configuration@postSocial"]);
            Route::get("ico", ["as" => "admin.config.ico", "uses" => "Configuration@ICO"]);
            Route::post("ico", ["as" => "admin.config.postICO", "uses" => "Configuration@postICO"]);
        });

        //config
        /*
        Route::group(["prefix" => "setting"], function() {
            Route::get("/thumb", ["as" => "admin.setting.thumb", "uses" => "Setting@thumb"]);
            Route::post("/thumb", ["as" => "admin.setting.thumb", "uses" => "Setting@postThumb"]);
            
            Route::get("seo", ["as" => "admin.setting.seo", "uses" => "Configuration@seo"]);
            Route::post("seo", ["as" => "admin.setting.postSeo", "uses" => "Configuration@postSeo"]);
            Route::get("social", ["as" => "admin.setting.social", "uses" => "Configuration@social"]);
            Route::post("social", ["as" => "admin.setting.postSocial", "uses" => "Configuration@postSocial"]);
        });*/
    });
});

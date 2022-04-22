<?php
//ICO routes
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'ICO', 'middleware' => 'web', 'namespace' => "App\Modules\ICO\Controllers"], function () {
//    Route::group(["prefix"=>"exchange"],function(){
        Route::get('/', function () {
            return redirect('/dashboard/login.html');
        });

        Route::get("error/login.html", ["as" => "login", "uses" => "Users@logoutDevices"]);
        Route::get("notify-register", ["as" => "ico.users.notify_register", "uses" => "Users@notifyRegister"]);

        //Route::get("login.html", ["as" => "ico.users.login", "uses" => "Users@login"]);
        //Route::post("login.html", ["as" => "ico.users.login_post", "uses" => "Users@Postlogin"]);

        Route::get("register/{code}", ["as" => "ico.users.register_code", "uses" => "Users@getRegisterCode"]);
        Route::get("register.html", ["as" => "ico.users.register", "uses" => "Users@getRegister"]);
        Route::post("register/{code}", ["as" => "ico.users.register_post_code", "uses" => "Users@postCodeRegister"]);
        Route::post("register.html", ["as" => "ico.users.register_post", "uses" => "Users@postRegister"]);

        Route::post("re-register.html", ["as" => "ico.users.register.re_post", "uses" => "Users@rePostRegister"]);
        Route::get('register/verify/{code}', ["as" => "ico.users.register_verify", "uses" => "Users@verify"]);

        Route::get('forgot-password.html', ["as" => "ico.users.forgotPassword", "uses" => "Users@getforgotPassword"]);
        Route::post('forgot-password.html', ["as" => "ico.users.forgotPassword_post", "uses" => "Users@postforgotPassword"]);
        Route::get('reset-password/verify/{code}', ["as" => "ico.users.resetPassword_get", "uses" => "Users@getResetPassword"]);
        Route::post('reset-password/verify/{code}', ["as" => "ico.users.resetPassword_post", "uses" => "Users@postResetPassword"]);

        Route::get('/maintain.html',["as" => "ico.maintain.index", "uses" => "Maintain@index"])->middleware('auth:web');
        Route::get("logout.html", ["as" => "ico.users.logout", "uses" => "Users@logout"])->middleware('auth:web');

        Route::group(['middleware'=>['auth:web','maintain']],function (){
            //2f
            Route::get('/2fa.html',["as" => "ico.security.2fa", "uses" => "Account@show2faForm"]);
            Route::post('/2fa.html',["as"=>"ico.security.2fa.enable","uses"=>'Account@enable2fa']);
            Route::post('/disable2fa.html',["as"=>"ico.security.2fa.disable2fa","uses"=>'Account@disable2fa']);

            Route::get('/security.html',["as" => "ico.security.index", "uses" => "Security@index"]);
            Route::get('/change-password.html', ["as" => "ico.security.changePassword", "uses" => "Account@getChangePassword"])->middleware('2fa');
            Route::post('/change-password.html', ["as" => "ico.security.changePassword_post", "uses" => "Account@postChangePassword"])->middleware('2fa');
            Route::get('/2fa-authencation.html',["as" => "ico.security.2fa.authencation", "uses" => "Account@showAuthencation"]);

            Route::get('/kyc.html',["as" => "ico.kyc.index", "uses" => "Kyc@index"]);
            Route::post('/kyc.html',["as" => "ico.kyc.index_post", "uses" => "Kyc@checkEmail"]);
            Route::get('/identity-card.html',["as" => "ico.kyc.identity_card", "uses" => "Kyc@getIdentityCard"]);
            Route::post('/identity-card.html',["as" => "ico.kyc.identity_card_post", "uses" => "Kyc@postIdentityCard"]);
            Route::get('/passport.html',["as" => "ico.kyc.passport", "uses" => "Kyc@getPassport"]);
            Route::post('/passport.html',["as" => "ico.kyc.passport_post", "uses" => "Kyc@postPassport"]);
            Route::get('/driver-license.html',["as" => "ico.kyc.driver_license", "uses" => "Kyc@getDriverLicense"]);
            Route::post('/driver-license.html',["as" => "ico.kyc.driver_license_post", "uses" => "Kyc@postDriverLicense"]);

            Route::get('deposit.html', ["as" => "ico.wallet.deposit", "uses" => "Wallet@getDeposit"]);
            Route::get('transaction.html', ["as" => "ico.wallet.transaction", "uses" => "Transaction@index"]);
            Route::get('referral.html', ["as" => "ico.referral.index", "uses" => "Referral@index"]);
            
            Route::get('account.html', ["as" => "ico.account.index", "uses" => "Account@index"]);
            Route::get('account/{status}', ["as" => "ico.account.check_kyc", "uses" => "Account@check_kyc"]);

            Route::get('profile.html', ["as" => "ico.users.show", "uses" => "Users@show"]);
//        Route::get('profile-update.html', ["as" => "ico.users.update_get", "uses" => "Users@getUpdate"]);
            Route::post('profile-update.html', ["as" => "ico.account.update_post", "uses" => "Account@postUpdate"]);
            //verify 2fa after login
            Route::get('/verify-2fa.html',["as" => "ico.security.twoFace", "uses" => "Security@show2fa"]);
            Route::post('/verify-2fa.html',["as" => "ico.security.twoFace.verify", "uses" => "Security@verify"]);

            //maintain
            //change password
            Route::group(['prefix'=>'user'],function (){
//                    Route::get('/change-password.html', ["as" => "ico.users.changePassword", "uses" => "Users@getChangePassword"])->middleware('2fa');
//                    Route::post('/change-password.html', ["as" => "ico.users.changePassword_post", "uses" => "Users@postChangePassword"])->middleware('2fa');

                Route::get("/", ["as" => "ico.users.index", "uses" => "Users@index"])->middleware('2fa');

            });
            Route::get('/overview.html',["as" => "ico.dashboard.index", "uses" => "Dashboard@index"])->middleware(['dashboard']);
            //Route::get('/',["as" => "ico.dashboard.index", "uses" => "Dashboard@index"])->middleware(['dashboard']);
//            Route::get('/',["as" => "ico.dashboard.index", "uses" => "Dashboard@dashboard_redirect"])->middleware(['dashboard']);

            Route::group(['middleware' => ["2fa"]], function () {

                Route::group(['prefix'=>'token-sale'],function (){
                    Route::get("/{id}", ["as" => "ico.token.sale.index", "uses" => "TokenSale@index"]);
                    Route::post("/buy-token", ["as" => "ico.token.sale.index.post", "uses" => "TokenSale@buyToken"]);
                    Route::post("/token-remaining", ["as" => "ico.token.sale.remaining", "uses" => "TokenSale@getTokenRemaining"]);
                    Route::post("/eth-rate-token", ["as" => "ico.token.sale.token.rate", "uses" => "TokenSale@getEthRateToken"]);
                    Route::post("/token-limit", ["as" => "ico.token.sale.token.limit", "uses" => "TokenSale@getTokenLimit"]);
                    Route::post("/get-fee", ["as" => "ico.token.sale.fee.get", "uses" => "TokenSale@getFee"]);
                });
                Route::get('my-wallet.html', ["as" => "ico.wallet.index", "uses" => "Wallet@index"]);
                Route::post('bg-point-balance', ["as" => "ico.wallet.bgpoint_balance", "uses" => "Wallet@bg_point_balance"]);

                Route::group(['middleware'=>'kyc'],function (){
                    Route::get("/order.html", ["as" => "ico.order.index", "uses" => "Order@index"]);
                    Route::post("/order/token/buy", ["as" => "ico.order.post", "uses" => "Order@buyToken"]);
                    Route::get("/get_ajax_paginate",["as"=>"ico.pagination.get","uses"=>"Account@pagination"]);
                    Route::post("/withdraw-bnb",["as"=>"ico.withdraw_bnb.get","uses"=>"Wallet@withdraw_bnb"]);
                });
            });

        });

//    });
});

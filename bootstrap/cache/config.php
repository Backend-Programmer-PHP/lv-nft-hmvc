<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost/NftMarket',
    'asset_url' => NULL,
    'timezone' => 'Asia/Ho_Chi_Minh',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:K+Z5s4+zsypOGm8VegVWoT4c6LL6Wu3LtTFcj36JHY0=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Intervention\\Image\\ImageServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
      27 => 'App\\Modules\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Helper_Dashboard' => 'App\\Modules\\Dashboard\\Helpers\\Helper',
      'Hepler_ICO' => 'App\\Modules\\ICO\\Helpers\\Helper',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'api' => 
      array (
        'driver' => 'passport',
        'provider' => 'admins',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Admin',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
      'admins' => 
      array (
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
    ),
    'prefix' => 'laravel_cache',
  ),
  'ckfinder' => 
  array (
    'loadRoutes' => true,
    'authentication' => '\\CKSource\\CKFinderBridge\\CKFinderMiddleware',
    'licenseName' => '',
    'licenseKey' => '',
    'privateDir' => 
    array (
      'backend' => 'laravel_cache',
      'tags' => 'ckfinder/tags',
      'cache' => 'ckfinder/cache',
      'thumbs' => 'ckfinder/cache/thumbs',
      'logs' => 
      array (
        'backend' => 'laravel_logs',
        'path' => 'ckfinder/logs',
      ),
    ),
    'images' => 
    array (
      'maxWidth' => 1600,
      'maxHeight' => 1200,
      'quality' => 80,
      'sizes' => 
      array (
        'small' => 
        array (
          'width' => 480,
          'height' => 320,
          'quality' => 80,
        ),
        'medium' => 
        array (
          'width' => 600,
          'height' => 480,
          'quality' => 80,
        ),
        'large' => 
        array (
          'width' => 800,
          'height' => 600,
          'quality' => 80,
        ),
      ),
    ),
    'backends' => 
    array (
      'laravel_cache' => 
      array (
        'name' => 'laravel_cache',
        'adapter' => 'local',
        'root' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\framework/cache',
      ),
      'laravel_logs' => 
      array (
        'name' => 'laravel_logs',
        'adapter' => 'local',
        'root' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\logs',
      ),
      'default' => 
      array (
        'name' => 'default',
        'adapter' => 'local',
        'baseUrl' => 'http://localhost/NftMarket/userfiles/',
        'root' => 'C:\\xampp\\htdocs\\NftMarket\\public\\/userfiles/',
        'chmodFiles' => 511,
        'chmodFolders' => 493,
        'filesystemEncoding' => 'UTF-8',
      ),
    ),
    'defaultResourceTypes' => '',
    'resourceTypes' => 
    array (
      0 => 
      array (
        'name' => 'Files',
        'directory' => 'files',
        'maxSize' => 0,
        'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,docx,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pptx,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,xlsx,zip',
        'deniedExtensions' => '',
        'backend' => 'default',
      ),
      1 => 
      array (
        'name' => 'Images',
        'directory' => 'images',
        'maxSize' => 0,
        'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
        'deniedExtensions' => '',
        'backend' => 'default',
      ),
    ),
    'roleSessionVar' => 'CKFinder_UserRole',
    'accessControl' => 
    array (
      0 => 
      array (
        'role' => '*',
        'resourceType' => '*',
        'folder' => '/',
        'FOLDER_VIEW' => true,
        'FOLDER_CREATE' => true,
        'FOLDER_RENAME' => true,
        'FOLDER_DELETE' => true,
        'FILE_VIEW' => true,
        'FILE_UPLOAD' => true,
        'FILE_RENAME' => true,
        'FILE_DELETE' => true,
        'IMAGE_RESIZE' => true,
        'IMAGE_RESIZE_CUSTOM' => true,
      ),
    ),
    'overwriteOnUpload' => false,
    'checkDoubleExtension' => true,
    'disallowUnsafeCharacters' => false,
    'secureImageUploads' => true,
    'checkSizeAfterScaling' => true,
    'htmlExtensions' => 
    array (
      0 => 'html',
      1 => 'htm',
      2 => 'xml',
      3 => 'js',
    ),
    'hideFolders' => 
    array (
      0 => '.*',
      1 => 'CVS',
      2 => '__thumbs',
    ),
    'hideFiles' => 
    array (
      0 => '.*',
    ),
    'forceAscii' => false,
    'xSendfile' => false,
    'debug' => false,
    'plugins' => 
    array (
    ),
    'cache' => 
    array (
      'imagePreview' => 86400,
      'thumbnails' => 31536000,
    ),
    'tempDirectory' => 'C:\\Users\\ASUS\\AppData\\Local\\Temp',
    'sessionWriteClose' => true,
    'csrfProtection' => true,
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'nft',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nft',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix' => 'la_',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nft',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nft',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'driver' => 'redis',
      'connection' => 'default',
      'queue' => 'default',
      'retry_after' => 90,
      'block_for' => 5,
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel_database_',
      ),
      'default' => 
      array (
        'url' => 'tcp://116.118.49.93:6379?database=0',
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
        'read_write_timeout' => 60,
      ),
      'cache' => 
      array (
        'url' => 'tls://116.118.49.93:6379?database=1',
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\app/public',
        'url' => 'http://localhost/NftMarket/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
      ),
    ),
    'links' => 
    array (
      'C:\\xampp\\htdocs\\NftMarket\\public\\storage' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.mailtrap.io',
        'port' => '2525',
        'encryption' => NULL,
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'auth_mode' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
    ),
    'from' => 
    array (
      'address' => NULL,
      'name' => 'Laravel',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\xampp\\htdocs\\NftMarket\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => true,
    'files' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\xampp\\htdocs\\NftMarket\\resources\\views',
    ),
    'compiled' => 'C:\\xampp\\htdocs\\NftMarket\\storage\\framework\\views',
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
      'report_logs' => true,
      'maximum_number_of_collected_logs' => 200,
      'censor_request_body_fields' => 
      array (
        0 => 'password',
      ),
    ),
    'send_logs_as_events' => true,
    'censor_request_body_fields' => 
    array (
      0 => 'password',
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'passport' => 
  array (
    'private_key' => NULL,
    'public_key' => NULL,
    'client_uuids' => false,
    'personal_access_client' => 
    array (
      'id' => NULL,
      'secret' => NULL,
    ),
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
      ),
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 94,
  ),
  'global' => 
  array (
    'settings' => 
    array (
      'EMAIL' => NULL,
      'TITLE' => 'D???ch v??? thi???t k??? website - ngoluan.com',
      'META_KEYWORD' => 'd???ch v???,thi???t k??? website,thi???t k???',
      'META_DESCRIPTION' => 'D???ch v??? thi???t k??? website',
      'LINK_YOUTUBE' => 'https://www.youtube.com',
      'LINK_FACEBOOK' => 'https://www.facebook.com/profile.php?id=100015068807055',
      'LINK_INSTAGRAM' => 'https://www.instagram.com',
      'LINK_LINKEDIN' => 'https://www.linkedin.com',
      'LINK_TWITTER' => 'https://twitter.com',
      'LINK_WEBSITE' => 'http://ngoluan.com',
      'HEADER_TEXT' => NULL,
      'FOOTER_TEXT' => NULL,
      'PHONE' => NULL,
      'PHOTO_SHARE' => 'game-overpng-1568088577.png',
      'PHOTO_LOGO' => 'logosvg-1642836291.svg',
      'PHOTO_FAVICON' => 'logosvg-1642836304.svg',
      'PHOTO_LOGO_FOOTER' => 'logosvg-1642836291.svg',
      'LINK_SKYPE' => '@ngoluan123',
      'HEADER_CODE' => NULL,
      'FOOTER_CODE' => NULL,
      'THUMB_SIZE_PRODUCT' => '{"width":200,"height":200}',
      'THUMB_SIZE_BLOG' => '{"width":250,"height":200}',
      'THUMB_SIZE_PRODUCT_CATEGORY' => '{"width":1366,"height":200}',
      'THUMB_SIZE_BLOG_CATEGORY' => '{"width":1366,"height":200}',
      'THUMB_SIZE_SERVICE' => '{"width":250,"height":250}',
      'THUMB_SIZE_PROJECT' => '{"width":259,"height":277}',
      'THUMB_SIZE_POST' => '{"width":400,"height":600}',
      'SMTP_HOST' => 'smtp.yandex.com',
      'SMTP_PORT' => '587',
      'SMTP_EMAIL' => 'contact@ngoluan.com',
      'SMTP_PASSWORD' => 'generaus',
      'ICO_NAME' => 'Womentech Association',
      'ICO_SYMBOL' => 'WTA',
      'ICO_DECIMALS' => '18',
      'ICO_CONTRACT_ADDRESS' => '0x3a56AdF7985CFf160b8CAD4851A0a157D2F91E4d',
      'MAINTAIN_MODE' => '0',
      'BGPOINT_API_SECRET_KEY' => 'c4ca4238a0b923820dcc509a6f75849b',
      'SHOW_LOGO' => '0',
      'BANNER' => 'banner-1639280352.png',
      'BANNER_TOP' => 'banner-1639280352.png',
      'BANNER_BOTTOM' => 'banner_bottom.png?v=1',
      'PRIVACY_CONTENT_EN' => '<h1 style="text-align: center;"><span style="font-size:20px;">Terms, Conditions and Notes</span></h1>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Welcome to Ho Chi Minh City Tourism</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Users of this Application shall not incur any charges for the use of this Application under this Agreement. However, this Application contains links to third-party applications operated and owned by independent service providers or retailers. Such third parties may charge a fee to use some of the content or services offered on their application. You should therefore undertake any investigation that you feel is necessary or appropriate prior to entering into any transaction with any third party to determine whether a fee may be charged. or not. Where Ho Chi Minh City Tourism provides detailed information about fees on this Application, such information is provided for convenience and informational purposes only. Ho Chi Minh City Tourism in no way guarantees that this information is accurate nor is it responsible for the content or services provided on such third party applications.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">PROHIBITED ACTIVITIES</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">The Application Content, as well as the infrastructure used to provide such content and information, are proprietary to us. You agree not to modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell or resell any information, software, products or services obtained from or through this Website.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">In addition, you are not allowed to:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(i) use this Application or its content for any commercial purpose;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(ii) access, monitor or copy any content or information of this Application using any robot, reducer, scanner or other automated means, or any other manual process for any purpose without our express written permission;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iii) violate the restrictions in any robot exclusion headers on this Application, or bypass or circumvent other measures used to prevent or restrict access to this Application;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iv) take any action that imposes, or may impose, in our discretion, an unreasonable or disproportionately large load on our infrastructure;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(v) deep link to any part of this Application for any purpose without our express written permission;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(vi) &ldquo;frame&rdquo;, &ldquo;mirror&rdquo; or incorporate any part of this Application into any other application without our prior written permission; or</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(vii) attempt to modify, translate, adapt, edit, decompile, disassemble or reverse engineer any software programs used by HoChiMinh City Tourism in connection with this Application or the services except where permitted under applicable law.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">PRIVACY POLICY</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HoChiMinh City Tourism believes in protecting your privacy. Any personal information you post on this App will be used in accordance with our privacy policy.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">PLANS, COMMENTS, AND OTHER INTERACTIVE RESULTS</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">We appreciate hearing from you. Please note that by submitting content to this App by email, posts on this App or otherwise, including any questions, pictures or videos, comments, suggestions, ideas or the like contained in any submission (collectively, the &ldquo;Submission&rdquo;), you grant Ho Chi Minh City Tourism and its affiliates a non-exclusive, royalty-free, perpetual , is transferable, irrevocable and wholly sublicensable for (a) use, reproduction, modification, adaptation, translation, distribution, publication, creation of derivative works from and publicly display and perform such Submissions around the world in any media, now known or later invented; and (b) use the name you submit in connection with such Submission. You acknowledge that Ho Chi Minh City Tourism may choose to provide your comments or reviews at our sole discretion. You also grant Ho Chi Minh City Tourism the right to bring before law any person or entity that infringes Your or Ho Chi Minh City Travel&#39;s rights in Submissions as a result of a breach of this Agreement. You acknowledge and agree that Submissions are non-confidential and non-proprietary.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">This application may contain discussion forums, bulletin boards, commenting services or other forums in which you or third parties may post reviews of travel experiences or content, messages, documents or other items on this Application (&ldquo;Interactive Area&rdquo;). If HoChiMinh City Tourism provides such Interactive Areas, you are solely responsible for the use of such Interactive Areas and use at your own risk. By using any Interactive Areas, you expressly agree not to post, upload, transmit, distribute, store, create, or publish through this Application any of the following:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Any message, data, information, text, music, sound, photos, graphics, code or any other material (&quot;Content&quot;) that is false, illegal, misleading, defamatory, libelous, defamatory, obscene, obscene, indecent, lewd, sexually suggestive, harassing, or advocating harassment, threat, invasion of privacy or right of publicity, abuse, incitement , deceptive or objectionable;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content that offends the online community on a regular basis, such as content that promotes racism, bigotry, hatred, or physical harm of any kind against any group or individual ;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content that constitutes, promotes, promotes or provides instructions to carry out an illegal activity, commits a criminal offence, leads to civil liability, violates the rights of any party in any country anywhere in the world or otherwise create liability or violate any local, state, national or international law, including but not limited to Securities and Exchange Commission regulations Singapore (SEC) or any rules of any stock exchange;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content that provides information about illegal activities such as making or buying illegal weapons, violating someone&#39;s privacy, or providing or creating computer viruses;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">The Content may infringe any patent, trademark, trade secret, copyright or other proprietary or intellectual rights of any party. Specifically, content that promotes illegal or unauthorized copies of someone else&#39;s copyrighted work, such as providing pirated computer programs or linking to them, provides information to circumvent break pre-installed copy protection devices or provide pirated music or links to pirated music files;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content that impersonates any person or entity or otherwise misrepresents your affiliation with an individual or entity, including Ho Chi Minh City Tourism;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Unsolicited promotions, mass mailing or &quot;spamming&quot;, transmission of &quot;spam&quot;, &quot;chain letters&quot;, political campaigns, advertising, contests, lotteries or instigation;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content containing commercial and/or sales activities without our prior written consent, such as contests, sweepstakes, barter, advertising and pyramid schemes tower;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Personal information of any third party, including but not limited to, last name (family name), phone number, email address, national identification number and credit card number.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Contains pages with restricted or password-only access, or hidden pages or images (those that are not linked to or from another accessible page);</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Viruses, corrupted data or other harmful, disruptive or destructive files;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content unrelated to the subject matter of the Interactive Area(s) in which such Content is posted; or</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Content or a link to content, in HoChiMinh City Tourism&#39;s sole discretion, (a) violates previous subsections of this document, (b) is objectionable, (c) restricts or prevents any any other person using or enjoying the Interactive Areas or this Application, or (d) may subject Ho Chi Minh City Tourism or its affiliates or its users to any loss or damage. harm or liability of any kind.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ho Chi Minh City Tourism is not responsible and has no liability for any Content posted, stored or uploaded by you or any third party, or for any loss or damage. or damages, Ho Chi Minh City Tourism is not responsible for any false, defamatory, slanderous, libelous, omission, falsehood, obscenity, pornographic or vulgar content you may encounter. As a provider of interactive services, Ho Chi Minh City Tourism is not responsible for any statements, representations or Content provided by its users on any public forum. plus, personal home page or any other Interactive Area. Although Ho Chi Minh City Tourism has no obligation to screen, edit, or monitor any Content posted to or distributed through any Interactive Area, Ho Chi Minh City Tourism may right, and in its sole and absolute discretion, to remove, screen or edit without notice any Content posted or hosted on this Application at any time and for any reason, and You are solely responsible for making backup copies and replacing any Content you post or store on this Application at your sole expense and expense.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">If it is determined that you hold moral rights (including attribution or integrity rights) in the Content or Submissions, you represent that (a) you have not requested the use of any personally identifiable information. any person in connection with the Content or Submissions, or any derivative works thereof, or enhancements or updates thereto; (b) you have no objection to the publication, use, modification, deletion and exploitation of the Content or Entries by HoChiMinh City Tourism or its licensees, successors and assigns; (c) you hereby waive and agree not to claim or assert any interest in any and all moral rights of the author in any Content or Submission; and (d) you permanently release HoChiMinh City Tourism, and its licensors, successors and assigns, from any claim you may assert against HoChiMinh City Tourism by any human rights. such a body.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Any use of the Interactive Areas or other parts of this Application in violation of the foregoing violates this Agreement and may result in your termination or suspension of your use of the Interactive Areas. and/or this Application. To cooperate with legitimate government requests, subpoenas or court orders, to protect Ho Chi Minh City Tourism systems and customers, or to ensure the integrity and operation system and business of Ho Chi Minh City Tourism, Ho Chi Minh City Tourism may access and disclose any information it deems necessary or appropriate, including but not limited to , user profile information (i.e. name, email address, etc.), IP address and traffic information, usage history and Posted Content. Ho Chi Minh City Tourism&#39;s right to disclose any such information shall take precedence over any provision of the Ho Chi Minh City Tourism Privacy Policy.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TOURIST DESTINATION</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Although most travel, including travel to international destinations, is completed without incident, traveling to certain destinations may present greater risks than others. . HoChiMinh City Tourism urges passengers to investigate and review travel bans, warnings, notices and advice issued by the Government of the United Kingdom, the European Union (EU) and the governments of destination countries prior to booking travel to international destinations.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">BY INSTALLING INFORMATION RELATED TO GOING TO SPECIFIC INTERNATIONAL DESTINATIONS, WE DO NOT STAY OR WARRANT THAT GOING TO SUCH DESTINATIONS IS RISK AND NO RISK DAMAGE OR LOSS MAY AGAIN FROM ACCESS TO THESE DESTINATIONS.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">DISCLAIMER US DISCLAIMER</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">INFORMATION, SOFTWARE, PRODUCTS AND SERVICES PUBLISHED ON THIS APPLICATION MAY INCLUDE INCLUDES OR ERRORS. WE DO NOT GUARANTEE THE ACCURACY AND DISCLAIMER OF LEGAL LIABILITY FOR ANY OTHER ERROR OR INACCURACY RELATED TO THE INFORMATION AND DESCRIPTION OF HOTELS, AIRLINES, VEHICLES, VEHICLES AND PRODUCTS WHAT OTHER SHOULD BE DISPLAYED ON THIS APPLICATION (INCLUDING, NOT LIMITED, PHOTOGRAPHY, LIST OF HOTEL Utilities, GENERAL PRODUCT DESCRIPTION, ETC).</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">WE DO NOT DECLARATE ANYTHING OF ANY KIND OF THE APPLICATION OF THE CONTACT INFORMATION, SOFTWARE, PRODUCTS AND SERVICES ON THIS APP OR ANY PORTAL FOR ANY PURPOSE AND CONTACT US ANY PRODUCTS OR SERVICES ON THIS APPLICATION DO NOT HAVE ANY OR COMMENTS ABOUT OUR PRODUCTS OR SERVICES. ALL INFORMATION, SOFTWARE, PRODUCTS AND SERVICES ARE PROVIDED &ldquo;AS IS&rdquo; WITHOUT WARRANTY OF ANY KIND. WE DISCLAIMER ALL WARRANTIES AND CONDITIONS THAT THIS APP, IT&#39;S SERVERS OR ANY EMAIL SENDED FROM US IS FREE OF VIRUS OR OTHER HARMFUL COMPONENTS. FOR THE MAXIMUM EXTENSION PERMITTED BY APPLICABLE LAW HERE DISCLAIMER ALL WARRANTIES AND CONDITIONS RELATED TO THIS INFORMATION, SOFTWARE, PRODUCTS AND SERVICES, INCLUDING ALL IMPLICATIONS AND CONDITIONS OF WARRANTIES AND PURPOSE, FITNESS FOR PART.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">WE ALSO DISCLAIMER OF ANY WARRANTIES OR RESPONSIBILITIES AS TO THE ACCURACY OR OWNERSHIP OF THE APPLICATION CONTENTS.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nothing in THIS AGREEMENT WILL EXCEPT OR LIMIT OUR LEGAL LIABILITY FOR (I) DEATH OR PERSONAL DAMAGE BY NEGATIVE; (II) ORIGIN; OR (III) LEGAL LIABILITY OR ANY COMPLETE (IV) ANY OTHER LEGAL LIABILITY NOT EXCLUDED BY APPLICABLE LAW.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">FOLLOWING STARTING, YOU USE THIS APPLICATION AT YOUR OWN RISK AND NO EVENT CAUSES US (OFFICERS, DIRECTORS AND ITS RELATED) TO LEGAL LIABILITY FOR ANYTHING , ANY, SPECIAL, OR Consequential Loss of ANY INCOME, PROFITS, BILLS, DATA, CONTRACTS, USE OF MONEY OR LOST OR DAMAGES FOR ANYWHERE WITH THE BUSINESS RELATED TO ANY TYPE OF ANYTHING EXCEPT, OR ANYWAYS CONNECTED WITH YOUR ACCESSORY, DISPLAY, OR USE OF THIS APP, OR DELAY, NO DELAYS, OR USE THIS APPLICATION (INCLUDING, BUT NOT LIMITED TO, YOUR LINKED COMMENTS APPEARING ON THIS APP; ANY COMPUTER VIRUS, INFORMATION, SOFTWARE, PRODUCTS, APPLICATIONS; PRODUCTS AND SERVICES THROUGH THIS APP; OR OTHER AGAINST OTHER ACCESS, DISPLAY, OR USE OF THIS APP) THAT BASED ON THE NEGATIVE THEORY OF NEGATIVE CAUSE, THIS ISSUES, H SO LIKE THAT.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">THIS TERMS AND CONDITIONS AND STARTING DISCLAIMER OF RESPONSIBILITIES, DO NOT INCLUDE THE LEGAL RIGHTS OF DISCLAIMER THAT CANNOT BE EXCLUDED BY APPLICABLE LAW.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Limits of liability reflect the distribution of risks between the parties. The limitations specified in this section will survive and apply even if any of the limited remedies specified in these terms are found to have failed to achieve its essential purpose. The limitations of liability set forth in these terms are in favor of Ho Chi Minh City Tourism and its affiliates, successors and assigns.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">COMPENSATION</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">You agree to defend and indemnify HoChiMinh City Tourism and its affiliates and any of their officers, directors, employees and agents from and against any claim, cause of action, claim, recovery, loss, damage, fine, penalty or other costs or expenses of any kind or nature including but not limited to legal and accounting fees reasons, given by third parties due to:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(i) your breach of this Agreement or the documents referred to herein;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(ii) you violate any law or the rights of a third party; or</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iii) your use of this Application.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">LINK TO THIRD PARTY APPS</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">This application may contain hyperlinks to applications operated by parties other than Ho Chi Minh City Tourism. These links are provided for your reference only. We do not control those applications and are not responsible for their content or the privacy or other practices of such applications. Furthermore, you must take precautions to ensure that any links you choose or software you download (whether from this App or other apps) are free of items such as viruses. , worms, trojan horses, bugs and other items that can destroy Nature. Our inclusion of hyperlinks to such applications does not imply any endorsement of the material on such applications or any association with their operators. In some cases, you may be asked by a third-party application to link your profile on HoChiMinh City Tourism with a profile on another third-party application. Choosing to do so is entirely optional, and the decision to allow this information association may be disabled (with third-party applications) at any time.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">SOFTWARE AVAILABLE ON THIS APPLICATION</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Unless otherwise stated, the materials on this Application are presented only to provide relevant information and to promote the services, applications, partners and other products of Ho Chi Minh City Tourism. Minh in Vietnam, territories, properties and protectorates of Ho Chi Minh City. This application is controlled and operated by HoChiMinh City Tourism from its offices in Vietnam. Ho Chi Minh City Tourism makes no representation that the materials on this Application are appropriate or available for use outside of Vietnam. Those who choose to access this Application from outside Vietnam do so at their own initiative and are responsible for compliance with local laws, if and to the extent local laws are applicable. By using this Application, you represent and warrant that you are not located, under the control of or a citizen or resident of any such country or on any such listing.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">This software is a copyrighted work of Ho Chi Minh City Tourism, or its Ho Chi Minh City Tourism Affiliates, or other third parties as identified. Your use of such Software is governed by the terms of the end user license agreement, if any, accompanying or accompanying the Software (&quot;License Agreement&quot;). You may not install or use any Software accompanying or including the License Agreement unless you agree in advance to the terms of the License Agreement. For any Software made available for download on this Application without a License Agreement, we hereby grant you, the user, a limited, personal, non-transferable license to use the Software to view and use this Application subject to these terms and conditions and for no other purpose.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Please note that all Software, including but not limited to, all HTML, XML, Java code and Active X controls contained on this Application, is owned by HoChiMinh City Tourism, its affiliates and/or third parties and is protected by copyright law and international treaty terms. Any copying or redistribution of the Software is strictly prohibited and may result in severe civil and criminal penalties. Violators will be prosecuted to the fullest extent possible.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">NO LIMITATIONS TO CREATION, COPY OR RECOMMENDATION OF SOFTWARE TO ANY SERVER OR OTHER LOCATION FOR FURTHER REFERENCE OR DISTRIBUTION IS EXPRESSLY PROHIBITED. THE SOFTWARE IS WARRANTY, IF YES, ONLY UNDER THE TERMS OF THE LICENSE AGREEMENT.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TERMS OF USE ON MOBILE DEVICES</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Portions of HoChiMinh City Tourism&#39;s mobile software may use copyrighted material, the use of which is acknowledged by HoChiMinh City Tourism. In addition, specific terms apply to the use of certain Ho Chi Minh City Tourism mobile applications.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">COPYRIGHT AND TRADEMARK NOTICE</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">All content of this App is: &copy; 2015 Ho Chi Minh City Tourism. Copyright Registered. Ho Chi Minh City Tourism is not responsible for the content on applications operated by parties other than Ho Chi Minh City Tourism. Ho Chi Minh City Tourism, the logo and all other product or service names or slogans displayed on this App are registered trademarks and/or common trademarks of Ho Chi Minh City Tourism Minh and/or its suppliers or licensors, and may not copy, imitate or use, in whole or in part, without the prior written permission of HoChiMinh City Tourism or the owner. current trademark ownership. In addition, the look and feel of this Application, including all page headers, custom graphics, button icons, and text, is a service mark, trademark and/or trade dress of City Tourism. Ho Chi Minh City and may not be copied, imitated or used, in whole or in part, without the prior written permission of HoChiMinh City Tourism. All other trademarks, registered trademarks, product names and company names or logos mentioned in this Application are the property of their respective owners. Reference to any product, service, process or other information, by trade name, trademark, manufacturer, supplier or otherwise does not constitute or imply endorsement, sponsorship or promotion. Recommended by HoChiMinh City Tourism.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Notice and Takedown Policy for Illegal Content.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HoChiMinh City Tourism operates on a &ldquo;notice and remove&rdquo; basis. If you have any complaints or objections to material or content, or if you believe that material or content posted on this App infringes a copyright you hold, please contact us. me immediately by following our notice and takedown process. Once this process is followed, Ho Chi Minh City Tourism will use reasonable efforts to remove illegal content.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Modifications</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ho Chi Minh City Tourism may change, add or remove the terms and conditions of this Agreement or any part thereof at any time in its sole discretion as it deems necessary. and reasonable for legal, general and technical purposes, or due to changes in the services provided or the nature or layout of this Application. You then expressly agree to be bound by any such modified terms and conditions.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ho Chi Minh City Tourism may change, suspend or discontinue any aspect of the Ho Chi Minh City Travel service at any time, including the availability of any features, facilities or services. any data or content. Ho Chi Minh City Tourism may also impose limitations on certain features and services or restrict your access to all or parts of this Application or any City Travel application. Ho Chi Minh City without notice or liability for technical or security reasons, to prevent unauthorized access, loss, or destruction of data or in our sole discretion that you are in breach of any term of this Agreement or any law or regulation and where it decides to discontinue service.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">YOUR CONTINUED USE OF US NOW, OR AFTER POSTING ANY NOTICE OF ANY CHANGES WILL SIGN UP THAT YOU ACCEPT THE MODIFICATIONS OF IT.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">overview</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">This application is operated by a Singapore legal entity and this Agreement is governed by the laws of Singapore. You hereby agree to the sole jurisdiction and venue of the courts in Singapore and to the fairness and convenience of proceedings in such courts in respect of all disputes arising therefrom. from or in connection with the use of this Application. You agree that all claims you may have against Ho Chi Minh City Tourism arising out of or in connection with this Application must be heard and resolved in a court having jurisdiction over the subject matter. authorized in Singapore. Unauthorized use of this App in any jurisdiction has no effect on all provisions of these terms and conditions, including but not limited to this clause. The foregoing shall not apply to the extent that applicable law in your country of residence requires the application of other law and/or jurisdiction and this cannot be excluded by contract.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">You agree that no joint venture, agency, partnership or employment relationship exists between you and HoChiMinh City Tourism and/or its affiliates as a result of this Agreement or the use of this Application.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Our performance of this Agreement is subject to applicable law and legal process, and nothing in this Agreement limits our right to comply with law enforcement authorities or requests or governmental or other legal requirements relating to your use of this Application or information provided or collected by us for such use. To the extent permitted by applicable law, you agree that you will bring any claim or cause of action arising out of or in connection with your access to or use of this App within two ( 2) years from the date of arising or accumulating such claim or action or such claim or cause of action shall be irrevocably waived.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">If any part of this Agreement is determined to be invalid or unenforceable under applicable law including, but not limited to, the foregoing warranty disclaimers and limitations of liability. , then the invalid or unenforceable provision will be replaced by a valid, enforceable term that best matches the intent of the original provision, and the remaining provisions of this Agreement will continue. continue in force.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">This Agreement (and any other terms and conditions referred to herein) constitutes the entire agreement between you and Ho Chi Minh City Tourism with respect to this App and it supersedes all communications and prior or contemporaneous proposal, whether electronic, oral or written, between you and Ho Chi Minh City Tourism with respect to this Application. The printed version of this Agreement and of any notice given in electronic form shall be admissible in judicial or administrative proceedings based upon or relating to this Agreement to the same extent. and subject to the same conditions as other business documents and records originally created and maintained in the printed form.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">These Terms and Conditions are available in the language of this Application. The specific terms and conditions with which you enter into an agreement will not be stored separately by HoChiMinh City Tourism.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">This application may not always be periodically or regularly updated and is therefore not required to be registered as an editorial product under any relevant laws.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Fictional names of companies, products, people, characters and/or data mentioned on this App are not intended to represent any real person, company, product or event.</span></span></span></p>

<p><span lang="EN-US" style="font-size:13.0pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Any rights not recognized herein are reserved.</span></span></span></p>',
      'PRIVACY_CONTENT_VI' => '<h1 style="text-align: center;"><span style="font-size:20px;">??i???u kho???n, ??i???u ki???n v&agrave; L??u &yacute;</span></h1>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ch&agrave;o m???ng ?????n v???i Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ng?????i s??? d???ng ???ng d???ng n&agrave;y s??? kh&ocirc;ng ph???i ch???u b???t k??? kho???n ph&iacute; n&agrave;o cho vi???c s??? d???ng ???ng d???ng n&agrave;y theo Th???a thu???n n&agrave;y. Tuy nhi&ecirc;n, ???ng d???ng n&agrave;y ch???a c&aacute;c li&ecirc;n k???t ?????n c&aacute;c ???ng d???ng c???a b&ecirc;n th??? ba ???????c ??i???u h&agrave;nh v&agrave; s??? h???u b???i c&aacute;c nh&agrave; cung c???p d???ch v??? ho???c nh&agrave; b&aacute;n l??? ?????c l???p. C&aacute;c b&ecirc;n th??? ba ??&oacute; c&oacute; th??? t&iacute;nh ph&iacute; s??? d???ng m???t s??? n???i dung ho???c d???ch v??? ???????c cung c???p tr&ecirc;n ???ng d???ng c???a h???. Do ??&oacute;, b???n n&ecirc;n th???c hi???n b???t k??? cu???c ??i???u tra n&agrave;o m&agrave; b???n c???m th???y l&agrave; c???n thi???t ho???c ph&ugrave; h???p tr?????c khi ti???n h&agrave;nh b???t k??? giao d???ch n&agrave;o v???i b???t k??? b&ecirc;n th??? ba n&agrave;o ????? x&aacute;c ?????nh xem li???u c&oacute; ph???i ch???u m???t kho???n ph&iacute; hay kh&ocirc;ng. Tr?????ng h???p Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh cung c???p th&ocirc;ng tin chi ti???t v??? c&aacute;c kho???n ph&iacute; tr&ecirc;n ???ng d???ng n&agrave;y, th&ocirc;ng tin ??&oacute; ch??? ???????c cung c???p nh???m m???c ??&iacute;ch thu???n ti???n v&agrave; cung c???p th&ocirc;ng tin. Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh kh&ocirc;ng c&oacute; c&aacute;ch n&agrave;o ?????m b???o r???ng th&ocirc;ng tin n&agrave;y l&agrave; ch&iacute;nh x&aacute;c c??ng nh?? kh&ocirc;ng ch???u tr&aacute;ch nhi???m v??? n???i dung ho???c d???ch v??? ???????c cung c???p tr&ecirc;n c&aacute;c ???ng d???ng c???a b&ecirc;n th??? ba ??&oacute;.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&Aacute;C HO???T ?????NG C???M</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung ???ng d???ng, c??ng nh?? c?? s??? h??? t???ng ???????c s??? d???ng ????? cung c???p n???i dung v&agrave; th&ocirc;ng tin ??&oacute;, l&agrave; ?????c quy???n c???a ch&uacute;ng t&ocirc;i. B???n ?????ng &yacute; kh&ocirc;ng s???a ?????i, sao ch&eacute;p, ph&acirc;n ph???i, truy???n t???i, hi???n th???, bi???u di???n, t&aacute;i s???n xu???t, xu???t b???n, c???p ph&eacute;p, t???o ra c&aacute;c t&aacute;c ph???m ph&aacute;i sinh t???, chuy???n nh?????ng ho???c b&aacute;n ho???c b&aacute;n l???i b???t k??? th&ocirc;ng tin, ph???n m???m, s???n ph???m ho???c d???ch v??? n&agrave;o c&oacute; ???????c t??? ho???c th&ocirc;ng qua vi???c n&agrave;y Trang m???ng.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ngo&agrave;i ra, b???n kh&ocirc;ng ???????c ph&eacute;p:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(i) s??? d???ng ???ng d???ng n&agrave;y ho???c n???i dung c???a n&oacute; cho b???t k??? m???c ??&iacute;ch th????ng m???i n&agrave;o;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(ii) truy c???p, theo d&otilde;i ho???c sao ch&eacute;p b???t k??? n???i dung ho???c th&ocirc;ng tin n&agrave;o c???a ???ng d???ng n&agrave;y b???ng c&aacute;ch s??? d???ng b???t k??? r&ocirc;-b???t, tr&igrave;nh thu g???n n&agrave;o, m&aacute;y qu&eacute;t ho???c c&aacute;c ph????ng ti???n t??? ?????ng kh&aacute;c ho???c b???t k??? quy tr&igrave;nh th??? c&ocirc;ng n&agrave;o cho b???t k??? m???c ??&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; s??? cho ph&eacute;p r&otilde; r&agrave;ng b???ng v??n b???n c???a ch&uacute;ng t&ocirc;i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iii) vi ph???m c&aacute;c h???n ch??? trong b???t k??? ti&ecirc;u ????? lo???i tr??? r&ocirc; b???t n&agrave;o tr&ecirc;n ???ng d???ng n&agrave;y ho???c b??? qua ho???c ph&aacute; v??? c&aacute;c bi???n ph&aacute;p kh&aacute;c ???????c s??? d???ng ????? ng??n ch???n ho???c h???n ch??? quy???n truy c???p v&agrave;o ???ng d???ng n&agrave;y;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iv) th???c hi???n b???t k??? h&agrave;nh ?????ng n&agrave;o &aacute;p ?????t, ho???c c&oacute; th??? &aacute;p ?????t, theo quy???t ?????nh c???a ch&uacute;ng t&ocirc;i, m???t t???i tr???ng l???n kh&ocirc;ng h???p l&yacute; ho???c kh&ocirc;ng t????ng x???ng ?????i v???i c?? s??? h??? t???ng c???a ch&uacute;ng t&ocirc;i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(v) li&ecirc;n k???t s&acirc;u ?????n b???t k??? ph???n n&agrave;o c???a ???ng d???ng n&agrave;y cho b???t k??? m???c ??&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; s??? cho ph&eacute;p r&otilde; r&agrave;ng b???ng v??n b???n c???a ch&uacute;ng t&ocirc;i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(vi) &ldquo;khung&rdquo;, &ldquo;nh&acirc;n b???n&rdquo; ho???c k???t h???p b???t k??? ph???n n&agrave;o c???a ???ng d???ng n&agrave;y v&agrave;o b???t k??? ???ng d???ng n&agrave;o kh&aacute;c m&agrave; kh&ocirc;ng c&oacute; s??? cho ph&eacute;p tr?????c b???ng v??n b???n c???a ch&uacute;ng t&ocirc;i; ho???c l&agrave;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(vii) c??? g???ng s???a ?????i, d???ch, ??i???u ch???nh, ch???nh s???a, d???ch ng?????c, th&aacute;o r???i ho???c thi???t k??? ?????i chi???u b???t k??? ch????ng tr&igrave;nh ph???n m???m n&agrave;o ???????c HoChiMinh City Tourism s??? d???ng li&ecirc;n quan ?????n ???ng d???ng n&agrave;y ho???c c&aacute;c d???ch v??? tr??? khi ???????c cho ph&eacute;p theo lu???t hi???n h&agrave;nh.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">CH&Iacute;NH S&Aacute;CH B???O M???T</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HoChiMinh City Tourism tin t?????ng v&agrave;o vi???c b???o v??? s??? ri&ecirc;ng t?? c???a b???n. B???t k??? th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o b???n ????ng tr&ecirc;n ???ng d???ng n&agrave;y s??? ???????c s??? d???ng theo ch&iacute;nh s&aacute;ch b???o m???t c???a ch&uacute;ng t&ocirc;i.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&Aacute;C K??? HO???CH, NH???N X&Eacute;T V&Agrave; S??? D???NG C&Aacute;C V&Ugrave;NG T????NG T&Aacute;C KH&Aacute;C</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ch&uacute;ng t&ocirc;i tr&acirc;n tr???ng ???????c nghe t??? b???n. Xin l??u &yacute; r???ng b???ng c&aacute;ch g???i n???i dung ?????n ???ng d???ng n&agrave;y b???ng th?? ??i???n t???, c&aacute;c b&agrave;i ????ng tr&ecirc;n ???ng d???ng n&agrave;y ho???c b???ng c&aacute;ch kh&aacute;c, bao g???m b???t k??? c&acirc;u h???i, h&igrave;nh ???nh ho???c video, nh???n x&eacute;t, ????? xu???t, &yacute; t?????ng ho???c nh???ng th??? t????ng t??? c&oacute; trong b???t k??? b&agrave;i g???i n&agrave;o (g???i chung l&agrave; &ldquo;B&agrave;i n???p&rdquo;), b???n c???p cho Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh v&agrave; c&aacute;c chi nh&aacute;nh c???a n&oacute; quy???n kh&ocirc;ng ?????c quy???n, mi???n ph&iacute; b???n quy???n, v??nh vi???n, c&oacute; th??? chuy???n nh?????ng, kh&ocirc;ng th??? thu h???i v&agrave; ho&agrave;n to&agrave;n c&oacute; th??? c???p ph&eacute;p l???i ????? (a) s??? d???ng, t&aacute;i s???n xu???t, s???a ?????i, ??i???u ch???nh, d???ch, ph&acirc;n ph???i, xu???t b???n, t???o c&aacute;c t&aacute;c ph???m ph&aacute;i sinh t??? v&agrave; tr??ng b&agrave;y v&agrave; bi???u di???n c&ocirc;ng khai C&aacute;c ????? tr&igrave;nh nh?? v???y tr&ecirc;n kh???p th??? gi???i tr&ecirc;n b???t k??? ph????ng ti???n truy???n th&ocirc;ng n&agrave;o, hi???n ??&atilde; ???????c bi???t ?????n ho???c sau n&agrave;y ???????c ph&aacute;t minh ra; v&agrave; (b) s??? d???ng t&ecirc;n m&agrave; b???n g???i li&ecirc;n quan ?????n N???i dung g???i ??&oacute;. B???n x&aacute;c nh???n r???ng Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c&oacute; th??? ch???n cung c???p c&aacute;c nh???n x&eacute;t ho???c ??&aacute;nh gi&aacute; c???a b???n theo quy???t ?????nh c???a ch&uacute;ng t&ocirc;i. B???n c??ng c???p cho Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh quy???n truy c???u tr?????c ph&aacute;p lu???t b???t k??? c&aacute; nh&acirc;n ho???c t??? ch???c n&agrave;o vi ph???m c&aacute;c quy???n c???a B???n ho???c Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh trong c&aacute;c ????? tr&igrave;nh do vi ph???m Th???a thu???n n&agrave;y. B???n th???a nh???n v&agrave; ?????ng &yacute; r???ng N???i dung ????? tr&igrave;nh l&agrave; kh&ocirc;ng b&iacute; m???t v&agrave; kh&ocirc;ng ?????c quy???n.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">???ng d???ng n&agrave;y c&oacute; th??? ch???a c&aacute;c di???n ??&agrave;n th???o lu???n, b???ng th&ocirc;ng b&aacute;o, d???ch v??? b&igrave;nh lu???n ho???c c&aacute;c di???n ??&agrave;n kh&aacute;c trong ??&oacute; b???n ho???c c&aacute;c b&ecirc;n th??? ba c&oacute; th??? ????ng ??&aacute;nh gi&aacute; v??? tr???i nghi???m du l???ch ho???c n???i dung, th&ocirc;ng ??i???p, t&agrave;i li???u ho???c c&aacute;c m???c kh&aacute;c tr&ecirc;n ???ng d???ng n&agrave;y (&ldquo;Khu v???c t????ng t&aacute;c&rdquo;). N???u HoChiMinh City Tourism cung c???p c&aacute;c V&ugrave;ng t????ng t&aacute;c nh?? v???y, b???n ho&agrave;n to&agrave;n ch???u tr&aacute;ch nhi???m v??? vi???c s??? d???ng c&aacute;c V&ugrave;ng t????ng t&aacute;c ??&oacute; v&agrave; t??? ch???u r???i ro khi s??? d???ng. B???ng c&aacute;ch s??? d???ng b???t k??? Khu v???c t????ng t&aacute;c n&agrave;o, b???n ?????ng &yacute; r&otilde; r&agrave;ng kh&ocirc;ng ????ng, t???i l&ecirc;n, truy???n, ph&acirc;n ph???i, l??u tr???, t???o ho???c xu???t b???n th&ocirc;ng qua ???ng d???ng n&agrave;y b???t k??? n???i dung n&agrave;o sau ??&acirc;y:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">B???t k??? tin nh???n, d??? li???u, th&ocirc;ng tin, v??n b???n, &acirc;m nh???c, &acirc;m thanh, ???nh, ????? h???a, m&atilde; ho???c b???t k??? t&agrave;i li???u n&agrave;o kh&aacute;c (&ldquo;N???i dung&rdquo;) sai, b???t h???p ph&aacute;p, g&acirc;y hi???u l???m, b&ocirc;i nh???, ph??? b&aacute;ng, khi&ecirc;u d&acirc;m, khi&ecirc;u d&acirc;m, kh&ocirc;ng ?????ng ?????n, d&acirc;m &ocirc;, kh&ecirc;u g???i, qu???y r???i ho???c ???ng h??? vi???c qu???y r???i ng?????i kh&aacute;c, ??e d???a, x&acirc;m ph???m quy???n ri&ecirc;ng t?? ho???c quy???n c&ocirc;ng khai, l???m d???ng, k&iacute;ch ?????ng, l???a ?????o ho???c b??? ph???n ?????i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung x&uacute;c ph???m c???ng ?????ng tr???c tuy???n m???t c&aacute;ch th?????ng xuy&ecirc;n, ch???ng h???n nh?? n???i dung c??? v?? ph&acirc;n bi???t ch???ng t???c, c??? ch???p, th&ugrave; h???n ho???c t???n h???i th??? ch???t d?????i b???t k??? h&igrave;nh th???c n&agrave;o ch???ng l???i b???t k??? nh&oacute;m ho???c c&aacute; nh&acirc;n n&agrave;o;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung c???u th&agrave;nh, khuy???n kh&iacute;ch, qu???ng b&aacute; ho???c cung c???p h?????ng d???n ????? th???c hi???n m???t ho???t ?????ng b???t h???p ph&aacute;p, ph???m t???i h&igrave;nh s???, d???n ?????n tr&aacute;ch nhi???m d&acirc;n s???, vi ph???m quy???n c???a b???t k??? b&ecirc;n n&agrave;o ??? b???t k??? qu???c gia n&agrave;o tr&ecirc;n th??? gi???i ho???c n???u kh&ocirc;ng s??? t???o ra tr&aacute;ch nhi???m ph&aacute;p l&yacute; ho???c vi ph???m b???t k??? lu???t ph&aacute;p ?????a ph????ng, ti???u bang, qu???c gia ho???c qu???c t???, bao g???m nh??ng kh&ocirc;ng gi???i h???n c&aacute;c quy ?????nh c???a ???y ban Ch???ng kho&aacute;n v&agrave; Giao d???ch Singapore (SEC) ho???c b???t k??? quy t???c n&agrave;o c???a b???t k??? s&agrave;n giao d???ch ch???ng kho&aacute;n n&agrave;o;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung cung c???p th&ocirc;ng tin h?????ng d???n v??? c&aacute;c ho???t ?????ng b???t h???p ph&aacute;p nh?? ch??? t???o ho???c mua v?? kh&iacute; b???t h???p ph&aacute;p, vi ph???m quy???n ri&ecirc;ng t?? c???a ai ??&oacute; ho???c cung c???p ho???c t???o vi r&uacute;t m&aacute;y t&iacute;nh;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung c&oacute; th??? vi ph???m b???t k??? b???ng s&aacute;ng ch???, nh&atilde;n hi???u, b&iacute; m???t th????ng m???i, b???n quy???n ho???c c&aacute;c quy???n s??? h???u ho???c tr&iacute; tu??? kh&aacute;c c???a b???t k??? b&ecirc;n n&agrave;o. C??? th???, n???i dung qu???ng b&aacute; b???n sao b???t h???p ph&aacute;p ho???c tr&aacute;i ph&eacute;p t&aacute;c ph???m c&oacute; b???n quy???n c???a ng?????i kh&aacute;c, ch???ng h???n nh?? cung c???p c&aacute;c ch????ng tr&igrave;nh m&aacute;y t&iacute;nh vi ph???m b???n quy???n ho???c li&ecirc;n k???t ?????n ch&uacute;ng, cung c???p th&ocirc;ng tin ????? ph&aacute; v??? c&aacute;c thi???t b??? ch???ng sao ch&eacute;p ???????c c&agrave;i ?????t s???n ho???c cung c???p nh???c vi ph???m b???n quy???n ho???c li&ecirc;n k???t ?????n c&aacute;c t???p nh???c vi ph???m b???n quy???n ;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung m???o danh b???t k??? c&aacute; nh&acirc;n ho???c t??? ch???c n&agrave;o ho???c n&oacute;i c&aacute;ch kh&aacute;c l&agrave; xuy&ecirc;n t???c m???i quan h??? c???a b???n v???i m???t c&aacute; nh&acirc;n ho???c t??? ch???c, bao g???m c??? HoChiMinh City Tourism;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Khuy???n m???i kh&ocirc;ng ???????c y&ecirc;u c???u, g???i th?? h&agrave;ng lo???t ho???c &quot;g???i th?? r&aacute;c&quot;, truy???n &quot;th?? r&aacute;c&quot;, &quot;th?? d&acirc;y chuy???n&quot;, chi???n d???ch ch&iacute;nh tr???, qu???ng c&aacute;o, cu???c thi, x??? s??? ho???c x&uacute;i gi???c;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung ch???a c&aacute;c ho???t ?????ng th????ng m???i v&agrave; / ho???c b&aacute;n h&agrave;ng m&agrave; kh&ocirc;ng c&oacute; s??? ?????ng &yacute; tr?????c b???ng v??n b???n c???a ch&uacute;ng t&ocirc;i, ch???ng h???n nh?? c&aacute;c cu???c thi, r&uacute;t ??????th??m tr&uacute;ng th?????ng, h&agrave;ng ?????i h&agrave;ng, qu???ng c&aacute;o v&agrave; k??? ho???ch kim t??? th&aacute;p;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Th&ocirc;ng tin c&aacute; nh&acirc;n c???a b???t k??? b&ecirc;n th??? ba n&agrave;o, bao g???m nh??ng kh&ocirc;ng gi???i h???n, ?????a ch??? h??? (t&ecirc;n gia ??&igrave;nh), s??? ??i???n tho???i, ?????a ch??? email, s??? nh???n d???ng qu???c gia v&agrave; s??? th??? t&iacute;n d???ng.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ch???a c&aacute;c trang truy c???p b??? h???n ch??? ho???c ch??? c&oacute; m???t kh???u, ho???c c&aacute;c trang ho???c h&igrave;nh ???nh ???n (nh???ng trang kh&ocirc;ng ???????c li&ecirc;n k???t ?????n ho???c t??? m???t trang c&oacute; th??? truy c???p kh&aacute;c);</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Vi r&uacute;t, d??? li???u b??? h???ng ho???c c&aacute;c t???p c&oacute; h???i, g&acirc;y r???i ho???c ph&aacute; ho???i kh&aacute;c;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung kh&ocirc;ng li&ecirc;n quan ?????n ch??? ????? c???a (c&aacute;c) Khu v???c t????ng t&aacute;c m&agrave; N???i dung ??&oacute; ???????c ????ng; ho???c l&agrave;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???i dung ho???c li&ecirc;n k???t ?????n n???i dung, theo nh???n ?????nh duy nh???t c???a HoChiMinh City Tourism, (a) vi ph???m c&aacute;c ti???u m???c tr?????c ??&acirc;y c???a t&agrave;i li???u n&agrave;y, (b) l&agrave; ph???n ?????i, (c) h???n ch??? ho???c ng??n c???n b???t k??? ng?????i n&agrave;o kh&aacute;c s??? d???ng ho???c t???n h?????ng c&aacute;c Khu v???c t????ng t&aacute;c ho???c ??i???u n&agrave;y ???ng d???ng, ho???c (d) c&oacute; th??? khi???n Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh ho???c c&aacute;c chi nh&aacute;nh c???a n&oacute; ho???c ng?????i d&ugrave;ng c???a n&oacute; ph???i ch???u b???t k??? t???n h???i ho???c tr&aacute;ch nhi???m ph&aacute;p l&yacute; n&agrave;o d?????i b???t k??? h&igrave;nh th???c n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh kh&ocirc;ng ch???u tr&aacute;ch nhi???m v&agrave; kh&ocirc;ng ch???u tr&aacute;ch nhi???m ph&aacute;p l&yacute; ?????i v???i b???t k??? N???i dung n&agrave;o do b???n ho???c b???t k??? b&ecirc;n th??? ba n&agrave;o ????ng t???i, l??u tr??? ho???c t???i l&ecirc;n, ho???c ?????i v???i b???t k??? t???n th???t ho???c thi???t h???i n&agrave;o, Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c??ng kh&ocirc;ng ch???u tr&aacute;ch nhi???m v??? b???t k??? sai l???m, ph??? b&aacute;ng, vu kh???ng, b&ocirc;i nh???, thi???u s&oacute;t n&agrave;o , gi??? d???i, t???c t??u, n???i dung khi&ecirc;u d&acirc;m ho???c th&ocirc; t???c m&agrave; b???n c&oacute; th??? g???p ph???i. V???i t?? c&aacute;ch l&agrave; nh&agrave; cung c???p c&aacute;c d???ch v??? t????ng t&aacute;c, Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh kh&ocirc;ng ch???u tr&aacute;ch nhi???m v??? b???t k??? tuy&ecirc;n b???, ?????i di???n ho???c N???i dung n&agrave;o ???????c cung c???p b???i ng?????i d&ugrave;ng c???a m&igrave;nh tr&ecirc;n b???t k??? di???n ??&agrave;n c&ocirc;ng c???ng, trang ch??? c&aacute; nh&acirc;n ho???c Khu v???c t????ng t&aacute;c n&agrave;o kh&aacute;c. M???c d&ugrave; Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh kh&ocirc;ng c&oacute; ngh??a v??? s&agrave;ng l???c, ch???nh s???a ho???c gi&aacute;m s&aacute;t b???t k??? N???i dung n&agrave;o ???????c ????ng t???i l&ecirc;n ho???c ph&acirc;n ph???i qua b???t k??? Khu v???c t????ng t&aacute;c n&agrave;o, Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c&oacute; quy???n, v&agrave; c&oacute; to&agrave;n quy???n quy???t ?????nh lo???i b???, s&agrave;ng l???c ho???c ch???nh s???a m&agrave; kh&ocirc;ng c???n th&ocirc;ng b&aacute;o b???t k??? N???i dung n&agrave;o ???????c ????ng ho???c ???????c l??u tr??? tr&ecirc;n ???ng d???ng n&agrave;y v&agrave;o b???t k??? l&uacute;c n&agrave;o v&agrave; v&igrave; b???t k??? l&yacute; do g&igrave;, v&agrave; b???n ho&agrave;n to&agrave;n ch???u tr&aacute;ch nhi???m v??? vi???c t???o c&aacute;c b???n sao d??? ph&ograve;ng v&agrave; thay th??? b???t k??? N???i dung n&agrave;o b???n ????ng ho???c l??u tr??? tr&ecirc;n ???ng d???ng n&agrave;y b???ng chi ph&iacute; v&agrave; chi ph&iacute; duy nh???t c???a b???n.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???u ???????c x&aacute;c ?????nh r???ng b???n gi??? c&aacute;c quy???n nh&acirc;n th&acirc;n (bao g???m quy???n ghi c&ocirc;ng ho???c quy???n to&agrave;n v???n) trong N???i dung ho???c N???i dung g???i, th&igrave; b???n tuy&ecirc;n b??? r???ng (a) b???n kh&ocirc;ng y&ecirc;u c???u s??? d???ng b???t k??? th&ocirc;ng tin nh???n d???ng c&aacute; nh&acirc;n n&agrave;o li&ecirc;n quan ?????n N???i dung ho???c N???i dung g???i, ho???c b???t k??? s???n ph???m ph&aacute;i sinh n&agrave;o c???a ho???c n&acirc;ng c???p ho???c c???p nh???t t??? ??&oacute;; (b) b???n kh&ocirc;ng ph???n ?????i vi???c xu???t b???n, s??? d???ng, s???a ?????i, x&oacute;a v&agrave; khai th&aacute;c N???i dung ho???c B&agrave;i d??? thi c???a HoChiMinh City Tourism ho???c nh???ng ng?????i ???????c c???p ph&eacute;p, k??? th???a v&agrave; chuy???n nh?????ng; (c) b???n v??nh vi???n t??? b??? v&agrave; ?????ng &yacute; kh&ocirc;ng y&ecirc;u c???u ho???c kh???ng ?????nh b???t k??? quy???n l???i n&agrave;o ?????i v???i b???t k??? v&agrave; t???t c??? c&aacute;c quy???n nh&acirc;n th&acirc;n c???a t&aacute;c gi??? trong b???t k??? N???i dung ho???c B&agrave;i g???i n&agrave;o; v&agrave; (d) b???n v??nh vi???n tr??? t??? do cho HoChiMinh City Tourism, v&agrave; nh???ng ng?????i ???????c c???p ph&eacute;p, k??? th???a v&agrave; chuy???n nh?????ng, kh???i b???t k??? khi???u n???i n&agrave;o m&agrave; b???n c&oacute; th??? kh???ng ?????nh ch???ng l???i HoChiMinh City Tourism b???ng b???t k??? quy???n nh&acirc;n th&acirc;n n&agrave;o nh?? v???y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">B???t k??? vi???c s??? d???ng Khu v???c t????ng t&aacute;c ho???c c&aacute;c ph???n kh&aacute;c c???a ???ng d???ng n&agrave;y vi ph???m nh???ng ??i???u ??&atilde; n&oacute;i ??? tr&ecirc;n ?????u vi ph???m Th???a thu???n n&agrave;y v&agrave; c&oacute; th??? d???n ?????n vi???c b???n b??? ch???m d???t ho???c ??&igrave;nh ch??? quy???n s??? d???ng Khu v???c t????ng t&aacute;c v&agrave; / ho???c ???ng d???ng n&agrave;y. ????? h???p t&aacute;c v???i c&aacute;c y&ecirc;u c???u h???p ph&aacute;p c???a ch&iacute;nh ph???, tr&aacute;t ??&ograve;i h???u t&ograve;a ho???c l???nh c???a t&ograve;a &aacute;n, ????? b???o v??? h??? th???ng v&agrave; kh&aacute;ch h&agrave;ng c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh, ho???c ????? ?????m b???o t&iacute;nh to&agrave;n v???n v&agrave; ho???t ?????ng c???a h??? th???ng v&agrave; kinh doanh c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh, Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c&oacute; th??? truy c???p v&agrave; ti???t l??? b???t k??? th&ocirc;ng tin n&agrave;o m&agrave; h??? cho l&agrave; c???n thi???t ho???c th&iacute;ch h???p, bao g???m nh??ng kh&ocirc;ng gi???i h???n, th&ocirc;ng tin h??? s?? ng?????i d&ugrave;ng (t???c l&agrave; t&ecirc;n, ?????a ch??? email, v.v.), ?????a ch??? IP v&agrave; th&ocirc;ng tin l??u l?????ng, l???ch s??? s??? d???ng v&agrave; N???i dung ??&atilde; ????ng. Quy???n ti???t l??? b???t k??? th&ocirc;ng tin n&agrave;o nh?? v???y c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh s??? ???????c ??u ti&ecirc;n h??n b???t k??? ??i???u kho???n n&agrave;o trong Ch&iacute;nh s&aacute;ch B???o m???t c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">??I???M DU L???CH</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">M???c d&ugrave; h???u h???t c&aacute;c chuy???n du l???ch, bao g???m c??? du l???ch ?????n c&aacute;c ??i???m ?????n qu???c t???, ???????c ho&agrave;n th&agrave;nh m&agrave; kh&ocirc;ng x???y ra s??? c???, vi???c ??i ?????n c&aacute;c ??i???m ?????n nh???t ?????nh c&oacute; th??? ti???m ???n r???i ro l???n h??n nh???ng ??i???m kh&aacute;c. HoChiMinh City Tourism k&ecirc;u g???i h&agrave;nh kh&aacute;ch ??i???u tra v&agrave; xem x&eacute;t c&aacute;c quy ?????nh c???m du l???ch, c???nh b&aacute;o, th&ocirc;ng b&aacute;o v&agrave; t?? v???n do Ch&iacute;nh ph??? V????ng qu???c Anh, Li&ecirc;n minh Ch&acirc;u &Acirc;u (EU) v&agrave; ch&iacute;nh ph??? c&aacute;c n?????c ?????n tr?????c khi ?????t chuy???n du l???ch ?????n c&aacute;c ??i???m ?????n qu???c t???.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">B???NG VI???C L???P ?????T TH&Ocirc;NG TIN LI&Ecirc;N QUAN ?????N VI???C ??I ?????N C&Aacute;C ??I???M ?????N QU???C T??? C??? TH???, CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG TUY&Ecirc;N B??? HO???C B???O ?????M R???NG VI???C ??I ?????N C&Aacute;C ??I???M ??&Oacute; L&Agrave; C&Oacute; L???I HO???C KH&Ocirc;NG R???I RO V&Agrave; KH&Ocirc;NG CH???U TR&Aacute;CH NHI???M ?????I V???I C&Aacute;C THI???T H???I HO???C T???N TH???T C&Oacute; TH??? PH&Aacute;T SINH T??? VI???C ??I ?????N C&Aacute;C ??I???M ??&Oacute;.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TUY&Ecirc;N B??? MI???N TR??? TR&Aacute;CH NHI???M</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TH&Ocirc;NG TIN, PH???N M???M, S???N PH???M V&Agrave; D???CH V??? ???????C XU???T B???N TR&Ecirc;N ???NG D???NG N&Agrave;Y C&Oacute; TH??? BAO G???M NH???NG L???I KH&Ocirc;NG CH&Iacute;NH X&Aacute;C HO???C L???I. CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG ?????M B???O T&Iacute;NH CH&Iacute;NH X&Aacute;C V&Agrave; T??? CH???I TR&Aacute;CH NHI???M PH&Aacute;P L&Yacute; ?????I V???I B???T K??? L???I HO???C KH&Ocirc;NG CH&Iacute;NH X&Aacute;C KH&Aacute;C LI&Ecirc;N QUAN ?????N TH&Ocirc;NG TIN V&Agrave; M&Ocirc; T??? C???A KH&Aacute;CH S???N, H&Agrave;NG KH&Ocirc;NG, T&Agrave;U, XE V&Agrave; B???T K??? S???N PH???M DU L???CH N&Agrave;O KH&Aacute;C ???????C HI???N TH??? TR&Ecirc;N ???NG D???NG N&Agrave;Y (BAO G???M, KH&Ocirc;NG GI???I H???N , CH???P ???NH, DANH S&Aacute;CH C&Aacute;C TI???N &Iacute;CH C???A KH&Aacute;CH S???N, M&Ocirc; T??? S???N PH???M CHUNG, V..V.).</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG TUY&Ecirc;N B??? B???T C??? H&Igrave;NH TH???C N&Agrave;O V??? S??? PH&Ugrave; H???P C???A TH&Ocirc;NG TIN, PH???N M???M, S???N PH???M V&Agrave; D???CH V??? LI&Ecirc;N H??? TR&Ecirc;N ???NG D???NG N&Agrave;Y HO???C B???T K??? C???NG N&Agrave;O CHO B???T K??? M???C ??&Iacute;CH N&Agrave;O V&Agrave; S??? BAO G???M HO???C CUNG C???P B???T K??? S???N PH???M HO???C D???CH V??? N&Agrave;O TR&Ecirc;N ???NG D???NG N&Agrave;Y KH&Ocirc;NG C&Oacute; B???T K??? HO???C NH???N ?????NH V??? C&Aacute;C S???N PH???M HO???C D???CH V??? C???A CH&Uacute;NG T&Ocirc;I. T???T C??? TH&Ocirc;NG TIN, PH???N M???M, S???N PH???M V&Agrave; D???CH V??? ?????U ???????C CUNG C???P &ldquo;NGUY&Ecirc;N TR???NG&rdquo; M&Agrave; KH&Ocirc;NG ???????C B???O H&Agrave;NH B???T K??? H&Igrave;NH TH???C N&Agrave;O. CH&Uacute;NG T&Ocirc;I T??? CH???I T???T C??? C&Aacute;C ?????M B???O V&Agrave; ??I???U KI???N R???NG ???NG D???NG N&Agrave;Y, C&Aacute;C M&Aacute;Y CH??? C???A N&Oacute; HO???C B???T K??? EMAIL N&Agrave;O ???????C G???I T??? CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG C&Oacute; VIRUS HO???C C&Aacute;C TH&Agrave;NH PH???N C&Oacute; H???I KH&Aacute;C. ?????I V???I M??? R???NG T???I ??A ???????C PH&Eacute;P THEO LU???T &Aacute;P D???NG C???A CH&Uacute;NG T&Ocirc;I T???I ??&Acirc;Y T??? CH???I T???T C??? C&Aacute;C B???O ?????M V&Agrave; ??I???U KI???N LI&Ecirc;N QUAN ?????N TH&Ocirc;NG TIN, PH???N M???M, S???N PH???M V&Agrave; D???CH V??? N&Agrave;Y, BAO G???M T???T C??? C&Aacute;C B???O ?????M NG??? &Yacute; V&Agrave; ??I???U KI???N V??? KH??? N??NG B???O ?????M V&Agrave; M???C ??&Iacute;CH, PH&Ugrave; H???P V???I M???T PH???N.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">CH&Uacute;NG T&Ocirc;I C??NG TUY&Ecirc;N B??? T??? CH???I B???T K??? B???O ?????M HO???C TUY&Ecirc;N B??? N&Agrave;O ?????I V???I T&Iacute;NH CH&Iacute;NH X&Aacute;C HO???C S??? H???U C???A N???I DUNG ???NG D???NG.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">KH&Ocirc;NG C&Oacute; ??I???U G&Igrave; TRONG TH???A THU???N N&Agrave;Y S??? LO???I TR??? HO???C GI???I H???N TR&Aacute;CH NHI???M PH&Aacute;P L&Yacute; C???A CH&Uacute;NG T&Ocirc;I ?????I V???I (I) C&Aacute;I CH???T HO???C TH????NG H???I C&Aacute; NH&Acirc;N DO S??? TI&Ecirc;U C???C; (II) NGU???N G???C; HO???C (III) TR&Aacute;CH NHI???M PH&Aacute;P L&Yacute; HO???C B???T C??? HO&Agrave;N TO&Agrave;N (IV) B???T K??? TR&Aacute;CH NHI???M PH&Aacute;P L&Yacute; N&Agrave;O KH&Aacute;C KH&Ocirc;NG TH??? LO???I TR??? THEO LU???T &Aacute;P D???NG.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">THEO VI???C B???T ?????U, B???N S??? D???NG ???NG D???NG N&Agrave;Y R???I RO C???A RI&Ecirc;NG B???N V&Agrave; KH&Ocirc;NG S??? KI???N N&Agrave;O G&Acirc;Y RA CHO CH&Uacute;NG T&Ocirc;I (C&Aacute;C C&Aacute;N B???, GI&Aacute;M ?????C V&Agrave; LI&Ecirc;N QUAN ?????N C???A N&Oacute;) CH???U TR&Aacute;CH NHI???M PH&Aacute;P L&Yacute; V??? B???T K??? S??? C???, B???T C???, ?????C BI???T, HO???C H???U QU??? N&Agrave;O M???T B???T K??? THU NH???P, L???I NHU???N, H&Oacute;A ????N, D??? LI???U, H???P ?????NG, VI???C S??? D???NG TI???N HO???C M???T HO???C THI???T H???I PH&Aacute;T SINH T??? HO???C K???T N???I TRONG B???T K??? C&Aacute;CH N&Agrave;O ?????I V???I DOANH NGHI???P LI&Ecirc;N QUAN ?????N B???T K??? LO???I H&Igrave;NH N&Agrave;O NGO&Agrave;I, HO???C B???T K??? C&Aacute;CH N&Agrave;O ???????C K???T N???I V???I VI???C B???N TRUY C???P, HI???N TH??? HO???C S??? D???NG ???NG D???NG N&Agrave;Y HO???C C&Oacute; S??? TR&Igrave; HO&Atilde;N HO???C KH&Ocirc;NG C&Oacute; KH??? N??NG TRUY C???P, HI???N TH??? HO???C S??? D???NG ???NG D???NG N&Agrave;Y (BAO G???M, NH??NG KH&Ocirc;NG GI???I H???N ?????I V???I, C&Aacute;C &Yacute; KI???N LI&Ecirc;N K???T C???A B???N XU???T HI???N TR&Ecirc;N ???NG D???NG N&Agrave;Y; B???T K??? VIRUS M&Aacute;Y T&Iacute;NH N&Agrave;O, TH&Ocirc;NG TIN, PH???N M???M, ???NG D???NG LI&Ecirc;N K???T, S???N PH???M V&Agrave; D???CH V??? TH&Ocirc;NG QUA ???NG D???NG N&Agrave;Y; HO???C C&Aacute;CH KH&Aacute;C PH&Aacute;T SINH NGO&Agrave;I VI???C TRUY C???P, HI???N TH??? HO???C S??? D???NG ???NG D???NG N&Agrave;Y) M&Agrave; D???A TR&Ecirc;N L&Yacute; THUY???T V??? S??? TI&Ecirc;U C???C, H???P ?????NG, KH??? N??NG, TR&Aacute;CH NHI???M NGHI&Ecirc;M C THI???T H???I NH?? V???Y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&Aacute;C ??I???U KHO???N V&Agrave; ??I???U KI???N N&Agrave;Y V&Agrave; B???T ?????U T??? CH???I TR&Aacute;CH NHI???M TR&Aacute;CH NHI???M, KH&Ocirc;NG ???NH H?????NG ?????N C&Aacute;C QUY???N PH&Aacute;P L&Yacute; X??? L&Yacute; KH&Ocirc;NG TH??? LO???I TR??? THEO LU???T &Aacute;P D???NG.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Gi???i h???n tr&aacute;ch nhi???m ph???n &aacute;nh s??? ph&acirc;n b??? r???i ro gi???a c&aacute;c b&ecirc;n. C&aacute;c gi???i h???n ???????c ch??? ?????nh trong ph???n n&agrave;y s??? t???n t???i v&agrave; &aacute;p d???ng ngay c??? khi b???t k??? bi???n ph&aacute;p kh???c ph???c h???n ch??? n&agrave;o ???????c ch??? ?????nh trong c&aacute;c ??i???u kho???n n&agrave;y ???????c ph&aacute;t hi???n l&agrave; kh&ocirc;ng ?????t ???????c m???c ??&iacute;ch thi???t y???u c???a n&oacute;. C&aacute;c gi???i h???n tr&aacute;ch nhi???m ph&aacute;p l&yacute; ???????c quy ?????nh trong c&aacute;c ??i???u kho???n n&agrave;y c&oacute; l???i cho Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh v&agrave; c&aacute;c c&ocirc;ng ty li&ecirc;n k???t, k??? th???a v&agrave; chuy???n nh?????ng c???a c&ocirc;ng ty.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">S??? B???I TH?????NG</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">B???n ?????ng &yacute; b???o v??? v&agrave; b???i th?????ng cho HoChiMinh City Tourism v&agrave; c&aacute;c chi nh&aacute;nh c???a n&oacute; v&agrave; b???t k??? c&aacute;n b???, gi&aacute;m ?????c, nh&acirc;n vi&ecirc;n v&agrave; ?????i l&yacute; n&agrave;o c???a h??? kh???i v&agrave; ch???ng l???i b???t k??? khi???u n???i, nguy&ecirc;n nh&acirc;n c???a h&agrave;nh ?????ng, y&ecirc;u c???u, thu h???i, t???n th???t, thi???t h???i, ti???n ph???t, h&igrave;nh ph???t ho???c c&aacute;c chi ph&iacute; ho???c chi ph&iacute; kh&aacute;c c???a b???t k??? h&igrave;nh th???c ho???c b???n ch???t n&agrave;o bao g???m nh??ng kh&ocirc;ng gi???i h???n ??? c&aacute;c kho???n ph&iacute; ph&aacute;p l&yacute; v&agrave; k??? to&aacute;n h???p l&yacute;, do c&aacute;c b&ecirc;n th??? ba ????a ra do:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(i) b???n vi ph???m Th???a thu???n n&agrave;y ho???c c&aacute;c t&agrave;i li???u ???????c ????? c???p ??? ??&acirc;y;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(ii) b???n vi ph???m b???t k??? lu???t n&agrave;o ho???c quy???n c???a b&ecirc;n th??? ba; ho???c l&agrave;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iii) vi???c b???n s??? d???ng ???ng d???ng n&agrave;y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">LI&Ecirc;N K???T ?????N ???NG D???NG B&Ecirc;N TH??? BA</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">???ng d???ng n&agrave;y c&oacute; th??? ch???a c&aacute;c si&ecirc;u li&ecirc;n k???t ?????n c&aacute;c ???ng d???ng ???????c ??i???u h&agrave;nh b???i c&aacute;c b&ecirc;n kh&ocirc;ng ph???i l&agrave; Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh. C&aacute;c ???????ng d???n n&agrave;y ???????c cung c???p cho b???n ch??? ????? tham kh???o. Ch&uacute;ng t&ocirc;i kh&ocirc;ng ki???m so&aacute;t c&aacute;c ???ng d???ng ??&oacute; v&agrave; kh&ocirc;ng ch???u tr&aacute;ch nhi???m v??? n???i dung c???a ch&uacute;ng ho???c quy???n ri&ecirc;ng t?? ho???c c&aacute;c ho???t ?????ng kh&aacute;c c???a c&aacute;c ???ng d???ng ??&oacute;. H??n n???a, b???n ph???i th???c hi???n c&aacute;c bi???n ph&aacute;p ph&ograve;ng ng???a ????? ?????m b???o r???ng b???t k??? li&ecirc;n k???t n&agrave;o b???n ch???n ho???c ph???n m???m b???n t???i xu???ng (cho d&ugrave; t??? ???ng d???ng n&agrave;y hay c&aacute;c ???ng d???ng kh&aacute;c) ?????u kh&ocirc;ng c&oacute; c&aacute;c m???c nh?? vi r&uacute;t, s&acirc;u, ng???a trojan, l???i v&agrave; c&aacute;c m???c kh&aacute;c c&oacute; th??? ph&aacute; ho???i Thi&ecirc;n nhi&ecirc;n. Vi???c ch&uacute;ng t&ocirc;i ????a c&aacute;c si&ecirc;u li&ecirc;n k???t ?????n c&aacute;c ???ng d???ng nh?? v???y kh&ocirc;ng ng??? &yacute; b???t k??? s??? ch???ng th???c n&agrave;o c???a t&agrave;i li???u tr&ecirc;n c&aacute;c ???ng d???ng ??&oacute; ho???c b???t k??? li&ecirc;n k???t n&agrave;o v???i c&aacute;c nh&agrave; ??i???u h&agrave;nh c???a ch&uacute;ng. Trong m???t s??? tr?????ng h???p, b???n c&oacute; th??? ???????c ???ng d???ng c???a b&ecirc;n th??? ba y&ecirc;u c???u li&ecirc;n k???t h??? s?? c???a b???n tr&ecirc;n HoChiMinh City Tourism v???i h??? s?? tr&ecirc;n m???t ???ng d???ng c???a b&ecirc;n th??? ba kh&aacute;c. Vi???c ch???n l&agrave;m nh?? v???y ho&agrave;n to&agrave;n l&agrave; t&ugrave;y ch???n v&agrave; quy???t ?????nh cho ph&eacute;p li&ecirc;n k???t th&ocirc;ng tin n&agrave;y c&oacute; th??? b??? v&ocirc; hi???u h&oacute;a (v???i ???ng d???ng c???a b&ecirc;n th??? ba) b???t k??? l&uacute;c n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">PH???N M???M C&Oacute; TR&Ecirc;N ???NG D???NG N&Agrave;Y</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Tr??? khi c&oacute; quy ?????nh kh&aacute;c, c&aacute;c t&agrave;i li???u tr&ecirc;n ???ng d???ng n&agrave;y ch??? ???????c tr&igrave;nh b&agrave;y ????? cung c???p th&ocirc;ng tin li&ecirc;n quan v&agrave; ????? qu???ng b&aacute; c&aacute;c d???ch v???, ???ng d???ng, ?????i t&aacute;c v&agrave; c&aacute;c s???n ph???m kh&aacute;c c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh t???i Vi???t Nam, c&aacute;c v&ugrave;ng l&atilde;nh th???, t&agrave;i s???n v&agrave; c&aacute;c qu???c gia b???o h??? c???a Th&agrave;nh ph??? H??? Ch&iacute; Minh. ???ng d???ng n&agrave;y ???????c ki???m so&aacute;t v&agrave; v???n h&agrave;nh b???i HoChiMinh City Tourism t??? c&aacute;c v??n ph&ograve;ng c???a n&oacute; t???i Vi???t Nam. Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh kh&ocirc;ng tuy&ecirc;n b??? r???ng c&aacute;c t&agrave;i li???u tr&ecirc;n ???ng d???ng n&agrave;y l&agrave; th&iacute;ch h???p ho???c c&oacute; s???n ????? s??? d???ng b&ecirc;n ngo&agrave;i Vi???t Nam. Nh???ng ng?????i ch???n truy c???p ???ng d???ng n&agrave;y t??? b&ecirc;n ngo&agrave;i Vi???t Nam l&agrave;m nh?? v???y theo s&aacute;ng ki???n c???a h??? v&agrave; ch???u tr&aacute;ch nhi???m tu&acirc;n th??? lu???t ph&aacute;p ?????a ph????ng, n???u v&agrave; trong ph???m vi lu???t ph&aacute;p ?????a ph????ng ???????c &aacute;p d???ng. B???ng c&aacute;ch s??? d???ng ???ng d???ng n&agrave;y, b???n tuy&ecirc;n b??? v&agrave; ?????m b???o r???ng b???n kh&ocirc;ng ???, d?????i s??? ki???m so&aacute;t c???a ho???c m???t c&ocirc;ng d&acirc;n ho???c c?? d&acirc;n c???a b???t k??? qu???c gia n&agrave;o nh?? v???y ho???c trong b???t k??? danh s&aacute;ch n&agrave;o nh?? v???y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ph???n m???m n&agrave;y l&agrave; s???n ph???m c&oacute; b???n quy???n c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh, ho???c c&aacute;c Chi nh&aacute;nh Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh, ho???c c&aacute;c b&ecirc;n th??? ba kh&aacute;c nh?? ??&atilde; ???????c x&aacute;c ?????nh. Vi???c b???n s??? d???ng Ph???n m???m ??&oacute; ch???u s??? ??i???u ch???nh c???a c&aacute;c ??i???u kho???n c???a th???a thu???n c???p ph&eacute;p ng?????i d&ugrave;ng cu???i, n???u c&oacute;, ??i k&egrave;m ho???c ??i k&egrave;m v???i Ph???n m???m (&ldquo;Th???a thu???n c???p ph&eacute;p&rdquo;). B???n kh&ocirc;ng ???????c c&agrave;i ?????t ho???c s??? d???ng b???t k??? Ph???n m???m n&agrave;o ??i k&egrave;m ho???c bao g???m Th???a thu???n c???p ph&eacute;p tr??? khi b???n ?????ng &yacute; tr?????c v???i c&aacute;c ??i???u kho???n c???a Th???a thu???n c???p ph&eacute;p. ?????i v???i b???t k??? Ph???n m???m n&agrave;o ???????c cung c???p ????? t???i xu???ng tr&ecirc;n ???ng d???ng n&agrave;y kh&ocirc;ng k&egrave;m theo Th???a thu???n c???p ph&eacute;p, theo ??&acirc;y, ch&uacute;ng t&ocirc;i c???p cho b???n, ng?????i d&ugrave;ng, gi???y ph&eacute;p c&oacute; gi???i h???n, c&aacute; nh&acirc;n, kh&ocirc;ng th??? chuy???n nh?????ng ????? s??? d???ng Ph???n m???m ????? xem v&agrave; s??? d???ng ???ng d???ng n&agrave;y theo c&aacute;c ??i???u kho???n n&agrave;y v&agrave; ??i???u ki???n v&agrave; kh&ocirc;ng v&igrave; m???c ??&iacute;ch n&agrave;o kh&aacute;c.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Xin l??u &yacute; r???ng t???t c??? Ph???n m???m, bao g???m nh??ng kh&ocirc;ng gi???i h???n, t???t c??? HTML, XML, m&atilde; Java v&agrave; c&aacute;c ??i???u khi???n Active X c&oacute; tr&ecirc;n ???ng d???ng n&agrave;y, thu???c s??? h???u c???a HoChiMinh City Tourism, c&aacute;c chi nh&aacute;nh v&agrave; / ho???c b&ecirc;n th??? ba v&agrave; ???????c b???o v??? b???i lu???t b???n quy???n v&agrave; hi???p ?????c qu???c t??? ??i???u kho???n. M???i vi???c sao ch&eacute;p ho???c ph&acirc;n ph???i l???i Ph???n m???m ?????u b??? nghi&ecirc;m c???m v&agrave; c&oacute; th??? b??? ph???t n???ng v??? d&acirc;n s??? v&agrave; h&igrave;nh s???. Ng?????i vi ph???m s??? b??? truy t??? ?????n m???c t???i ??a c&oacute; th???.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">KH&Ocirc;NG GI???I H???N VI???C T???O RA, SAO CH&Eacute;P HO???C GI???I THI???U PH???N M???M CHO B???T K??? M&Aacute;Y CH??? HO???C V??? TR&Iacute; N&Agrave;O KH&Aacute;C ????? GI???I THI???U HO???C PH&Acirc;N PH???I TH&Ecirc;M ???????C C???M R&Otilde; R&Agrave;NG. PH???N M???M ???????C B???O H&Agrave;NH, N???U C&Oacute;, CH??? THEO ??I???U KHO???N C???A TH???A THU???N GI???Y PH&Eacute;P.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">??I???U KHO???N S??? D???NG TR&Ecirc;N THI???T B??? DI ?????NG</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&aacute;c ph???n c???a ph???n m???m di ?????ng c???a HoChiMinh City Tourism c&oacute; th??? s??? d???ng t&agrave;i li???u c&oacute; b???n quy???n, vi???c s??? d???ng n&agrave;y ???????c HoChiMinh City Tourism th???a nh???n. Ngo&agrave;i ra, c&oacute; c&aacute;c ??i???u kho???n c??? th??? &aacute;p d???ng cho vi???c s??? d???ng m???t s??? ???ng d???ng di ?????ng c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TH&Ocirc;NG B&Aacute;O V??? B???N QUY???N V&Agrave; TH????NG HI???U</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">T???t c??? n???i dung c???a ???ng d???ng n&agrave;y l&agrave;: &copy; 2015 Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh. ??&atilde; ????ng k&yacute; B???n quy???n. Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh kh&ocirc;ng ch???u tr&aacute;ch nhi???m v??? n???i dung tr&ecirc;n c&aacute;c ???ng d???ng do c&aacute;c b&ecirc;n kh&ocirc;ng ph???i Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh ??i???u h&agrave;nh. Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh, bi???u t?????ng v&agrave; t???t c??? c&aacute;c t&ecirc;n s???n ph???m ho???c d???ch v??? kh&aacute;c ho???c kh???u hi???u hi???n th??? tr&ecirc;n ???ng d???ng n&agrave;y l&agrave; th????ng hi???u ??&atilde; ????ng k&yacute; v&agrave; / ho???c th????ng hi???u th&ocirc;ng th?????ng c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh v&agrave; / ho???c c&aacute;c nh&agrave; cung c???p ho???c ng?????i c???p ph&eacute;p c???a n&oacute;, v&agrave; kh&ocirc;ng ???????c sao ch&eacute;p, b???t ch?????c ho???c s??? d???ng, trong to&agrave;n b??? ho???c m???t ph???n, m&agrave; kh&ocirc;ng c&oacute; s??? cho ph&eacute;p tr?????c b???ng v??n b???n c???a HoChiMinh City Tourism ho???c ch??? s??? h???u nh&atilde;n hi???u hi???n h&agrave;nh. Ngo&agrave;i ra, giao di???n c???a ???ng d???ng n&agrave;y, bao g???m t???t c??? c&aacute;c ti&ecirc;u ????? trang, ????? h???a t&ugrave;y ch???nh, bi???u t?????ng n&uacute;t v&agrave; ch??? vi???t, l&agrave; nh&atilde;n hi???u d???ch v???, nh&atilde;n hi???u v&agrave; / ho???c trang ph???c th????ng m???i c???a Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh v&agrave; kh&ocirc;ng ???????c sao ch&eacute;p, b???t ch?????c ho???c s??? d???ng, trong to&agrave;n b??? ho???c m???t ph???n m&agrave; kh&ocirc;ng ???????c s??? cho ph&eacute;p tr?????c b???ng v??n b???n c???a HoChiMinh City Tourism. T???t c??? c&aacute;c nh&atilde;n hi???u kh&aacute;c, nh&atilde;n hi???u ??&atilde; ????ng k&yacute;, t&ecirc;n s???n ph???m v&agrave; t&ecirc;n c&ocirc;ng ty ho???c bi???u t?????ng ???????c ????? c???p trong ???ng d???ng n&agrave;y l&agrave; t&agrave;i s???n c???a ch??? s??? h???u t????ng ???ng. Tham chi???u ?????n b???t k??? s???n ph???m, d???ch v???, quy tr&igrave;nh ho???c th&ocirc;ng tin n&agrave;o kh&aacute;c, theo t&ecirc;n th????ng m???i, nh&atilde;n hi???u, nh&agrave; s???n xu???t, nh&agrave; cung c???p ho???c c&aacute;ch kh&aacute;c kh&ocirc;ng c???u th&agrave;nh ho???c ng??? &yacute; x&aacute;c nh???n, t&agrave;i tr??? ho???c khuy???n ngh??? c???a HoChiMinh City Tourism.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Th&ocirc;ng b&aacute;o v&agrave; Ch&iacute;nh s&aacute;ch g??? xu???ng ?????i v???i n???i dung b???t h???p ph&aacute;p.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HoChiMinh City Tourism ho???t ?????ng tr&ecirc;n c?? s??? &ldquo;th&ocirc;ng b&aacute;o v&agrave; g??? b???&rdquo;. N???u b???n c&oacute; b???t k??? khi???u n???i ho???c ph???n ?????i n&agrave;o ?????i v???i t&agrave;i li???u ho???c n???i dung, ho???c n???u b???n tin r???ng t&agrave;i li???u ho???c n???i dung ???????c ????ng tr&ecirc;n ???ng d???ng n&agrave;y vi ph???m b???n quy???n m&agrave; b???n n???m gi???, vui l&ograve;ng li&ecirc;n h??? v???i ch&uacute;ng t&ocirc;i ngay l???p t???c b???ng c&aacute;ch th???c hi???n theo th&ocirc;ng b&aacute;o v&agrave; quy tr&igrave;nh g??? xu???ng c???a ch&uacute;ng t&ocirc;i. Sau khi quy tr&igrave;nh n&agrave;y ???????c tu&acirc;n th???, Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh s??? n??? l???c h???t s???c h???p l&yacute; ????? lo???i b??? n???i dung b???t h???p ph&aacute;p.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&aacute;c s???a ?????i</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c&oacute; th??? thay ?????i, th&ecirc;m ho???c x&oacute;a c&aacute;c ??i???u kho???n v&agrave; ??i???u ki???n c???a Th???a thu???n n&agrave;y ho???c b???t k??? ph???n n&agrave;o c???a Th???a thu???n n&agrave;y v&agrave;o b???t k??? th???i ??i???m n&agrave;o theo quy???t ?????nh ri&ecirc;ng c???a m&igrave;nh khi th???y c???n thi???t v&agrave; h???p l&yacute; cho c&aacute;c m???c ??&iacute;ch ph&aacute;p l&yacute;, quy ?????nh chung v&agrave; k??? thu???t, ho???c do nh???ng thay ?????i trong d???ch v??? ???????c cung c???p ho???c b???n ch???t ho???c b??? c???c c???a ???ng d???ng n&agrave;y. Sau ??&oacute;, b???n ho&agrave;n to&agrave;n ?????ng &yacute; b??? r&agrave;ng bu???c b???i b???t k??? ??i???u kho???n v&agrave; ??i???u ki???n s???a ?????i n&agrave;o nh?? v???y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c&oacute; th??? thay ?????i, t???m ng???ng ho???c ng???ng b???t k??? kh&iacute;a c???nh n&agrave;o c???a d???ch v??? Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh v&agrave;o b???t k??? l&uacute;c n&agrave;o, k??? c??? t&iacute;nh kh??? d???ng c???a b???t k??? t&iacute;nh n??ng, c?? s??? d??? li???u ho???c n???i dung n&agrave;o. Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh c??ng c&oacute; th??? &aacute;p ?????t c&aacute;c gi???i h???n ?????i v???i m???t s??? t&iacute;nh n??ng v&agrave; d???ch v??? ho???c h???n ch??? quy???n truy c???p c???a b???n v&agrave;o t???t c??? ho???c c&aacute;c ph???n c???a ???ng d???ng n&agrave;y ho???c b???t k??? ???ng d???ng Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh n&agrave;o kh&aacute;c m&agrave; kh&ocirc;ng c???n th&ocirc;ng b&aacute;o ho???c ch???u tr&aacute;ch nhi???m v&igrave; l&yacute; do k??? thu???t ho???c b???o m???t, ????? ng??n ch???n vi???c truy c???p tr&aacute;i ph&eacute;p, m???t m&aacute;t, ho???c ph&aacute; h???y d??? li???u ho???c theo quy???t ?????nh ri&ecirc;ng c???a ch&uacute;ng t&ocirc;i r???ng b???n ??ang vi ph???m b???t k??? ??i???u kho???n n&agrave;o c???a Th???a thu???n n&agrave;y ho???c b???t k??? lu???t ho???c quy ?????nh n&agrave;o v&agrave; n??i quy???t ?????nh ng???ng cung c???p d???ch v???.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">VI???C B???N TI???P T???C S??? D???NG CH&Uacute;NG T&Ocirc;I B&Acirc;Y GI???, HO???C SAU KHI ????NG B???T K??? TH&Ocirc;NG B&Aacute;O N&Agrave;O V??? B???T K??? THAY ?????I N&Agrave;O S??? CH??? ?????NH B???N CH???P NH???N C&Aacute;C S???A ?????I N&Oacute;.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">T???ng quan</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">???ng d???ng n&agrave;y ???????c ??i???u h&agrave;nh b???i m???t ph&aacute;p nh&acirc;n Singapore v&agrave; Th???a thu???n n&agrave;y ch???u s??? ??i???u ch???nh c???a lu???t ph&aacute;p Singapore. Theo ??&acirc;y, b???n ?????ng &yacute; v???i quy???n t&agrave;i ph&aacute;n v&agrave; ?????a ??i???m duy nh???t c???a c&aacute;c t&ograve;a &aacute;n ??? Singapore v&agrave; quy ?????nh v??? t&iacute;nh c&ocirc;ng b???ng v&agrave; thu???n ti???n c???a th??? t???c t??? t???ng t???i c&aacute;c t&ograve;a &aacute;n ??&oacute; ?????i v???i t???t c??? c&aacute;c tranh ch???p ph&aacute;t sinh t??? ho???c li&ecirc;n quan ?????n vi???c s??? d???ng ???ng d???ng n&agrave;y. B???n ?????ng &yacute; r???ng t???t c??? c&aacute;c khi???u n???i m&agrave; b???n c&oacute; th??? c&oacute; ?????i v???i Du l???ch Th&agrave;nh ph??? H??? Ch&iacute; Minh ph&aacute;t sinh t??? ho???c li&ecirc;n quan ?????n ???ng d???ng n&agrave;y ph???i ???????c x&eacute;t x??? v&agrave; gi???i quy???t t???i m???t t&ograve;a &aacute;n c&oacute; th???m quy???n v??? v???n ????? c&oacute; th???m quy???n t???i Singapore. Vi???c s??? d???ng ???ng d???ng n&agrave;y l&agrave; tr&aacute;i ph&eacute;p ??? b???t k??? khu v???c t&agrave;i ph&aacute;n n&agrave;o kh&ocirc;ng c&oacute; hi???u l???c ?????i v???i t???t c??? c&aacute;c quy ?????nh c???a c&aacute;c ??i???u kho???n v&agrave; ??i???u ki???n n&agrave;y, bao g???m nh??ng kh&ocirc;ng gi???i h???n ??? kho???n n&agrave;y. Nh???ng ??i???u ??&atilde; n&oacute;i ??? tr&ecirc;n s??? kh&ocirc;ng &aacute;p d???ng trong ph???m vi lu???t hi???n h&agrave;nh ??? qu???c gia b???n c?? tr&uacute; y&ecirc;u c???u &aacute;p d???ng lu???t v&agrave; / ho???c quy???n t&agrave;i ph&aacute;n kh&aacute;c v&agrave; ??i???u n&agrave;y kh&ocirc;ng th??? b??? lo???i tr??? b???i h???p ?????ng.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">B???n ?????ng &yacute; r???ng kh&ocirc;ng c&oacute; m???i quan h??? li&ecirc;n doanh, ?????i l&yacute;, ?????i t&aacute;c ho???c vi???c l&agrave;m n&agrave;o t???n t???i gi???a b???n v&agrave; HoChiMinh City Tourism v&agrave; / ho???c c&aacute;c chi nh&aacute;nh c???a n&oacute; do Th???a thu???n n&agrave;y ho???c vi???c s??? d???ng ???ng d???ng n&agrave;y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Vi???c th???c hi???n Th???a thu???n n&agrave;y c???a ch&uacute;ng t&ocirc;i tu&acirc;n theo lu???t hi???n h&agrave;nh v&agrave; quy tr&igrave;nh ph&aacute;p l&yacute; v&agrave; kh&ocirc;ng c&oacute; ??i???u g&igrave; trong Th???a thu???n n&agrave;y gi???i h???n quy???n c???a ch&uacute;ng t&ocirc;i trong vi???c tu&acirc;n th??? c&aacute;c c?? quan th???c thi ph&aacute;p lu???t ho???c c&aacute;c y&ecirc;u c???u ho???c y&ecirc;u c???u c???a ch&iacute;nh ph??? ho???c ph&aacute;p lu???t kh&aacute;c li&ecirc;n quan ?????n vi???c b???n s??? d???ng ???ng d???ng n&agrave;y ho???c th&ocirc;ng tin ???????c cung c???p ho???c thu th???p b???i ch&uacute;ng t&ocirc;i ?????i v???i vi???c s??? d???ng nh?? v???y. Trong ph???m vi lu???t hi???n h&agrave;nh cho ph&eacute;p, b???n ?????ng &yacute; r???ng b???n s??? ????a ra b???t k??? khi???u n???i ho???c nguy&ecirc;n nh&acirc;n d???n ?????n h&agrave;nh ?????ng n&agrave;o ph&aacute;t sinh t??? ho???c li&ecirc;n quan ?????n vi???c b???n truy c???p ho???c s??? d???ng ???ng d???ng n&agrave;y trong v&ograve;ng hai (2) n??m k??? t??? ng&agrave;y ph&aacute;t sinh ho???c t&iacute;ch l??y khi???u n???i ho???c h&agrave;nh ?????ng ??&oacute; ho???c khi???u n???i ho???c nguy&ecirc;n nh&acirc;n h&agrave;nh ?????ng nh?? v???y s??? ???????c t??? b??? m???t c&aacute;ch kh&ocirc;ng th??? h???y ngang.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">N???u b???t k??? ph???n n&agrave;o c???a Th???a thu???n n&agrave;y ???????c x&aacute;c ?????nh l&agrave; kh&ocirc;ng h???p l??? ho???c kh&ocirc;ng th??? thi h&agrave;nh theo lu???t hi???n h&agrave;nh bao g???m nh??ng kh&ocirc;ng gi???i h???n ??? nh???ng tuy&ecirc;n b??? t??? ch???i tr&aacute;ch nhi???m b???o h&agrave;nh v&agrave; gi???i h???n tr&aacute;ch nhi???m ph&aacute;p l&yacute; n&ecirc;u tr&ecirc;n, th&igrave; ??i???u kho???n kh&ocirc;ng h???p l??? ho???c kh&ocirc;ng th??? thi h&agrave;nh s??? ???????c thay th??? b???ng m???t ??i???u kho???n h???p l???, c&oacute; th??? th???c thi ph&ugrave; h???p nh???t v???i &yacute; ?????nh c???a ??i???u kho???n ban ?????u v&agrave; c&aacute;c ??i???u kho???n c&ograve;n l???i trong Th???a thu???n n&agrave;y s??? ti???p t???c c&oacute; hi???u l???c.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Th???a thu???n n&agrave;y (v&agrave; b???t k??? ??i???u kho???n v&agrave; ??i???u ki???n n&agrave;o kh&aacute;c ???????c ????? c???p ??? ??&acirc;y) c???u th&agrave;nh to&agrave;n b??? th???a thu???n gi???a b???n v&agrave; HoChiMinh City Tourism ?????i v???i ???ng d???ng n&agrave;y v&agrave; n&oacute; thay th??? cho t???t c??? c&aacute;c th&ocirc;ng tin li&ecirc;n l???c v&agrave; ????? xu???t tr?????c ??&acirc;y ho???c ??????ng th???i, d&ugrave; l&agrave; ??i???n t???, b???ng mi???ng hay b???ng v??n b???n, gi???a b???n v&agrave; HoChiMinh Du l???ch Th&agrave;nh ph??? ?????i v???i ???ng d???ng n&agrave;y. Phi&ecirc;n b???n in c???a Th???a thu???n n&agrave;y v&agrave; c???a b???t k??? th&ocirc;ng b&aacute;o n&agrave;o ???????c ????a ra d?????i d???ng ??i???n t??? s??? ???????c ch???p nh???n trong c&aacute;c th??? t???c t??? t???ng t?? ph&aacute;p ho???c h&agrave;nh ch&iacute;nh d???a tr&ecirc;n ho???c li&ecirc;n quan ?????n Th???a thu???n n&agrave;y ??? c&ugrave;ng m???t m???c ????? v&agrave; tu&acirc;n theo c&aacute;c ??i???u ki???n t????ng t??? nh?? c&aacute;c t&agrave;i li???u v&agrave; h??? s?? kinh doanh kh&aacute;c ???????c t???o v&agrave; duy tr&igrave; ban ?????u trong m???u in.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&aacute;c ??i???u kho???n v&agrave; ??i???u ki???n n&agrave;y c&oacute; s???n b???ng ng&ocirc;n ng??? c???a ???ng d???ng n&agrave;y. C&aacute;c ??i???u kho???n v&agrave; ??i???u ki???n c??? th??? m&agrave; b???n k&yacute; k???t th???a thu???n s??? kh&ocirc;ng ???????c l??u tr??? ri&ecirc;ng b???i HoChiMinh City Tourism.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">???ng d???ng n&agrave;y kh&ocirc;ng ph???i l&uacute;c n&agrave;o c??ng c&oacute; th??? ???????c c???p nh???t ?????nh k??? ho???c th?????ng xuy&ecirc;n v&agrave; do ??&oacute;, kh&ocirc;ng b???t bu???c ph???i ????ng k&yacute; l&agrave;m s???n ph???m bi&ecirc;n t???p theo b???t k??? lu???t li&ecirc;n quan n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">T&ecirc;n h?? c???u c???a c&aacute;c c&ocirc;ng ty, s???n ph???m, con ng?????i, nh&acirc;n v???t v&agrave; / ho???c d??? li???u ???????c ????? c???p tr&ecirc;n ???ng d???ng n&agrave;y kh&ocirc;ng nh???m ?????i di???n cho b???t k??? c&aacute; nh&acirc;n, c&ocirc;ng ty, s???n ph???m ho???c s??? ki???n th???c s??? n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">B???t k??? quy???n l???i kh&ocirc;ng ???????c c&ocirc;ng nh???n ??? ??&acirc;y ?????u ???????c b???o l??u.</span></span></span></p>',
      'ABOUT_US_CONTENT_VI' => '<p>Th&agrave;nh ph??? H??? Ch&iacute; Minh l&agrave; ??&ocirc; th??? tr??? b???i l???ch s??? h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t tri???n ch??? m???i h??n 300 n??m.&nbsp;???????c bi???t ?????n nhi???u v???i t&ecirc;n g???i S&agrave;i G&ograve;n, Th&agrave;nh ph??? s&ocirc;i ?????ng n&agrave;y ???????c v&iacute; nh??&nbsp;<em><strong>&ldquo;H&ograve;n ng???c Vi???n ??&ocirc;ng&rdquo;</strong></em>&nbsp;b???i nh???ng c&ocirc;ng tr&igrave;nh ki???n tr&uacute;c di s???n quy???n r??, kh&ocirc;ng kh&iacute; n??ng ?????ng, s&ocirc;i ?????ng, n&aacute;o nhi???t v&agrave; con ng?????i th&acirc;n thi???n. ??&acirc;y l&agrave; nh???ng ?????c ??i???m gi&uacute;p Th&agrave;nh ph??? H??? Ch&iacute; Minh tr??? th&agrave;nh m???t ??i???m ?????n thu h&uacute;t v???i du kh&aacute;ch trong n?????c v&agrave; qu???c t???.</p>

<p>&nbsp;</p>

<p>S??? ??a d???ng nhi???u m&agrave;u s???c, m&ugrave;i h????ng v&agrave; &acirc;m thanh l&agrave; nh???ng n&eacute;t ?????c tr??ng c???a Th&agrave;nh ph??? H??? Ch&iacute; Minh, nh???ng ?????c ??i???m n&agrave;y gi&uacute;p Th&agrave;nh ph??? lu&ocirc;n ???????c x???p h???ng m???t trong nh???ng&nbsp;<strong>??i???m ?????n du l???ch ???????c y&ecirc;u th&iacute;ch nh???t t???i Ch&acirc;u &Aacute;</strong>.</p>

<p>&nbsp;</p>

<p><img alt="" src="https://www.visithcmc.vn/uploads/0000/6/2021/08/22/hcmc-tourism-at-a-glance-1.png" /></p>

<p>???m th???c&nbsp;t???i&nbsp;Th&agrave;nh ph???&nbsp;ch??a bao gi???&nbsp;l&agrave;m du kh&aacute;ch th???t v???ng. CNN ??&atilde;&nbsp;g???i&nbsp;Th&agrave;nh ph??? H??? Ch&iacute; Minh l&agrave;&nbsp;<strong>&quot;H????ng v??? Vi???t Nam&quot;</strong>, th&agrave;nh ph???&nbsp;lu&ocirc;n&nbsp;khi???n du kh&aacute;ch ng???c nhi&ecirc;n v???i n???n ???m th???c ??a d???ng - t??? thi&ecirc;n ???????ng ???m th???c ???????ng ph??? ?????n nh???ng ti???m b&aacute;nh th??m ngon ?????y c???m h???ng, ???m th???c Vi???t Nam ch&iacute;nh th???ng v&agrave; c??? nh???ng qu&aacute;n ??n&nbsp;mang phong c&aacute;ch Ch&acirc;u &Aacute; hi???n ?????i.</p>

<p>V???i nhi???u trung t&acirc;m mua s???m&nbsp;n???i ti???ng, ??i???m tham quan&nbsp;h???p d???n, kh&aacute;ch s???n ?????ng c???p th??? gi???i v&agrave; c?? s??? h??? t???ng&nbsp;hi???n ?????i&nbsp;gi&uacute;p Th&agrave;nh ph??? H??? Ch&iacute; Minh&nbsp;tr???&nbsp;th&agrave;nh ??i???m ?????n ???????c y&ecirc;u th&iacute;ch c???a&nbsp;kh&aacute;ch du l???ch&nbsp;t??? t&uacute;c, c&aacute;c c???p ??&ocirc;i v&agrave; gia ??&igrave;nh.</p>

<p>Th&ecirc;m v&agrave;o&nbsp;??&oacute;, v???i nhi???u&nbsp;l??? h???i&nbsp;s???c m&agrave;u&nbsp;v&agrave; c&aacute;c s??? ki???n ?????ng c???p th??? gi???i, th&agrave;nh ph??? n&agrave;y ???????c&nbsp;<strong>World MICE Awards</strong>&nbsp;c&ocirc;ng nh???n l&agrave;&nbsp;<strong>&ldquo;??i???m ?????n MICE&nbsp;h&agrave;ng ?????u&nbsp;??? Ch&acirc;u &Aacute;&rdquo;</strong>&nbsp;(2020).</p>',
      'ABOUT_US_CONTENT_EN' => '<h2>About Ho Chi Minh City</h2>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial">Known popularly as&nbsp;<strong style="box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline"><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">Saigon</span></span></strong>, this&nbsp;<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">vibrant city</span></span>&nbsp;is&nbsp;<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">described as the&nbsp;<strong style="box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline">&ldquo;Pearl of the Far East&rdquo;</strong></span></span>&nbsp;<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">because of</span></span>&nbsp;charming heritage buildings<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">, d</span></span>ynamic, vibrant, exciting<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">&nbsp;atmosphere and friendly people</span></span>. These are just some of the great qualities that make&nbsp;<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">Ho Chi Minh City</span></span>&nbsp;a dazzling destination for travelers.&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial">A riot of colors, scents, and sounds characterize Ho Chi Minh City<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">&nbsp;which makes it&nbsp;</span></span>highly<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">-ranking</span></span>&nbsp;as<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">&nbsp;one of the</span></span>&nbsp;<strong style="box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline">Best Destination<span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">s</span></span>&nbsp;in Asia</strong><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline">.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><img alt="" src="https://www.visithcmc.vn/uploads/0000/6/2021/08/22/hcmc-tourism-at-a-glance.png" style="box-sizing:border-box; vertical-align:middle; border-style:none; padding:0px; line-height:1; outline:none; height:auto; border-radius:3rem; width:1038.91px" /></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px">&nbsp;</p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">Ho Chi Minh City&rsquo;s incredible food has never been short of admirers.&nbsp;CNN named Ho Chi Minh City as&nbsp;<strong style="box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline">&ldquo;Taste of Vietnam&rdquo;</strong>, the city never fails to amaze visitors with its extensive variety of culinary &ndash; from a paradise of street foods to the inspiring and delicious bakery,&nbsp;</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">authentic Vietnamese cuisine&nbsp;</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">and</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;also</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;modern Asian eatery.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">With</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;many dazzling shopping centers, attractions,</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;world-class</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;hotels and&nbsp;</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">excellent</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;infrastructure make it&nbsp;</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">perfect</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">&nbsp;for solo travelers</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">, couples and families.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial">&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>

<p style="padding:0px; text-align:left; text-indent:0px; -webkit-text-stroke-width:0px"><span style="font-size:15.372px"><span style="box-sizing:border-box"><span style="line-height:1.5 !important"><span style="vertical-align:baseline"><span style="color:#2a2a2a"><span style="font-feature-settings:&quot;palt&quot;"><span style="font-family:Roboto"><span style="white-space:normal"><span style="font-style:normal"><span style="font-variant-ligatures:normal"><span style="font-variant-caps:normal"><span style="font-weight:400"><span style="letter-spacing:normal"><span style="orphans:2"><span style="text-transform:none"><span style="widows:2"><span style="word-spacing:0px"><span style="text-decoration-thickness:initial"><span style="text-decoration-style:initial"><span style="text-decoration-color:initial"><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">Added with the long list of&nbsp;</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">colorful&nbsp;</span></span></span><span style="box-sizing:border-box; padding:0px"><span style="vertical-align:baseline"><span style="font-family:Roboto">festivals, celebrations and world-class events, this city&nbsp;</span></span></span><span lang="vi" style="box-sizing:border-box; padding:0px" xml:lang="vi"><span style="vertical-align:baseline"><span style="font-family:Roboto">is recognized as&nbsp;<strong style="box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline">&ldquo;The Best MICE Destination in Asia&rdquo;</strong>&nbsp;by&nbsp;<strong style="box-sizing:border-box; font-weight:bolder; padding:0px; vertical-align:baseline">World MICE Awards</strong>.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>',
      'VISA_CONTENT_EN' => '<p>Vietnam offers visa exemptions to travellers from 24&nbsp;countries, and e-Visas to travellers from 80&nbsp;countries. Travellers can also easily apply for a visa on arrival&nbsp;online or in person at a Vietnamese embassy or consulate.&nbsp;Below is all the&nbsp;information you need on visas for&nbsp;Vietnam.&nbsp;</p>

<hr />
<h4>Vietnam Visa Exemptions</h4>

<p>Vietnam offers visa exemptions ranging from 14&nbsp;to 90 days to citizens of&nbsp;24&nbsp;countries&nbsp;holding valid ordinary passports. The full list of countries with visa exemptions is below. To view visa exemptions for diplomatic and other&nbsp;passports, please visit&nbsp;<a href="https://visa.mofa.gov.vn/Homepage.aspx" rel="noreferrer noopener" target="_blank">this link.</a></p>

<p><strong>Notes on visa exemptions:</strong></p>

<p>- As of Mar. 21, 2020, Vietnam will temporarily suspend visa exemptions&nbsp;for citizens from&nbsp;Belarus, Russia, and Japan.</p>

<p>- Starting Mar. 8, 2020&nbsp;Vietnam has temporarily suspended visa exemptions for citizens of the European Union, the United Kingdom, and as well as other countries with more than 500 cases or grow more than 50 cases a day.&nbsp;</p>

<p>- As of Feb. 29, 2020 visa exemptions for South Koreans will be temporarily suspended until further notice, and as&nbsp;of Mar. 2, 2020 visa exemptions for Italians will also be&nbsp;temporarily suspended.</p>

<p>- The exemptions listed above for&nbsp;Sweden, Norway, Denmark, Belarus, Finland, Japan, South Korea, and Russia are valid until Dec.&nbsp;31, 2022.</p>

<p>- The exemptions listed above for the United Kingdom, France, Germany, Spain, and Italy are valid until June 30, 2021.</p>

<p>- Spouses or children of Vietnamese citizens are allowed to stay in the country without a visa for&nbsp;six months and must show&nbsp;papers proving their eligibility. For full requirements,&nbsp;please visit&nbsp;<a href="http://mienthithucvk.mofa.gov.vn/en" rel="noreferrer noopener" target="_blank">this link.</a></p>

<p>&nbsp;</p>

<hr />
<h4>Vietnam Visa on Arrival</h4>

<p>If you are&nbsp;planning a&nbsp;multiple-entry&nbsp;visit&nbsp;or a stay&nbsp;of&nbsp;more than 30 days, you will want to&nbsp;apply for a visa on arrival. To do this you&#39;ll need:</p>

<p>1. A 4x6 passport photo with a white background and no glasses</p>

<p>2. A filled-out&nbsp;<a href="https://visa.mofa.gov.vn/_layouts/registration/ApplicationForm.aspx" rel="noreferrer noopener" target="_blank">visa application form</a></p>

<p>3. A passport or substitute ID valid for six months from the date you plan to enter Vietnam</p>

<p>4. Payment (25 USD to 50 USD) for&nbsp;visa fees, and</p>

<p>5. A Letter of Approval from a Vietnamese embassy or consulate (if you are picking up your visa at the airport)</p>

<p>If you are near a Vietnamese embassy or consulate, you can submit your photo, application form,&nbsp;passport, and visa fee&nbsp;in person.&nbsp;<a href="https://visa.mofa.gov.vn/Homepage.aspx" rel="noreferrer noopener" target="_blank">This website</a>&nbsp;will&nbsp;guide you through the process.&nbsp;</p>

<p>If you are unable to reach a Vietnamese embassy, or are short on time,&nbsp;there are trusted services online who can provide you a valid Letter of Approval for a fee.&nbsp;Bring this letter and together with a visa application form and your other documents to the Visa on Arrival counter at the airport when you land.&nbsp;<br />
&nbsp;</p>

<hr />
<h4>Vietnam Electronic Visa (e-Visa)&nbsp;</h4>

<p>Vietnam&#39;s e-Visa is now available to nationals of 80&nbsp;countries:&nbsp;</p>

<p><em>Andorra, Argentina, Armenia, Australia, Austria, Azerbaijan, Belarus, Belgium, Bosnia and Herzegovina, Brazil, Brunei, Bulgaria, Canada, Colombia, Croatia, Cuba, Cyprus, Czech Republic, Chile, China (including Hong Kong and Macau passports), Denmark, Estonia, Fiji, Finland, France, Georgia, Germany, Greece, Hungary, Iceland, India, Ireland, Italy, Japan, Kazakhstan, Latvia, Liechtenstein, Lithuania, Luxembourg, Macedonia, Malta, Marshall Islands, Mexico, Micronesia, Moldova, Monaco, Montenegro, Mongolia, Myanmar, Nauru, Netherlands, New Zealand, Norway, Palau, Panama, Papua New Guinea, Peru, Poland, Portugal, Philippines, Qatar, Romania, Russia, Salomon Islands, San Marino, Serbia, Slovakia, Slovenia, South Korea, Spain, Sweden, Switzerland, Timor Leste, United Arab Emirates, United Kingdom, United States of America, Uruguay, Vanuatu, Venezuela, and Western Samoa.</em></p>

<p><a href="https://vietnam.travel/plan-your-trip/official-vietnam-evisa-application">Click here for a full guide on how to apply for Vietnam&#39;s e-Visa.</a></p>

<p><br />
The e-Visa takes&nbsp;three working days&nbsp;to process, costs&nbsp;25 USD, and is&nbsp;a&nbsp;single-entry visa,&nbsp;valid for&nbsp;30 days.&nbsp;You can enter Vietnam on an e-Visa at any of the country&#39;s&nbsp;eight international airports,&nbsp;including Hanoi, Ho Chi Minh City and Danang,&nbsp;as well as&nbsp;14 land crossings&nbsp;and seven seaports.&nbsp;<br />
&nbsp;</p>

<hr />
<h3>How to Apply for Vietnam&#39;s e-Visa:</h3>

<p><strong>Step 1:</strong>&nbsp;Prepare the required materials:&nbsp;</p>

<p>- One&nbsp;4x6 passport photo in .jpg format with a white background, without glasses</p>

<p>- &nbsp;One photo in .jpg format of your passport data page</p>

<p>- &nbsp;Passport valid for at least six months</p>

<p>- Your temporary address in Vietnam and&nbsp;points of entry and exit&nbsp;</p>

<p>- Debit or credit card for payment&nbsp;<br />
<strong>Step 2:</strong>&nbsp;Click&nbsp;<a href="https://evisa.xuatnhapcanh.gov.vn/en_US/web/guest/khai-thi-thuc-dien-tu/cap-thi-thuc-dien-tu" rel="noreferrer noopener" target="_blank">this link</a>&nbsp;or access&nbsp;<a href="https://www.immigration.gov.vn/" rel="noreferrer noopener" target="_blank">www.immigration.gov.vn</a>&nbsp;and go to &#39;E-visa Issuance&#39; then click on the link for &#39;Outside Vietnam foreigners&#39;. &nbsp;<br />
<strong>Step 3:&nbsp;</strong>Upload your .jpg images (passport data page and passport photo) and fill out the required fields on the&nbsp;form completely. Submit your form.&nbsp;<br />
<strong>Step 4:&nbsp;</strong>Pay the e-Visa fee of 25 USD.&nbsp;Copy down the document&nbsp;code provided. &nbsp;<br />
<strong>Step 5:&nbsp;</strong>Within three working days you should receive news of your e-Visa application via email. If not, you can also run a search for your e-Visa at&nbsp;<a href="https://evisa.xuatnhapcanh.gov.vn/tra-cuu-thi-thuc" rel="noreferrer noopener" target="_blank">this link</a>.&nbsp;<br />
<strong>Step 6:&nbsp;</strong>Use your document code to locate your e-Visa online. Download&nbsp;and print the e-Visa in two copies for extra safety.&nbsp;</p>',
      'VISA_CONTENT_VI' => '<h4>Y&ecirc;u c???u v??? Visa khi ?????n Vi???t Nam</h4>

<p>H???u h???t ng?????i n?????c ngo&agrave;i mu???n ?????n th??m Vi???t Nam c???n ph???i xin th??? th???c nh???p c???nh tr?????c. Ngo???i l??? duy nh???t l&agrave; n???u qu???c gia c???a b???n c&oacute; th???a thu???n l&atilde;nh s??? song ph????ng v??? vi???c mi???n th??? th???c. B???n c&oacute; th??? ki???m tra tr&ecirc;n trang web c???a ch&iacute;nh ph??? ????? bi???t li???u c???a b???n c&oacute; ph???i l&agrave; m???t trong s??? &iacute;t ????ng k&yacute; ch????ng tr&igrave;nh n&agrave;y hay kh&ocirc;ng. M???t thay ?????i g???n ??&acirc;y v??? ch&iacute;nh s&aacute;ch ??&atilde; cho ph&eacute;p kh&aacute;ch du l???ch qu???c t??? ???????c mi???n th??? th???c 30 ng&agrave;y n???u h??? ?????n ?????o Ph&uacute; Qu???c b???ng ???????ng bi???n ho???c qua ph&ograve;ng ch??? trung chuy???n qu???c t??? t???i s&acirc;n bay T&acirc;n S??n Nh???t, th&agrave;nh ph??? H??? Ch&iacute; Minh. Th??? th???c khi ?????n c&oacute; s???n th&ocirc;ng qua c&aacute;c c&ocirc;ng ty du l???ch kh&aacute;c nhau v&agrave; c&aacute;c d???ch v??? th??? th???c tr???c tuy???n, v???i m???t kho???n ph&iacute;, s??? ??i???n v&agrave;o c&aacute;c th??? t???c gi???y t??? th&iacute;ch h???p cho m???t th?? ch???p thu???n th??? th???c. N&oacute; kh&ocirc;ng h???n l&agrave; &ldquo;visa khi ?????n&rdquo; nh??ng ??i???u n&agrave;y gi&uacute;p b???n d??? d&agrave;ng h??n so v???i vi???c g???i h??? chi???u ?????n c?? quan l&atilde;nh s??? ho???c ?????i s??? qu&aacute;n Vi???t Nam t???i qu???c gia c???a b???n. ??i???u n&agrave;y ch??? d&agrave;nh cho nh???ng ng?????i bay v&agrave;o trong n?????c, v&igrave; v???y n???u b???n nh???p c???nh qua ???????ng bi&ecirc;n gi???i tr&ecirc;n b???, b???n s??? ph???i ????ng k&yacute; t???i n?????c s??? t???i ho???c m???t trong c&aacute;c qu???c gia c&oacute; chung bi&ecirc;n gi???i v???i Vi???t Nam.<br />
&nbsp;</p>

<p>&nbsp;</p>

<hr />
<h4>Chi ph&iacute; th??? th???c nh?? th??? n&agrave;o?</h4>

<p>Th??? th???c du l???ch c&oacute; gi&aacute; tr??? trong 30 ho???c 90 ng&agrave;y v&agrave; c&oacute; th??? nh???p c???nh m???t l???n ho???c nhi???u l???n. Ph&iacute; ??&oacute;ng d???u thay ?????i t??? 25 ??&ocirc; la M??? cho th??? th???c m???t th&aacute;ng, ?????n 50 ??&ocirc; la M??? cho th??? th???c ba th&aacute;ng, nhi???u l???n. ?????i v???i kho???n ph&iacute; &ldquo;d???ch v??? nhanh&rdquo; b??? sung, b???n c&oacute; th??? b??? qua th???i gian x??? l&yacute; th&ocirc;ng th?????ng t??? ba ?????n b???n ng&agrave;y l&agrave;m vi???c. Ki???m tra v???i ?????i s??? qu&aacute;n ho???c l&atilde;nh s??? qu&aacute;n Vi???t Nam t???i ?????a ph????ng c???a b???n, ho???c v???i ?????i l&yacute; du l???ch ho???c d???ch v??? th??? th???c tr???c tuy???n.<br />
&nbsp;</p>

<p>&nbsp;</p>

<hr />
<h4><br />
T&ocirc;i s??? ???????c h?????ng nh???ng ti???n &iacute;ch m??? r???ng g&igrave;?</h4>

<p>Gia h???n th??? th???c c&oacute; s???n v???i l??? ph&iacute; 10 ??&ocirc; la M??? n???u b???n ?????n tr???c ti???p v??n ph&ograve;ng nh???p c??. Tuy nhi&ecirc;n, ??i???u n&agrave;y ??&ograve;i h???i m???t s??? k??? n??ng ng&ocirc;n ng??? ?????a ph????ng v&agrave; m???t ch&uacute;t ki&ecirc;n nh???n. Do ??&oacute;, h???u h???t kh&aacute;ch du l???ch d???a v&agrave;o c&aacute;c ?????i l&yacute; du l???ch ????? gi???i quy???t c&aacute;c ph???n m??? r???ng c???a h???. ??i???u n&agrave;y ??i k&egrave;m v???i m???t kho???n ph&iacute; nh??ng ch???c ch???n ti???t ki???m th???i gian v&agrave; r???c r???i. H???u h???t c&aacute;c ?????i l&yacute; du l???ch ?????u cung c???p d???ch v??? n&agrave;y v???i m???t kho???n ph&iacute; v&agrave; c&oacute; th??? m???t ?????n 10 ng&agrave;y ????? x??? l&yacute;. Th???i gian gia h???n th??? th???c c???a b???n ph??? thu???c v&agrave;o th??? th???c ban ?????u c???a b???n. B???n ch??? c&oacute; th??? gia h???n s??? ti???n b???ng v???i th??? th???c ban ?????u c???a m&igrave;nh - v&iacute; d???: th??? th???c m???t th&aacute;ng ch??? c&oacute; th??? ???????c gia h???n th&ecirc;m m???t th&aacute;ng.</p>',
      'SAFETY_CONTENT_VI' => '<p><strong>C&aacute;c bi???n ph&aacute;p ph&ograve;ng ng???a v??? s???c kho??? v&agrave; an to&agrave;n cho kh&aacute;ch du l???ch</strong></p>

<section>
<p>Du kh&aacute;ch ??? Vi???t Nam ???????c khuy???n kh&iacute;ch th???c hi???n c&aacute;c bi???n ph&aacute;p ph&ograve;ng ng???a h???p l&yacute; ?????i v???i COVID-19 trong c&aacute;c chuy???n ??i.&nbsp;T??? ch???c Y t??? Th??? gi???i ????a ra nh???ng th???c h&agrave;nh c?? b???n n&agrave;y ????? gi??? an to&agrave;n cho b???n th&acirc;n v&agrave; nh???ng ng?????i th&acirc;n c???a b???n:</p>

<p>1. Tr&aacute;nh ??i du l???ch n???u b???n b??? s???t v&agrave; ho. N???u b???n b??? s???t, ho v&agrave; kh&oacute; th???, h&atilde;y th&ocirc;ng b&aacute;o cho c&aacute;c d???ch v??? ch??m s&oacute;c s???c kho??? v&agrave; chia s??? v???i h??? v??? l???ch s??? du l???ch g???n ??&acirc;y c???a b???n.</p>

<p>2. Duy tr&igrave; gi&atilde;n c&aacute;ch x&atilde; h???i. Tr&aacute;nh xa nh???ng ng?????i kh&aacute;c t??? m???t m&eacute;t tr??? l&ecirc;n ?????c bi???t l&agrave; nh???ng ng?????i ??ang h???t h??i, ho???c ho, ho???c b??? s???t.</p>

<p>3. Th?????ng xuy&ecirc;n r???a tay b???ng x&agrave; ph&ograve;ng v&agrave; v&ograve;i n?????c. b???n c??ng c&oacute; th??? s??? d???ng ch???t kh??? tr&ugrave;ng tay ch???a c???n ????? x???t tay th?????ng xuy&ecirc;n n???u mu???n.</p>

<p>4.&nbsp; Che mi???ng v&agrave; m??i b???ng kh??n gi???y khi ho ho???c h???t h??i. V???t b??? kh??n gi???y b???n ngay l???p t???c v&agrave; r???a tay sau khi ho ho???c h???t h??i.</p>

<p>5.&nbsp; Tr&aacute;nh ti???p x&uacute;c v???i ?????ng v???t s???ng. R???a tay b???ng x&agrave; ph&ograve;ng v&agrave; n?????c n???u b???n ch???m v&agrave;o ?????ng v???t s???ng ho???c s???n ph???m t??? ?????ng v???t ??? ch???.</p>

<p>6. Ch??? ??n th???c ??n ??&atilde; ???????c n???u ch&iacute;n k???. ?????m b???o r???ng c&aacute;c b???a ??n c???a b???n ?????c bi???t l&agrave; protein ?????ng v???t v&agrave; c&aacute;c s???n ph???m t??? s???a ???????c n???u ch&iacute;n k??? v&agrave; chu???n b??? trong m???t m&ocirc;i tr?????ng h???p v??? sinh.</p>

<p>7. B??? kh???u trang s??? d???ng m???t l???n. N???u b???n ch???n ??eo kh???u trang s??? d???ng m???t l???n, ?????m b???o kh???u trang che m??i v&agrave; mi???ng c???a b???n, tr&aacute;nh ch???m v&agrave;o kh???u trang v&agrave; r???a tay sau khi th&aacute;o kh???u trang.<br />
&nbsp;</p>

<p><strong>C&aacute;c trang web v&agrave; ???ng d???ng ch&iacute;nh th???c v??? COVID-19 c???a ch&iacute;nh ph??? Vi???t Nam:&nbsp;</strong></p>

<p>Kh&aacute;ch du l???ch ??ang t&igrave;m ki???m s??? li???u th???ng k&ecirc; c???p nh???t v??? COVID-19 c&oacute; th??? s??? d???ng ???ng d???ng&nbsp;<a href="https://coronavirus.app/" rel="noopener" target="_blank">Coronavirus app</a>.&nbsp;</p>

<p>C???p nh???t t??? ch&iacute;nh ph??? Vi???t Nam:&nbsp;<a href="https://ncov.moh.gov.vn/">https://ncov.moh.gov.vn</a></p>

<p>C???p nh???t tin t???c t??? Du l???ch Vi???t Nam:&nbsp;<a href="https://vietnam.travel/media-industry">https://vietnam.travel/media-industry</a></p>
</section>

<section>
<figure><img alt="" src="https://visithcmc.vn/uploads/0000/6/2021/09/13/screen-shot-2021-09-13-at-150705.png" style="width: 2422px; height: 1476px;" /></figure>

<p>&ldquo;B???t k??? du kh&aacute;ch n&agrave;o g???p ph???i c&aacute;c tri???u ch???ng c???a vi r&uacute;t &ndash; nh?? s???t, ho v&agrave; kh&oacute; th??? n&ecirc;n g???i ngay cho ???????ng d&acirc;y n&oacute;ng c???a B??? Y t??? Vi???t Nam: 1900 3228&rdquo;</p>
</section>',
      'SAFETY_CONTENT_EN' => '<p><strong>Health and safety precautions for travellers</strong></p>

<section>
<p>Visitors in Vietnam are encouraged to take sensible precautions against COVID-19 during their trips.</p>

<p>The&nbsp;<a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" rel="noreferrer noopener" target="_blank">World Health Organization</a>&nbsp;outlines these basic practices to keep yourself and your loved ones safe:</p>

<p>1.&nbsp;Avoid travelling if you have a fever and cough.&nbsp;If you have fever, cough, and difficulty breathing, alert health care services and share with them your recent travel history.</p>

<p>2.&nbsp;Maintain social distancing.&nbsp;Stay a metre or more away from others, especially those who are sneezing or coughing, or have fever.&nbsp;</p>

<p>3.&nbsp;Wash your hands regularly with soap and running water.&nbsp;You can also use an alcohol-based hand-sanitizer to spray your hands as often as you like.</p>

<p>4.&nbsp;Cover your mouth and nose with tissue when you cough or sneeze.&nbsp;Dispose of dirty tissues immediately and wash your hands after coughing or sneezing.&nbsp;</p>

<p>5.&nbsp;Avoid contact with live animals.&nbsp;Wash your hands with soap and water if you touch live animals or animal products in markets.</p>

<p>6.&nbsp;Eat only well-cooked food.&nbsp;Make sure your meals especially animal proteins and dairy products are thoroughly cooked and prepared in a sanitary environment.&nbsp;</p>

<p>7.&nbsp;Discard single-use masks.&nbsp;If you choose to wear a single-use mask, ensure it covers your nose and mouth, avoid touching the mask, and wash your hands after removing it.</p>

<p><strong>Online trackers and official government sites</strong></p>

<p>Travellers looking for updated statistics on COVID-19 can use the&nbsp;<a href="https://coronavirus.app/" rel="noreferrer noopener" target="_blank">Coronavirus app</a>.&nbsp;</p>

<p>Updates from the Vietnamese government:&nbsp;<a href="https://ncov.moh.gov.vn/" rel="noreferrer noopener" target="_blank">https://ncov.moh.gov.vn</a></p>

<p>News updates from Vietnam Tourism:&nbsp;<a href="https://vietnam.travel/media-industry">https://vietnam.travel/media-industry</a></p>
</section>

<section><img alt="" src="https://visithcmc.vn/uploads/0000/6/2021/09/13/screen-shot-2021-09-13-at-150705.png" />
<p>&ldquo;Any travellers experiencing symptoms of the virus &mdash; fever, cough and difficulty breathing &mdash; should immediately call Vietnam&rsquo;s health hotline: 19003228&rdquo;</p>
</section>',
      'EMERGENCY_CONTENT_EN' => '<p><strong>INTERNATIONAL SOS (24/24h)</strong><br />
Add: 167A Nam Ky Khoi Nghia, Dist 3<br />
Tel: +84 8 38298424<br />
Map view: http://map.google.com<br />
Regional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>

<p><strong>COLOMBIA ASIA SAIGON (24/24h)</strong><br />
Add: 167A Nam Ky Khoi Nghia, Dist 3<br />
Tel: +84 8 38298424<br />
Map view: http://map.google.com<br />
Regional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>',
      'EMERGENCY_CONTENT_VI' => '<p><strong>INTERNATIONAL SOS (24/24h)</strong><br />
Add: 167A Nam Ky Khoi Nghia, Dist 3<br />
Tel: +84 8 38298424<br />
Map view: http://map.google.com<br />
Regional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>

<p><strong>COLOMBIA ASIA SAIGON (24/24h)</strong><br />
Add: 167A Nam Ky Khoi Nghia, Dist 3<br />
Tel: +84 8 38298424<br />
Map view: http://map.google.com<br />
Regional health care gruop offering full madical treatments including 24-hour emergency service dental care and medevac.</p>',
      'EMBASSY_CONTENT_VI' => '<table style="background:white; border-collapse:collapse" width="100%">
	<tbody>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Anh</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">25 ???????ng L&ecirc; Du???n, Ph?????ng B???n Ngh&eacute;, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38251380</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://GeneralEnquiries.Vietnam@fco.gov.uk/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">GeneralEnquiries.Vietnam@fco.gov.uk</span></span></span></a></span></span></span></span></p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">???n ?????</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">5 ???????ng Nguy???n ??&igrave;nh Chi???u, Ph?????ng 6, Qu???n 3</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38237050</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://cgihcmc@hcm.vnn.vn/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">cgihcmc@hcm.vnn.vn</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Canada</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Ph&ograve;ng 1002 The Metropolitan, 235 ???????ng ?????ng Kh???i, Ph?????ng B???n Ngh&eacute;, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38279899</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://HOCHIG@international.gc.ca/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">HOCHIG@international.gc.ca</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Campuchia</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">41 ???????ng Ph&ugrave;ng Kh???c Khoan, Ph?????ng ??a Kao, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38292751</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://cambocg@hcm.vnn.vn/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">cambocg@hcm.vnn.vn</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Cuba</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">45 ???????ng Ph&ugrave;ng Kh???c Khoan, Ph?????ng ??a Kao, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38297350</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://cubacons@hcm.fpt.vn/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">cubacons@hcm.fpt.vn</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">?????c</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">L???u 4, Deustches Haus, 33 L&ecirc; Du???n, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38291967</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://info@hoch.diplo.de/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">info@hoch.diplo.de</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">H&agrave; Lan</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">29 ???????ng L&ecirc; Du???n, Ph?????ng B???n Ngh&eacute;, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38235932</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://hcm@minbuza.nl/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">hcm@minbuza.nl</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">H&agrave;n Qu???c</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">107 ???????ng Nguy???n Du, Ph?????ng B???n Th&agrave;nh, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38225757</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://hcm02@mofa.go.kr/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">hcm02@mofa.go.kr</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Hoa K???</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">4 ???????ng L&ecirc; Du???n, ph?????ng B???n Ngh&eacute;, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-35204200</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;</span></span></span></p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Hungary</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">22 ???????ng Ph&ugrave;ng Kh???c Khoan, Ph?????ng ??a Kao, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-36221001</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://hcm02@mofa.go.kr/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">mission.hcm@mfa.gov.hu</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Indonesia</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">18 ???????ng Ph&ugrave;ng Kh???c Khoan, Ph?????ng ??a Kao, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38251888/9</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://hochiminh.kjri@kemlu.go.id/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">hochiminh.kjri@kemlu.go.id</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Kuwait</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">24 ??u&ograve;ng Ph&ugrave;ng Kh???c Khoan, Ph?????ng ??a Kao, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38270555</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://info@kuwaitconsulate-hochiminh.com/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">info@kuwaitconsulate-hochiminh.com</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">L&agrave;o</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">93 ???????ng Pasteur, Ph?????ng B???n Ngh&eacute;, Qu???n 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38297667</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://cglaohcm@gmail.com/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">cglaohcm@gmail.com</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Malaysia</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">109 Nguy???n V??n H?????ng, Ph?????ng Th???o ??i???n, Qu???n 2</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38299023, 028-38293132</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://mwhochiminh@kln.gov.my/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">mwhochiminh@kln.gov.my</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td colspan="1" rowspan="2">Nh???t b???n</td>
			<td colspan="1" rowspan="2">
			<p style="text-align: center;">261 ???????ng ??i???n Bi&ecirc;n Ph???, Ph?????ng 7, Qu???n 3</p>

			<p style="text-align: center;">028-39333510</p>

			<p style="text-align: center;">ryoujikan@vietnam-japan.net</p>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="1" rowspan="2">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Nga</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
			<td colspan="3" rowspan="2">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">40 B&agrave; Huy???n Thanh Quan, Ph?????ng 6, Qu???n 3</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-39303936</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://cgrushcm@yandex.ru/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">cgrushcm@yandex.ru</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>',
      'EMBASSY_CONTENT_EN' => '<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">England</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">25 Le Duan Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38251380</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">GeneralEnquiries.Vietnam@fco.gov.uk</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">India</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">5 Nguyen Dinh Chieu Street, Ward 6, District 3</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38237050</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">cgihcmc@hcm.vnn.vn</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Canada</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Room 1002 The Metropolitan, 235 Dong Khoi Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38279899</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HOCHIG@international.gc.ca</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Cambodia</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">41 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38292751</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">cambocg@hcm.vnn.vn</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Cuba</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">45 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38297350</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">cubacons@hcm.fpt.vn</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Germany</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">4th floor, Deustches Haus, 33 Le Duan, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38291967</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">info@hoch.diplo.de</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Netherlands</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">29 Le Duan Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38235932</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">hcm@minbuza.nl</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">South Korea</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">107 Nguyen Du Street, Ben Thanh Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38225757</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">hcm02@mofa.go.kr</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">USA</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">4 Le Duan Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-35204200</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Hungary</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">22 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-36221001</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">mission.hcm@mfa.gov.hu</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Indonesia</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">18 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38251888/9</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">hochiminh.kjri@kemlu.go.id</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Kuwait</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">24 Phung Khac Khoan Street, Da Kao Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38270555</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">info@kuwaitconsulate-hochiminh.com</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Laos</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">93 Pasteur Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38297667</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">cglaohcm@gmail.com</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Malaysia</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">109 Nguyen Van Huong, Thao Dien Ward, District 2</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38299023, 028-38293132</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">mwhochiminh@kln.gov.my</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Russia</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">40 Ba Huyen Thanh Quan, Ward 6, District 3</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-39303936</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">cgrushcm@yandex.ru</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Japan</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">261 Dien Bien Phu Street, Ward 7, District 3</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-39333510</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">ryoujikan@vietnam-japan.net</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">New Zealand</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Room 804 The Metropolitan, 235 Dong Khoi Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38226907</span></span></span><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Panama</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">7 Le Thanh Ton Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38250334/38227550</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">panacons@hcm.fpt.vn</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">France</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">27 Nguyen Thi Minh Khai Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-35206800</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">info@consultrance-hcm.org</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Thailand</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">77 Tran Quoc Thao Street, Ward 7, District 3</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-39327637/8</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">thaihome@mfa.go.th</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">China</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">175 Hai Ba Trung Street, Ward 6, District 3</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38221327</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Switzerland</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Floor 37 Bitexco Financial Tower, 2 Hai Trieu, Ben Nghe +84862991200</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">hochiminh.vertretung@eda.admin.ch</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Singapore</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">8th floor Saigon Center, 65 Le Loi Street, Ben Nghe Ward, District 1 028-38225174</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">singcg_hcm@mfa.sg</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Australia</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Floor 20 Vincom Center, 47 Ly Tu Trong Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-35218100</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">hcmc.vietnam.embassy.gov.au</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Italy</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">10th Floor President Place, 93 Nguyen Du Street, Ben Nghe Ward, District 1</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">028-38275445</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">hochiminh.consolato@esteri.it</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><strong><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Austria</span></span></span></strong><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">12/140 Nguyen Van Huong Street, Thao Dien Ward, District 2</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">08-35193128</span></span></span><br />
<span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">info@austriaconsulate.vn</span></span></span></p>',
      'THUMB_SIZE_USERS' => '{"width":250,"height":250}',
      'THUMB_SIZE_NEWS' => '{"width":400,"height":600}',
      'THUMB_SIZE_SLIDE' => '{"width":600,"height":400}',
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);

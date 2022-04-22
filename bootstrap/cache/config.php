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
      'TITLE' => 'Dịch vụ thiết kế website - ngoluan.com',
      'META_KEYWORD' => 'dịch vụ,thiết kế website,thiết kế',
      'META_DESCRIPTION' => 'Dịch vụ thiết kế website',
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
      'PRIVACY_CONTENT_VI' => '<h1 style="text-align: center;"><span style="font-size:20px;">Điều khoản, Điều kiện v&agrave; Lưu &yacute;</span></h1>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ch&agrave;o mừng đến với Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Người sử dụng Ứng dụng n&agrave;y sẽ kh&ocirc;ng phải chịu bất kỳ khoản ph&iacute; n&agrave;o cho việc sử dụng Ứng dụng n&agrave;y theo Thỏa thuận n&agrave;y. Tuy nhi&ecirc;n, Ứng dụng n&agrave;y chứa c&aacute;c li&ecirc;n kết đến c&aacute;c ứng dụng của b&ecirc;n thứ ba được điều h&agrave;nh v&agrave; sở hữu bởi c&aacute;c nh&agrave; cung cấp dịch vụ hoặc nh&agrave; b&aacute;n lẻ độc lập. C&aacute;c b&ecirc;n thứ ba đ&oacute; c&oacute; thể t&iacute;nh ph&iacute; sử dụng một số nội dung hoặc dịch vụ được cung cấp tr&ecirc;n ứng dụng của họ. Do đ&oacute;, bạn n&ecirc;n thực hiện bất kỳ cuộc điều tra n&agrave;o m&agrave; bạn cảm thấy l&agrave; cần thiết hoặc ph&ugrave; hợp trước khi tiến h&agrave;nh bất kỳ giao dịch n&agrave;o với bất kỳ b&ecirc;n thứ ba n&agrave;o để x&aacute;c định xem liệu c&oacute; phải chịu một khoản ph&iacute; hay kh&ocirc;ng. Trường hợp Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh cung cấp th&ocirc;ng tin chi tiết về c&aacute;c khoản ph&iacute; tr&ecirc;n Ứng dụng n&agrave;y, th&ocirc;ng tin đ&oacute; chỉ được cung cấp nhằm mục đ&iacute;ch thuận tiện v&agrave; cung cấp th&ocirc;ng tin. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng c&oacute; c&aacute;ch n&agrave;o đảm bảo rằng th&ocirc;ng tin n&agrave;y l&agrave; ch&iacute;nh x&aacute;c cũng như kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung hoặc dịch vụ được cung cấp tr&ecirc;n c&aacute;c ứng dụng của b&ecirc;n thứ ba đ&oacute;.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&Aacute;C HOẠT ĐỘNG CẤM</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung Ứng dụng, cũng như cơ sở hạ tầng được sử dụng để cung cấp nội dung v&agrave; th&ocirc;ng tin đ&oacute;, l&agrave; độc quyền của ch&uacute;ng t&ocirc;i. Bạn đồng &yacute; kh&ocirc;ng sửa đổi, sao ch&eacute;p, ph&acirc;n phối, truyền tải, hiển thị, biểu diễn, t&aacute;i sản xuất, xuất bản, cấp ph&eacute;p, tạo ra c&aacute;c t&aacute;c phẩm ph&aacute;i sinh từ, chuyển nhượng hoặc b&aacute;n hoặc b&aacute;n lại bất kỳ th&ocirc;ng tin, phần mềm, sản phẩm hoặc dịch vụ n&agrave;o c&oacute; được từ hoặc th&ocirc;ng qua việc n&agrave;y Trang mạng.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ngo&agrave;i ra, bạn kh&ocirc;ng được ph&eacute;p:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(i) sử dụng Ứng dụng n&agrave;y hoặc nội dung của n&oacute; cho bất kỳ mục đ&iacute;ch thương mại n&agrave;o;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(ii) truy cập, theo d&otilde;i hoặc sao ch&eacute;p bất kỳ nội dung hoặc th&ocirc;ng tin n&agrave;o của Ứng dụng n&agrave;y bằng c&aacute;ch sử dụng bất kỳ r&ocirc;-bốt, tr&igrave;nh thu gọn n&agrave;o, m&aacute;y qu&eacute;t hoặc c&aacute;c phương tiện tự động kh&aacute;c hoặc bất kỳ quy tr&igrave;nh thủ c&ocirc;ng n&agrave;o cho bất kỳ mục đ&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p r&otilde; r&agrave;ng bằng văn bản của ch&uacute;ng t&ocirc;i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iii) vi phạm c&aacute;c hạn chế trong bất kỳ ti&ecirc;u đề loại trừ r&ocirc; bốt n&agrave;o tr&ecirc;n Ứng dụng n&agrave;y hoặc bỏ qua hoặc ph&aacute; vỡ c&aacute;c biện ph&aacute;p kh&aacute;c được sử dụng để ngăn chặn hoặc hạn chế quyền truy cập v&agrave;o Ứng dụng n&agrave;y;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iv) thực hiện bất kỳ h&agrave;nh động n&agrave;o &aacute;p đặt, hoặc c&oacute; thể &aacute;p đặt, theo quyết định của ch&uacute;ng t&ocirc;i, một tải trọng lớn kh&ocirc;ng hợp l&yacute; hoặc kh&ocirc;ng tương xứng đối với cơ sở hạ tầng của ch&uacute;ng t&ocirc;i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(v) li&ecirc;n kết s&acirc;u đến bất kỳ phần n&agrave;o của Ứng dụng n&agrave;y cho bất kỳ mục đ&iacute;ch n&agrave;o m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p r&otilde; r&agrave;ng bằng văn bản của ch&uacute;ng t&ocirc;i;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(vi) &ldquo;khung&rdquo;, &ldquo;nh&acirc;n bản&rdquo; hoặc kết hợp bất kỳ phần n&agrave;o của Ứng dụng n&agrave;y v&agrave;o bất kỳ ứng dụng n&agrave;o kh&aacute;c m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p trước bằng văn bản của ch&uacute;ng t&ocirc;i; hoặc l&agrave;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(vii) cố gắng sửa đổi, dịch, điều chỉnh, chỉnh sửa, dịch ngược, th&aacute;o rời hoặc thiết kế đối chiếu bất kỳ chương tr&igrave;nh phần mềm n&agrave;o được HoChiMinh City Tourism sử dụng li&ecirc;n quan đến Ứng dụng n&agrave;y hoặc c&aacute;c dịch vụ trừ khi được cho ph&eacute;p theo luật hiện h&agrave;nh.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">CH&Iacute;NH S&Aacute;CH BẢO MẬT</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HoChiMinh City Tourism tin tưởng v&agrave;o việc bảo vệ sự ri&ecirc;ng tư của bạn. Bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o bạn đăng tr&ecirc;n Ứng dụng n&agrave;y sẽ được sử dụng theo ch&iacute;nh s&aacute;ch bảo mật của ch&uacute;ng t&ocirc;i.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&Aacute;C KẾ HOẠCH, NHẬN X&Eacute;T V&Agrave; SỬ DỤNG C&Aacute;C V&Ugrave;NG TƯƠNG T&Aacute;C KH&Aacute;C</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ch&uacute;ng t&ocirc;i tr&acirc;n trọng được nghe từ bạn. Xin lưu &yacute; rằng bằng c&aacute;ch gửi nội dung đến Ứng dụng n&agrave;y bằng thư điện tử, c&aacute;c b&agrave;i đăng tr&ecirc;n Ứng dụng n&agrave;y hoặc bằng c&aacute;ch kh&aacute;c, bao gồm bất kỳ c&acirc;u hỏi, h&igrave;nh ảnh hoặc video, nhận x&eacute;t, đề xuất, &yacute; tưởng hoặc những thứ tương tự c&oacute; trong bất kỳ b&agrave;i gửi n&agrave;o (gọi chung l&agrave; &ldquo;B&agrave;i nộp&rdquo;), bạn cấp cho Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; c&aacute;c chi nh&aacute;nh của n&oacute; quyền kh&ocirc;ng độc quyền, miễn ph&iacute; bản quyền, vĩnh viễn, c&oacute; thể chuyển nhượng, kh&ocirc;ng thể thu hồi v&agrave; ho&agrave;n to&agrave;n c&oacute; thể cấp ph&eacute;p lại để (a) sử dụng, t&aacute;i sản xuất, sửa đổi, điều chỉnh, dịch, ph&acirc;n phối, xuất bản, tạo c&aacute;c t&aacute;c phẩm ph&aacute;i sinh từ v&agrave; trưng b&agrave;y v&agrave; biểu diễn c&ocirc;ng khai C&aacute;c Đệ tr&igrave;nh như vậy tr&ecirc;n khắp thế giới tr&ecirc;n bất kỳ phương tiện truyền th&ocirc;ng n&agrave;o, hiện đ&atilde; được biết đến hoặc sau n&agrave;y được ph&aacute;t minh ra; v&agrave; (b) sử dụng t&ecirc;n m&agrave; bạn gửi li&ecirc;n quan đến Nội dung gửi đ&oacute;. Bạn x&aacute;c nhận rằng Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể chọn cung cấp c&aacute;c nhận x&eacute;t hoặc đ&aacute;nh gi&aacute; của bạn theo quyết định của ch&uacute;ng t&ocirc;i. Bạn cũng cấp cho Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh quyền truy cứu trước ph&aacute;p luật bất kỳ c&aacute; nh&acirc;n hoặc tổ chức n&agrave;o vi phạm c&aacute;c quyền của Bạn hoặc Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh trong c&aacute;c Đệ tr&igrave;nh do vi phạm Thỏa thuận n&agrave;y. Bạn thừa nhận v&agrave; đồng &yacute; rằng Nội dung đệ tr&igrave;nh l&agrave; kh&ocirc;ng b&iacute; mật v&agrave; kh&ocirc;ng độc quyền.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ứng dụng n&agrave;y c&oacute; thể chứa c&aacute;c diễn đ&agrave;n thảo luận, bảng th&ocirc;ng b&aacute;o, dịch vụ b&igrave;nh luận hoặc c&aacute;c diễn đ&agrave;n kh&aacute;c trong đ&oacute; bạn hoặc c&aacute;c b&ecirc;n thứ ba c&oacute; thể đăng đ&aacute;nh gi&aacute; về trải nghiệm du lịch hoặc nội dung, th&ocirc;ng điệp, t&agrave;i liệu hoặc c&aacute;c mục kh&aacute;c tr&ecirc;n Ứng dụng n&agrave;y (&ldquo;Khu vực tương t&aacute;c&rdquo;). Nếu HoChiMinh City Tourism cung cấp c&aacute;c V&ugrave;ng tương t&aacute;c như vậy, bạn ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm về việc sử dụng c&aacute;c V&ugrave;ng tương t&aacute;c đ&oacute; v&agrave; tự chịu rủi ro khi sử dụng. Bằng c&aacute;ch sử dụng bất kỳ Khu vực tương t&aacute;c n&agrave;o, bạn đồng &yacute; r&otilde; r&agrave;ng kh&ocirc;ng đăng, tải l&ecirc;n, truyền, ph&acirc;n phối, lưu trữ, tạo hoặc xuất bản th&ocirc;ng qua Ứng dụng n&agrave;y bất kỳ nội dung n&agrave;o sau đ&acirc;y:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Bất kỳ tin nhắn, dữ liệu, th&ocirc;ng tin, văn bản, &acirc;m nhạc, &acirc;m thanh, ảnh, đồ họa, m&atilde; hoặc bất kỳ t&agrave;i liệu n&agrave;o kh&aacute;c (&ldquo;Nội dung&rdquo;) sai, bất hợp ph&aacute;p, g&acirc;y hiểu lầm, b&ocirc;i nhọ, phỉ b&aacute;ng, khi&ecirc;u d&acirc;m, khi&ecirc;u d&acirc;m, kh&ocirc;ng đứng đắn, d&acirc;m &ocirc;, kh&ecirc;u gợi, quấy rối hoặc ủng hộ việc quấy rối người kh&aacute;c, đe dọa, x&acirc;m phạm quyền ri&ecirc;ng tư hoặc quyền c&ocirc;ng khai, lạm dụng, k&iacute;ch động, lừa đảo hoặc bị phản đối;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung x&uacute;c phạm cộng đồng trực tuyến một c&aacute;ch thường xuy&ecirc;n, chẳng hạn như nội dung cổ vũ ph&acirc;n biệt chủng tộc, cố chấp, th&ugrave; hận hoặc tổn hại thể chất dưới bất kỳ h&igrave;nh thức n&agrave;o chống lại bất kỳ nh&oacute;m hoặc c&aacute; nh&acirc;n n&agrave;o;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung cấu th&agrave;nh, khuyến kh&iacute;ch, quảng b&aacute; hoặc cung cấp hướng dẫn để thực hiện một hoạt động bất hợp ph&aacute;p, phạm tội h&igrave;nh sự, dẫn đến tr&aacute;ch nhiệm d&acirc;n sự, vi phạm quyền của bất kỳ b&ecirc;n n&agrave;o ở bất kỳ quốc gia n&agrave;o tr&ecirc;n thế giới hoặc nếu kh&ocirc;ng sẽ tạo ra tr&aacute;ch nhiệm ph&aacute;p l&yacute; hoặc vi phạm bất kỳ luật ph&aacute;p địa phương, tiểu bang, quốc gia hoặc quốc tế, bao gồm nhưng kh&ocirc;ng giới hạn c&aacute;c quy định của Ủy ban Chứng kho&aacute;n v&agrave; Giao dịch Singapore (SEC) hoặc bất kỳ quy tắc n&agrave;o của bất kỳ s&agrave;n giao dịch chứng kho&aacute;n n&agrave;o;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung cung cấp th&ocirc;ng tin hướng dẫn về c&aacute;c hoạt động bất hợp ph&aacute;p như chế tạo hoặc mua vũ kh&iacute; bất hợp ph&aacute;p, vi phạm quyền ri&ecirc;ng tư của ai đ&oacute; hoặc cung cấp hoặc tạo vi r&uacute;t m&aacute;y t&iacute;nh;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung c&oacute; thể vi phạm bất kỳ bằng s&aacute;ng chế, nh&atilde;n hiệu, b&iacute; mật thương mại, bản quyền hoặc c&aacute;c quyền sở hữu hoặc tr&iacute; tuệ kh&aacute;c của bất kỳ b&ecirc;n n&agrave;o. Cụ thể, nội dung quảng b&aacute; bản sao bất hợp ph&aacute;p hoặc tr&aacute;i ph&eacute;p t&aacute;c phẩm c&oacute; bản quyền của người kh&aacute;c, chẳng hạn như cung cấp c&aacute;c chương tr&igrave;nh m&aacute;y t&iacute;nh vi phạm bản quyền hoặc li&ecirc;n kết đến ch&uacute;ng, cung cấp th&ocirc;ng tin để ph&aacute; vỡ c&aacute;c thiết bị chống sao ch&eacute;p được c&agrave;i đặt sẵn hoặc cung cấp nhạc vi phạm bản quyền hoặc li&ecirc;n kết đến c&aacute;c tệp nhạc vi phạm bản quyền ;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung mạo danh bất kỳ c&aacute; nh&acirc;n hoặc tổ chức n&agrave;o hoặc n&oacute;i c&aacute;ch kh&aacute;c l&agrave; xuy&ecirc;n tạc mối quan hệ của bạn với một c&aacute; nh&acirc;n hoặc tổ chức, bao gồm cả HoChiMinh City Tourism;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Khuyến mại kh&ocirc;ng được y&ecirc;u cầu, gửi thư h&agrave;ng loạt hoặc &quot;gửi thư r&aacute;c&quot;, truyền &quot;thư r&aacute;c&quot;, &quot;thư d&acirc;y chuyền&quot;, chiến dịch ch&iacute;nh trị, quảng c&aacute;o, cuộc thi, xổ số hoặc x&uacute;i giục;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung chứa c&aacute;c hoạt động thương mại v&agrave; / hoặc b&aacute;n h&agrave;ng m&agrave; kh&ocirc;ng c&oacute; sự đồng &yacute; trước bằng văn bản của ch&uacute;ng t&ocirc;i, chẳng hạn như c&aacute;c cuộc thi, r&uacute;t ​​thăm tr&uacute;ng thưởng, h&agrave;ng đổi h&agrave;ng, quảng c&aacute;o v&agrave; kế hoạch kim tự th&aacute;p;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Th&ocirc;ng tin c&aacute; nh&acirc;n của bất kỳ b&ecirc;n thứ ba n&agrave;o, bao gồm nhưng kh&ocirc;ng giới hạn, địa chỉ họ (t&ecirc;n gia đ&igrave;nh), số điện thoại, địa chỉ email, số nhận dạng quốc gia v&agrave; số thẻ t&iacute;n dụng.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Chứa c&aacute;c trang truy cập bị hạn chế hoặc chỉ c&oacute; mật khẩu, hoặc c&aacute;c trang hoặc h&igrave;nh ảnh ẩn (những trang kh&ocirc;ng được li&ecirc;n kết đến hoặc từ một trang c&oacute; thể truy cập kh&aacute;c);</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Vi r&uacute;t, dữ liệu bị hỏng hoặc c&aacute;c tệp c&oacute; hại, g&acirc;y rối hoặc ph&aacute; hoại kh&aacute;c;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung kh&ocirc;ng li&ecirc;n quan đến chủ đề của (c&aacute;c) Khu vực tương t&aacute;c m&agrave; Nội dung đ&oacute; được đăng; hoặc l&agrave;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nội dung hoặc li&ecirc;n kết đến nội dung, theo nhận định duy nhất của HoChiMinh City Tourism, (a) vi phạm c&aacute;c tiểu mục trước đ&acirc;y của t&agrave;i liệu n&agrave;y, (b) l&agrave; phản đối, (c) hạn chế hoặc ngăn cản bất kỳ người n&agrave;o kh&aacute;c sử dụng hoặc tận hưởng c&aacute;c Khu vực tương t&aacute;c hoặc điều n&agrave;y Ứng dụng, hoặc (d) c&oacute; thể khiến Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh hoặc c&aacute;c chi nh&aacute;nh của n&oacute; hoặc người d&ugrave;ng của n&oacute; phải chịu bất kỳ tổn hại hoặc tr&aacute;ch nhiệm ph&aacute;p l&yacute; n&agrave;o dưới bất kỳ h&igrave;nh thức n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng chịu tr&aacute;ch nhiệm v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm ph&aacute;p l&yacute; đối với bất kỳ Nội dung n&agrave;o do bạn hoặc bất kỳ b&ecirc;n thứ ba n&agrave;o đăng tải, lưu trữ hoặc tải l&ecirc;n, hoặc đối với bất kỳ tổn thất hoặc thiệt hại n&agrave;o, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh cũng kh&ocirc;ng chịu tr&aacute;ch nhiệm về bất kỳ sai lầm, phỉ b&aacute;ng, vu khống, b&ocirc;i nhọ, thiếu s&oacute;t n&agrave;o , giả dối, tục tĩu, nội dung khi&ecirc;u d&acirc;m hoặc th&ocirc; tục m&agrave; bạn c&oacute; thể gặp phải. Với tư c&aacute;ch l&agrave; nh&agrave; cung cấp c&aacute;c dịch vụ tương t&aacute;c, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng chịu tr&aacute;ch nhiệm về bất kỳ tuy&ecirc;n bố, đại diện hoặc Nội dung n&agrave;o được cung cấp bởi người d&ugrave;ng của m&igrave;nh tr&ecirc;n bất kỳ diễn đ&agrave;n c&ocirc;ng cộng, trang chủ c&aacute; nh&acirc;n hoặc Khu vực tương t&aacute;c n&agrave;o kh&aacute;c. Mặc d&ugrave; Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng c&oacute; nghĩa vụ s&agrave;ng lọc, chỉnh sửa hoặc gi&aacute;m s&aacute;t bất kỳ Nội dung n&agrave;o được đăng tải l&ecirc;n hoặc ph&acirc;n phối qua bất kỳ Khu vực tương t&aacute;c n&agrave;o, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; quyền, v&agrave; c&oacute; to&agrave;n quyền quyết định loại bỏ, s&agrave;ng lọc hoặc chỉnh sửa m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o bất kỳ Nội dung n&agrave;o được đăng hoặc được lưu trữ tr&ecirc;n Ứng dụng n&agrave;y v&agrave;o bất kỳ l&uacute;c n&agrave;o v&agrave; v&igrave; bất kỳ l&yacute; do g&igrave;, v&agrave; bạn ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm về việc tạo c&aacute;c bản sao dự ph&ograve;ng v&agrave; thay thế bất kỳ Nội dung n&agrave;o bạn đăng hoặc lưu trữ tr&ecirc;n Ứng dụng n&agrave;y bằng chi ph&iacute; v&agrave; chi ph&iacute; duy nhất của bạn.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nếu được x&aacute;c định rằng bạn giữ c&aacute;c quyền nh&acirc;n th&acirc;n (bao gồm quyền ghi c&ocirc;ng hoặc quyền to&agrave;n vẹn) trong Nội dung hoặc Nội dung gửi, th&igrave; bạn tuy&ecirc;n bố rằng (a) bạn kh&ocirc;ng y&ecirc;u cầu sử dụng bất kỳ th&ocirc;ng tin nhận dạng c&aacute; nh&acirc;n n&agrave;o li&ecirc;n quan đến Nội dung hoặc Nội dung gửi, hoặc bất kỳ sản phẩm ph&aacute;i sinh n&agrave;o của hoặc n&acirc;ng cấp hoặc cập nhật từ đ&oacute;; (b) bạn kh&ocirc;ng phản đối việc xuất bản, sử dụng, sửa đổi, x&oacute;a v&agrave; khai th&aacute;c Nội dung hoặc B&agrave;i dự thi của HoChiMinh City Tourism hoặc những người được cấp ph&eacute;p, kế thừa v&agrave; chuyển nhượng; (c) bạn vĩnh viễn từ bỏ v&agrave; đồng &yacute; kh&ocirc;ng y&ecirc;u cầu hoặc khẳng định bất kỳ quyền lợi n&agrave;o đối với bất kỳ v&agrave; tất cả c&aacute;c quyền nh&acirc;n th&acirc;n của t&aacute;c giả trong bất kỳ Nội dung hoặc B&agrave;i gửi n&agrave;o; v&agrave; (d) bạn vĩnh viễn trả tự do cho HoChiMinh City Tourism, v&agrave; những người được cấp ph&eacute;p, kế thừa v&agrave; chuyển nhượng, khỏi bất kỳ khiếu nại n&agrave;o m&agrave; bạn c&oacute; thể khẳng định chống lại HoChiMinh City Tourism bằng bất kỳ quyền nh&acirc;n th&acirc;n n&agrave;o như vậy.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Bất kỳ việc sử dụng Khu vực tương t&aacute;c hoặc c&aacute;c phần kh&aacute;c của Ứng dụng n&agrave;y vi phạm những điều đ&atilde; n&oacute;i ở tr&ecirc;n đều vi phạm Thỏa thuận n&agrave;y v&agrave; c&oacute; thể dẫn đến việc bạn bị chấm dứt hoặc đ&igrave;nh chỉ quyền sử dụng Khu vực tương t&aacute;c v&agrave; / hoặc Ứng dụng n&agrave;y. Để hợp t&aacute;c với c&aacute;c y&ecirc;u cầu hợp ph&aacute;p của ch&iacute;nh phủ, tr&aacute;t đ&ograve;i hầu t&ograve;a hoặc lệnh của t&ograve;a &aacute;n, để bảo vệ hệ thống v&agrave; kh&aacute;ch h&agrave;ng của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, hoặc để đảm bảo t&iacute;nh to&agrave;n vẹn v&agrave; hoạt động của hệ thống v&agrave; kinh doanh của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể truy cập v&agrave; tiết lộ bất kỳ th&ocirc;ng tin n&agrave;o m&agrave; họ cho l&agrave; cần thiết hoặc th&iacute;ch hợp, bao gồm nhưng kh&ocirc;ng giới hạn, th&ocirc;ng tin hồ sơ người d&ugrave;ng (tức l&agrave; t&ecirc;n, địa chỉ email, v.v.), địa chỉ IP v&agrave; th&ocirc;ng tin lưu lượng, lịch sử sử dụng v&agrave; Nội dung đ&atilde; đăng. Quyền tiết lộ bất kỳ th&ocirc;ng tin n&agrave;o như vậy của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh sẽ được ưu ti&ecirc;n hơn bất kỳ điều khoản n&agrave;o trong Ch&iacute;nh s&aacute;ch Bảo mật của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">ĐIỂM DU LỊCH</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Mặc d&ugrave; hầu hết c&aacute;c chuyến du lịch, bao gồm cả du lịch đến c&aacute;c điểm đến quốc tế, được ho&agrave;n th&agrave;nh m&agrave; kh&ocirc;ng xảy ra sự cố, việc đi đến c&aacute;c điểm đến nhất định c&oacute; thể tiềm ẩn rủi ro lớn hơn những điểm kh&aacute;c. HoChiMinh City Tourism k&ecirc;u gọi h&agrave;nh kh&aacute;ch điều tra v&agrave; xem x&eacute;t c&aacute;c quy định cấm du lịch, cảnh b&aacute;o, th&ocirc;ng b&aacute;o v&agrave; tư vấn do Ch&iacute;nh phủ Vương quốc Anh, Li&ecirc;n minh Ch&acirc;u &Acirc;u (EU) v&agrave; ch&iacute;nh phủ c&aacute;c nước đến trước khi đặt chuyến du lịch đến c&aacute;c điểm đến quốc tế.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">BẰNG VIỆC LẮP ĐẶT TH&Ocirc;NG TIN LI&Ecirc;N QUAN ĐẾN VIỆC ĐI ĐẾN C&Aacute;C ĐIỂM ĐẾN QUỐC TẾ CỤ THỂ, CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG TUY&Ecirc;N BỐ HOẶC BẢO ĐẢM RẰNG VIỆC ĐI ĐẾN C&Aacute;C ĐIỂM Đ&Oacute; L&Agrave; C&Oacute; LỢI HOẶC KH&Ocirc;NG RỦI RO V&Agrave; KH&Ocirc;NG CHỊU TR&Aacute;CH NHIỆM ĐỐI VỚI C&Aacute;C THIỆT HẠI HOẶC TỔN THẤT C&Oacute; THỂ PH&Aacute;T SINH TỪ VIỆC ĐI ĐẾN C&Aacute;C ĐIỂM Đ&Oacute;.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TUY&Ecirc;N BỐ MIỄN TRỪ TR&Aacute;CH NHIỆM</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ ĐƯỢC XUẤT BẢN TR&Ecirc;N ỨNG DỤNG N&Agrave;Y C&Oacute; THỂ BAO GỒM NHỮNG LỖI KH&Ocirc;NG CH&Iacute;NH X&Aacute;C HOẶC LỖI. CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG ĐẢM BẢO T&Iacute;NH CH&Iacute;NH X&Aacute;C V&Agrave; TỪ CHỐI TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; ĐỐI VỚI BẤT KỲ LỖI HOẶC KH&Ocirc;NG CH&Iacute;NH X&Aacute;C KH&Aacute;C LI&Ecirc;N QUAN ĐẾN TH&Ocirc;NG TIN V&Agrave; M&Ocirc; TẢ CỦA KH&Aacute;CH SẠN, H&Agrave;NG KH&Ocirc;NG, T&Agrave;U, XE V&Agrave; BẤT KỲ SẢN PHẨM DU LỊCH N&Agrave;O KH&Aacute;C ĐƯỢC HIỂN THỊ TR&Ecirc;N ỨNG DỤNG N&Agrave;Y (BAO GỒM, KH&Ocirc;NG GIỚI HẠN , CHỤP ẢNH, DANH S&Aacute;CH C&Aacute;C TIỆN &Iacute;CH CỦA KH&Aacute;CH SẠN, M&Ocirc; TẢ SẢN PHẨM CHUNG, V..V.).</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG TUY&Ecirc;N BỐ BẤT CỨ H&Igrave;NH THỨC N&Agrave;O VỀ SỰ PH&Ugrave; HỢP CỦA TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ LI&Ecirc;N HỆ TR&Ecirc;N ỨNG DỤNG N&Agrave;Y HOẶC BẤT KỲ CỔNG N&Agrave;O CHO BẤT KỲ MỤC Đ&Iacute;CH N&Agrave;O V&Agrave; SỰ BAO GỒM HOẶC CUNG CẤP BẤT KỲ SẢN PHẨM HOẶC DỊCH VỤ N&Agrave;O TR&Ecirc;N ỨNG DỤNG N&Agrave;Y KH&Ocirc;NG C&Oacute; BẤT KỲ HOẶC NHẬN ĐỊNH VỀ C&Aacute;C SẢN PHẨM HOẶC DỊCH VỤ CỦA CH&Uacute;NG T&Ocirc;I. TẤT CẢ TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ ĐỀU ĐƯỢC CUNG CẤP &ldquo;NGUY&Ecirc;N TRẠNG&rdquo; M&Agrave; KH&Ocirc;NG ĐƯỢC BẢO H&Agrave;NH BẤT KỲ H&Igrave;NH THỨC N&Agrave;O. CH&Uacute;NG T&Ocirc;I TỪ CHỐI TẤT CẢ C&Aacute;C ĐẢM BẢO V&Agrave; ĐIỀU KIỆN RẰNG ỨNG DỤNG N&Agrave;Y, C&Aacute;C M&Aacute;Y CHỦ CỦA N&Oacute; HOẶC BẤT KỲ EMAIL N&Agrave;O ĐƯỢC GỬI TỪ CH&Uacute;NG T&Ocirc;I KH&Ocirc;NG C&Oacute; VIRUS HOẶC C&Aacute;C TH&Agrave;NH PHẦN C&Oacute; HẠI KH&Aacute;C. ĐỐI VỚI MỞ RỘNG TỐI ĐA ĐƯỢC PH&Eacute;P THEO LUẬT &Aacute;P DỤNG CỦA CH&Uacute;NG T&Ocirc;I TẠI Đ&Acirc;Y TỪ CHỐI TẤT CẢ C&Aacute;C BẢO ĐẢM V&Agrave; ĐIỀU KIỆN LI&Ecirc;N QUAN ĐẾN TH&Ocirc;NG TIN, PHẦN MỀM, SẢN PHẨM V&Agrave; DỊCH VỤ N&Agrave;Y, BAO GỒM TẤT CẢ C&Aacute;C BẢO ĐẢM NGỤ &Yacute; V&Agrave; ĐIỀU KIỆN VỀ KHẢ NĂNG BẢO ĐẢM V&Agrave; MỤC Đ&Iacute;CH, PH&Ugrave; HỢP VỚI MỘT PHẦN.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">CH&Uacute;NG T&Ocirc;I CŨNG TUY&Ecirc;N BỐ TỪ CHỐI BẤT KỲ BẢO ĐẢM HOẶC TUY&Ecirc;N BỐ N&Agrave;O ĐỐI VỚI T&Iacute;NH CH&Iacute;NH X&Aacute;C HOẶC SỞ HỮU CỦA NỘI DUNG ỨNG DỤNG.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">KH&Ocirc;NG C&Oacute; ĐIỀU G&Igrave; TRONG THỎA THUẬN N&Agrave;Y SẼ LOẠI TRỪ HOẶC GIỚI HẠN TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; CỦA CH&Uacute;NG T&Ocirc;I ĐỐI VỚI (I) C&Aacute;I CHẾT HOẶC THƯƠNG HẠI C&Aacute; NH&Acirc;N DO SỰ TI&Ecirc;U CỰC; (II) NGUỒN GỐC; HOẶC (III) TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; HOẶC BẤT CỨ HO&Agrave;N TO&Agrave;N (IV) BẤT KỲ TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; N&Agrave;O KH&Aacute;C KH&Ocirc;NG THỂ LOẠI TRỪ THEO LUẬT &Aacute;P DỤNG.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">THEO VIỆC BẮT ĐẦU, BẠN SỬ DỤNG ỨNG DỤNG N&Agrave;Y RỦI RO CỦA RI&Ecirc;NG BẠN V&Agrave; KH&Ocirc;NG SỰ KIỆN N&Agrave;O G&Acirc;Y RA CHO CH&Uacute;NG T&Ocirc;I (C&Aacute;C C&Aacute;N BỘ, GI&Aacute;M ĐỐC V&Agrave; LI&Ecirc;N QUAN ĐẾN CỦA N&Oacute;) CHỊU TR&Aacute;CH NHIỆM PH&Aacute;P L&Yacute; VỀ BẤT KỲ SỰ CỐ, BẤT CỨ, ĐẶC BIỆT, HOẶC HẬU QUẢ N&Agrave;O MẤT BẤT KỲ THU NHẬP, LỢI NHUẬN, H&Oacute;A ĐƠN, DỮ LIỆU, HỢP ĐỒNG, VIỆC SỬ DỤNG TIỀN HOẶC MẤT HOẶC THIỆT HẠI PH&Aacute;T SINH TỪ HOẶC KẾT NỐI TRONG BẤT KỲ C&Aacute;CH N&Agrave;O ĐỐI VỚI DOANH NGHIỆP LI&Ecirc;N QUAN ĐẾN BẤT KỲ LOẠI H&Igrave;NH N&Agrave;O NGO&Agrave;I, HOẶC BẤT KỲ C&Aacute;CH N&Agrave;O ĐƯỢC KẾT NỐI VỚI VIỆC BẠN TRUY CẬP, HIỂN THỊ HOẶC SỬ DỤNG ỨNG DỤNG N&Agrave;Y HOẶC C&Oacute; SỰ TR&Igrave; HO&Atilde;N HOẶC KH&Ocirc;NG C&Oacute; KHẢ NĂNG TRUY CẬP, HIỂN THỊ HOẶC SỬ DỤNG ỨNG DỤNG N&Agrave;Y (BAO GỒM, NHƯNG KH&Ocirc;NG GIỚI HẠN ĐỐI VỚI, C&Aacute;C &Yacute; KIẾN LI&Ecirc;N KẾT CỦA BẠN XUẤT HIỆN TR&Ecirc;N ỨNG DỤNG N&Agrave;Y; BẤT KỲ VIRUS M&Aacute;Y T&Iacute;NH N&Agrave;O, TH&Ocirc;NG TIN, PHẦN MỀM, ỨNG DỤNG LI&Ecirc;N KẾT, SẢN PHẨM V&Agrave; DỊCH VỤ TH&Ocirc;NG QUA ỨNG DỤNG N&Agrave;Y; HOẶC C&Aacute;CH KH&Aacute;C PH&Aacute;T SINH NGO&Agrave;I VIỆC TRUY CẬP, HIỂN THỊ HOẶC SỬ DỤNG ỨNG DỤNG N&Agrave;Y) M&Agrave; DỰA TR&Ecirc;N L&Yacute; THUYẾT VỀ SỰ TI&Ecirc;U CỰC, HỢP ĐỒNG, KHẢ NĂNG, TR&Aacute;CH NHIỆM NGHI&Ecirc;M C THIỆT HẠI NHƯ VẬY.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&Aacute;C ĐIỀU KHOẢN V&Agrave; ĐIỀU KIỆN N&Agrave;Y V&Agrave; BẮT ĐẦU TỪ CHỐI TR&Aacute;CH NHIỆM TR&Aacute;CH NHIỆM, KH&Ocirc;NG ẢNH HƯỞNG ĐẾN C&Aacute;C QUYỀN PH&Aacute;P L&Yacute; XỬ L&Yacute; KH&Ocirc;NG THỂ LOẠI TRỪ THEO LUẬT &Aacute;P DỤNG.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Giới hạn tr&aacute;ch nhiệm phản &aacute;nh sự ph&acirc;n bổ rủi ro giữa c&aacute;c b&ecirc;n. C&aacute;c giới hạn được chỉ định trong phần n&agrave;y sẽ tồn tại v&agrave; &aacute;p dụng ngay cả khi bất kỳ biện ph&aacute;p khắc phục hạn chế n&agrave;o được chỉ định trong c&aacute;c điều khoản n&agrave;y được ph&aacute;t hiện l&agrave; kh&ocirc;ng đạt được mục đ&iacute;ch thiết yếu của n&oacute;. C&aacute;c giới hạn tr&aacute;ch nhiệm ph&aacute;p l&yacute; được quy định trong c&aacute;c điều khoản n&agrave;y c&oacute; lợi cho Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; c&aacute;c c&ocirc;ng ty li&ecirc;n kết, kế thừa v&agrave; chuyển nhượng của c&ocirc;ng ty.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">SỰ BỒI THƯỜNG</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Bạn đồng &yacute; bảo vệ v&agrave; bồi thường cho HoChiMinh City Tourism v&agrave; c&aacute;c chi nh&aacute;nh của n&oacute; v&agrave; bất kỳ c&aacute;n bộ, gi&aacute;m đốc, nh&acirc;n vi&ecirc;n v&agrave; đại l&yacute; n&agrave;o của họ khỏi v&agrave; chống lại bất kỳ khiếu nại, nguy&ecirc;n nh&acirc;n của h&agrave;nh động, y&ecirc;u cầu, thu hồi, tổn thất, thiệt hại, tiền phạt, h&igrave;nh phạt hoặc c&aacute;c chi ph&iacute; hoặc chi ph&iacute; kh&aacute;c của bất kỳ h&igrave;nh thức hoặc bản chất n&agrave;o bao gồm nhưng kh&ocirc;ng giới hạn ở c&aacute;c khoản ph&iacute; ph&aacute;p l&yacute; v&agrave; kế to&aacute;n hợp l&yacute;, do c&aacute;c b&ecirc;n thứ ba đưa ra do:</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(i) bạn vi phạm Thỏa thuận n&agrave;y hoặc c&aacute;c t&agrave;i liệu được đề cập ở đ&acirc;y;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(ii) bạn vi phạm bất kỳ luật n&agrave;o hoặc quyền của b&ecirc;n thứ ba; hoặc l&agrave;</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">(iii) việc bạn sử dụng Ứng dụng n&agrave;y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">LI&Ecirc;N KẾT ĐẾN ỨNG DỤNG B&Ecirc;N THỨ BA</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ứng dụng n&agrave;y c&oacute; thể chứa c&aacute;c si&ecirc;u li&ecirc;n kết đến c&aacute;c ứng dụng được điều h&agrave;nh bởi c&aacute;c b&ecirc;n kh&ocirc;ng phải l&agrave; Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh. C&aacute;c đường dẫn n&agrave;y được cung cấp cho bạn chỉ để tham khảo. Ch&uacute;ng t&ocirc;i kh&ocirc;ng kiểm so&aacute;t c&aacute;c ứng dụng đ&oacute; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung của ch&uacute;ng hoặc quyền ri&ecirc;ng tư hoặc c&aacute;c hoạt động kh&aacute;c của c&aacute;c ứng dụng đ&oacute;. Hơn nữa, bạn phải thực hiện c&aacute;c biện ph&aacute;p ph&ograve;ng ngừa để đảm bảo rằng bất kỳ li&ecirc;n kết n&agrave;o bạn chọn hoặc phần mềm bạn tải xuống (cho d&ugrave; từ Ứng dụng n&agrave;y hay c&aacute;c ứng dụng kh&aacute;c) đều kh&ocirc;ng c&oacute; c&aacute;c mục như vi r&uacute;t, s&acirc;u, ngựa trojan, lỗi v&agrave; c&aacute;c mục kh&aacute;c c&oacute; thể ph&aacute; hoại Thi&ecirc;n nhi&ecirc;n. Việc ch&uacute;ng t&ocirc;i đưa c&aacute;c si&ecirc;u li&ecirc;n kết đến c&aacute;c ứng dụng như vậy kh&ocirc;ng ngụ &yacute; bất kỳ sự chứng thực n&agrave;o của t&agrave;i liệu tr&ecirc;n c&aacute;c ứng dụng đ&oacute; hoặc bất kỳ li&ecirc;n kết n&agrave;o với c&aacute;c nh&agrave; điều h&agrave;nh của ch&uacute;ng. Trong một số trường hợp, bạn c&oacute; thể được ứng dụng của b&ecirc;n thứ ba y&ecirc;u cầu li&ecirc;n kết hồ sơ của bạn tr&ecirc;n HoChiMinh City Tourism với hồ sơ tr&ecirc;n một ứng dụng của b&ecirc;n thứ ba kh&aacute;c. Việc chọn l&agrave;m như vậy ho&agrave;n to&agrave;n l&agrave; t&ugrave;y chọn v&agrave; quyết định cho ph&eacute;p li&ecirc;n kết th&ocirc;ng tin n&agrave;y c&oacute; thể bị v&ocirc; hiệu h&oacute;a (với ứng dụng của b&ecirc;n thứ ba) bất kỳ l&uacute;c n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">PHẦN MỀM C&Oacute; TR&Ecirc;N ỨNG DỤNG N&Agrave;Y</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Trừ khi c&oacute; quy định kh&aacute;c, c&aacute;c t&agrave;i liệu tr&ecirc;n Ứng dụng n&agrave;y chỉ được tr&igrave;nh b&agrave;y để cung cấp th&ocirc;ng tin li&ecirc;n quan v&agrave; để quảng b&aacute; c&aacute;c dịch vụ, ứng dụng, đối t&aacute;c v&agrave; c&aacute;c sản phẩm kh&aacute;c của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh tại Việt Nam, c&aacute;c v&ugrave;ng l&atilde;nh thổ, t&agrave;i sản v&agrave; c&aacute;c quốc gia bảo hộ của Th&agrave;nh phố Hồ Ch&iacute; Minh. Ứng dụng n&agrave;y được kiểm so&aacute;t v&agrave; vận h&agrave;nh bởi HoChiMinh City Tourism từ c&aacute;c văn ph&ograve;ng của n&oacute; tại Việt Nam. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng tuy&ecirc;n bố rằng c&aacute;c t&agrave;i liệu tr&ecirc;n Ứng dụng n&agrave;y l&agrave; th&iacute;ch hợp hoặc c&oacute; sẵn để sử dụng b&ecirc;n ngo&agrave;i Việt Nam. Những người chọn truy cập Ứng dụng n&agrave;y từ b&ecirc;n ngo&agrave;i Việt Nam l&agrave;m như vậy theo s&aacute;ng kiến của họ v&agrave; chịu tr&aacute;ch nhiệm tu&acirc;n thủ luật ph&aacute;p địa phương, nếu v&agrave; trong phạm vi luật ph&aacute;p địa phương được &aacute;p dụng. Bằng c&aacute;ch sử dụng Ứng dụng n&agrave;y, bạn tuy&ecirc;n bố v&agrave; đảm bảo rằng bạn kh&ocirc;ng ở, dưới sự kiểm so&aacute;t của hoặc một c&ocirc;ng d&acirc;n hoặc cư d&acirc;n của bất kỳ quốc gia n&agrave;o như vậy hoặc trong bất kỳ danh s&aacute;ch n&agrave;o như vậy.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Phần mềm n&agrave;y l&agrave; sản phẩm c&oacute; bản quyền của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, hoặc c&aacute;c Chi nh&aacute;nh Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, hoặc c&aacute;c b&ecirc;n thứ ba kh&aacute;c như đ&atilde; được x&aacute;c định. Việc bạn sử dụng Phần mềm đ&oacute; chịu sự điều chỉnh của c&aacute;c điều khoản của thỏa thuận cấp ph&eacute;p người d&ugrave;ng cuối, nếu c&oacute;, đi k&egrave;m hoặc đi k&egrave;m với Phần mềm (&ldquo;Thỏa thuận cấp ph&eacute;p&rdquo;). Bạn kh&ocirc;ng được c&agrave;i đặt hoặc sử dụng bất kỳ Phần mềm n&agrave;o đi k&egrave;m hoặc bao gồm Thỏa thuận cấp ph&eacute;p trừ khi bạn đồng &yacute; trước với c&aacute;c điều khoản của Thỏa thuận cấp ph&eacute;p. Đối với bất kỳ Phần mềm n&agrave;o được cung cấp để tải xuống tr&ecirc;n Ứng dụng n&agrave;y kh&ocirc;ng k&egrave;m theo Thỏa thuận cấp ph&eacute;p, theo đ&acirc;y, ch&uacute;ng t&ocirc;i cấp cho bạn, người d&ugrave;ng, giấy ph&eacute;p c&oacute; giới hạn, c&aacute; nh&acirc;n, kh&ocirc;ng thể chuyển nhượng để sử dụng Phần mềm để xem v&agrave; sử dụng Ứng dụng n&agrave;y theo c&aacute;c điều khoản n&agrave;y v&agrave; điều kiện v&agrave; kh&ocirc;ng v&igrave; mục đ&iacute;ch n&agrave;o kh&aacute;c.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Xin lưu &yacute; rằng tất cả Phần mềm, bao gồm nhưng kh&ocirc;ng giới hạn, tất cả HTML, XML, m&atilde; Java v&agrave; c&aacute;c điều khiển Active X c&oacute; tr&ecirc;n Ứng dụng n&agrave;y, thuộc sở hữu của HoChiMinh City Tourism, c&aacute;c chi nh&aacute;nh v&agrave; / hoặc b&ecirc;n thứ ba v&agrave; được bảo vệ bởi luật bản quyền v&agrave; hiệp ước quốc tế điều khoản. Mọi việc sao ch&eacute;p hoặc ph&acirc;n phối lại Phần mềm đều bị nghi&ecirc;m cấm v&agrave; c&oacute; thể bị phạt nặng về d&acirc;n sự v&agrave; h&igrave;nh sự. Người vi phạm sẽ bị truy tố đến mức tối đa c&oacute; thể.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">KH&Ocirc;NG GIỚI HẠN VIỆC TẠO RA, SAO CH&Eacute;P HOẶC GIỚI THIỆU PHẦN MỀM CHO BẤT KỲ M&Aacute;Y CHỦ HOẶC VỊ TR&Iacute; N&Agrave;O KH&Aacute;C ĐỂ GIỚI THIỆU HOẶC PH&Acirc;N PHỐI TH&Ecirc;M ĐƯỢC CẤM R&Otilde; R&Agrave;NG. PHẦN MỀM ĐƯỢC BẢO H&Agrave;NH, NẾU C&Oacute;, CHỈ THEO ĐIỀU KHOẢN CỦA THỎA THUẬN GIẤY PH&Eacute;P.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">ĐIỀU KHOẢN SỬ DỤNG TR&Ecirc;N THIẾT BỊ DI ĐỘNG</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&aacute;c phần của phần mềm di động của HoChiMinh City Tourism c&oacute; thể sử dụng t&agrave;i liệu c&oacute; bản quyền, việc sử dụng n&agrave;y được HoChiMinh City Tourism thừa nhận. Ngo&agrave;i ra, c&oacute; c&aacute;c điều khoản cụ thể &aacute;p dụng cho việc sử dụng một số ứng dụng di động của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">TH&Ocirc;NG B&Aacute;O VỀ BẢN QUYỀN V&Agrave; THƯƠNG HIỆU</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Tất cả nội dung của Ứng dụng n&agrave;y l&agrave;: &copy; 2015 Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh. Đ&atilde; đăng k&yacute; Bản quyền. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung tr&ecirc;n c&aacute;c ứng dụng do c&aacute;c b&ecirc;n kh&ocirc;ng phải Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh điều h&agrave;nh. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh, biểu tượng v&agrave; tất cả c&aacute;c t&ecirc;n sản phẩm hoặc dịch vụ kh&aacute;c hoặc khẩu hiệu hiển thị tr&ecirc;n Ứng dụng n&agrave;y l&agrave; thương hiệu đ&atilde; đăng k&yacute; v&agrave; / hoặc thương hiệu th&ocirc;ng thường của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; / hoặc c&aacute;c nh&agrave; cung cấp hoặc người cấp ph&eacute;p của n&oacute;, v&agrave; kh&ocirc;ng được sao ch&eacute;p, bắt chước hoặc sử dụng, trong to&agrave;n bộ hoặc một phần, m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p trước bằng văn bản của HoChiMinh City Tourism hoặc chủ sở hữu nh&atilde;n hiệu hiện h&agrave;nh. Ngo&agrave;i ra, giao diện của Ứng dụng n&agrave;y, bao gồm tất cả c&aacute;c ti&ecirc;u đề trang, đồ họa t&ugrave;y chỉnh, biểu tượng n&uacute;t v&agrave; chữ viết, l&agrave; nh&atilde;n hiệu dịch vụ, nh&atilde;n hiệu v&agrave; / hoặc trang phục thương mại của Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; kh&ocirc;ng được sao ch&eacute;p, bắt chước hoặc sử dụng, trong to&agrave;n bộ hoặc một phần m&agrave; kh&ocirc;ng được sự cho ph&eacute;p trước bằng văn bản của HoChiMinh City Tourism. Tất cả c&aacute;c nh&atilde;n hiệu kh&aacute;c, nh&atilde;n hiệu đ&atilde; đăng k&yacute;, t&ecirc;n sản phẩm v&agrave; t&ecirc;n c&ocirc;ng ty hoặc biểu tượng được đề cập trong Ứng dụng n&agrave;y l&agrave; t&agrave;i sản của chủ sở hữu tương ứng. Tham chiếu đến bất kỳ sản phẩm, dịch vụ, quy tr&igrave;nh hoặc th&ocirc;ng tin n&agrave;o kh&aacute;c, theo t&ecirc;n thương mại, nh&atilde;n hiệu, nh&agrave; sản xuất, nh&agrave; cung cấp hoặc c&aacute;ch kh&aacute;c kh&ocirc;ng cấu th&agrave;nh hoặc ngụ &yacute; x&aacute;c nhận, t&agrave;i trợ hoặc khuyến nghị của HoChiMinh City Tourism.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Th&ocirc;ng b&aacute;o v&agrave; Ch&iacute;nh s&aacute;ch gỡ xuống đối với nội dung bất hợp ph&aacute;p.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">HoChiMinh City Tourism hoạt động tr&ecirc;n cơ sở &ldquo;th&ocirc;ng b&aacute;o v&agrave; gỡ bỏ&rdquo;. Nếu bạn c&oacute; bất kỳ khiếu nại hoặc phản đối n&agrave;o đối với t&agrave;i liệu hoặc nội dung, hoặc nếu bạn tin rằng t&agrave;i liệu hoặc nội dung được đăng tr&ecirc;n Ứng dụng n&agrave;y vi phạm bản quyền m&agrave; bạn nắm giữ, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i ngay lập tức bằng c&aacute;ch thực hiện theo th&ocirc;ng b&aacute;o v&agrave; quy tr&igrave;nh gỡ xuống của ch&uacute;ng t&ocirc;i. Sau khi quy tr&igrave;nh n&agrave;y được tu&acirc;n thủ, Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh sẽ nỗ lực hết sức hợp l&yacute; để loại bỏ nội dung bất hợp ph&aacute;p.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&aacute;c sửa đổi</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể thay đổi, th&ecirc;m hoặc x&oacute;a c&aacute;c điều khoản v&agrave; điều kiện của Thỏa thuận n&agrave;y hoặc bất kỳ phần n&agrave;o của Thỏa thuận n&agrave;y v&agrave;o bất kỳ thời điểm n&agrave;o theo quyết định ri&ecirc;ng của m&igrave;nh khi thấy cần thiết v&agrave; hợp l&yacute; cho c&aacute;c mục đ&iacute;ch ph&aacute;p l&yacute;, quy định chung v&agrave; kỹ thuật, hoặc do những thay đổi trong dịch vụ được cung cấp hoặc bản chất hoặc bố cục của Ứng dụng n&agrave;y. Sau đ&oacute;, bạn ho&agrave;n to&agrave;n đồng &yacute; bị r&agrave;ng buộc bởi bất kỳ điều khoản v&agrave; điều kiện sửa đổi n&agrave;o như vậy.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; thể thay đổi, tạm ngừng hoặc ngừng bất kỳ kh&iacute;a cạnh n&agrave;o của dịch vụ Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave;o bất kỳ l&uacute;c n&agrave;o, kể cả t&iacute;nh khả dụng của bất kỳ t&iacute;nh năng, cơ sở dữ liệu hoặc nội dung n&agrave;o. Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh cũng c&oacute; thể &aacute;p đặt c&aacute;c giới hạn đối với một số t&iacute;nh năng v&agrave; dịch vụ hoặc hạn chế quyền truy cập của bạn v&agrave;o tất cả hoặc c&aacute;c phần của Ứng dụng n&agrave;y hoặc bất kỳ ứng dụng Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh n&agrave;o kh&aacute;c m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o hoặc chịu tr&aacute;ch nhiệm v&igrave; l&yacute; do kỹ thuật hoặc bảo mật, để ngăn chặn việc truy cập tr&aacute;i ph&eacute;p, mất m&aacute;t, hoặc ph&aacute; hủy dữ liệu hoặc theo quyết định ri&ecirc;ng của ch&uacute;ng t&ocirc;i rằng bạn đang vi phạm bất kỳ điều khoản n&agrave;o của Thỏa thuận n&agrave;y hoặc bất kỳ luật hoặc quy định n&agrave;o v&agrave; nơi quyết định ngừng cung cấp dịch vụ.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">VIỆC BẠN TIẾP TỤC SỬ DỤNG CH&Uacute;NG T&Ocirc;I B&Acirc;Y GIỜ, HOẶC SAU KHI ĐĂNG BẤT KỲ TH&Ocirc;NG B&Aacute;O N&Agrave;O VỀ BẤT KỲ THAY ĐỔI N&Agrave;O SẼ CHỈ ĐỊNH BẠN CHẤP NHẬN C&Aacute;C SỬA ĐỔI N&Oacute;.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Tổng quan</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ứng dụng n&agrave;y được điều h&agrave;nh bởi một ph&aacute;p nh&acirc;n Singapore v&agrave; Thỏa thuận n&agrave;y chịu sự điều chỉnh của luật ph&aacute;p Singapore. Theo đ&acirc;y, bạn đồng &yacute; với quyền t&agrave;i ph&aacute;n v&agrave; địa điểm duy nhất của c&aacute;c t&ograve;a &aacute;n ở Singapore v&agrave; quy định về t&iacute;nh c&ocirc;ng bằng v&agrave; thuận tiện của thủ tục tố tụng tại c&aacute;c t&ograve;a &aacute;n đ&oacute; đối với tất cả c&aacute;c tranh chấp ph&aacute;t sinh từ hoặc li&ecirc;n quan đến việc sử dụng Ứng dụng n&agrave;y. Bạn đồng &yacute; rằng tất cả c&aacute;c khiếu nại m&agrave; bạn c&oacute; thể c&oacute; đối với Du lịch Th&agrave;nh phố Hồ Ch&iacute; Minh ph&aacute;t sinh từ hoặc li&ecirc;n quan đến Ứng dụng n&agrave;y phải được x&eacute;t xử v&agrave; giải quyết tại một t&ograve;a &aacute;n c&oacute; thẩm quyền về vấn đề c&oacute; thẩm quyền tại Singapore. Việc sử dụng Ứng dụng n&agrave;y l&agrave; tr&aacute;i ph&eacute;p ở bất kỳ khu vực t&agrave;i ph&aacute;n n&agrave;o kh&ocirc;ng c&oacute; hiệu lực đối với tất cả c&aacute;c quy định của c&aacute;c điều khoản v&agrave; điều kiện n&agrave;y, bao gồm nhưng kh&ocirc;ng giới hạn ở khoản n&agrave;y. Những điều đ&atilde; n&oacute;i ở tr&ecirc;n sẽ kh&ocirc;ng &aacute;p dụng trong phạm vi luật hiện h&agrave;nh ở quốc gia bạn cư tr&uacute; y&ecirc;u cầu &aacute;p dụng luật v&agrave; / hoặc quyền t&agrave;i ph&aacute;n kh&aacute;c v&agrave; điều n&agrave;y kh&ocirc;ng thể bị loại trừ bởi hợp đồng.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Bạn đồng &yacute; rằng kh&ocirc;ng c&oacute; mối quan hệ li&ecirc;n doanh, đại l&yacute;, đối t&aacute;c hoặc việc l&agrave;m n&agrave;o tồn tại giữa bạn v&agrave; HoChiMinh City Tourism v&agrave; / hoặc c&aacute;c chi nh&aacute;nh của n&oacute; do Thỏa thuận n&agrave;y hoặc việc sử dụng Ứng dụng n&agrave;y.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Việc thực hiện Thỏa thuận n&agrave;y của ch&uacute;ng t&ocirc;i tu&acirc;n theo luật hiện h&agrave;nh v&agrave; quy tr&igrave;nh ph&aacute;p l&yacute; v&agrave; kh&ocirc;ng c&oacute; điều g&igrave; trong Thỏa thuận n&agrave;y giới hạn quyền của ch&uacute;ng t&ocirc;i trong việc tu&acirc;n thủ c&aacute;c cơ quan thực thi ph&aacute;p luật hoặc c&aacute;c y&ecirc;u cầu hoặc y&ecirc;u cầu của ch&iacute;nh phủ hoặc ph&aacute;p luật kh&aacute;c li&ecirc;n quan đến việc bạn sử dụng Ứng dụng n&agrave;y hoặc th&ocirc;ng tin được cung cấp hoặc thu thập bởi ch&uacute;ng t&ocirc;i đối với việc sử dụng như vậy. Trong phạm vi luật hiện h&agrave;nh cho ph&eacute;p, bạn đồng &yacute; rằng bạn sẽ đưa ra bất kỳ khiếu nại hoặc nguy&ecirc;n nh&acirc;n dẫn đến h&agrave;nh động n&agrave;o ph&aacute;t sinh từ hoặc li&ecirc;n quan đến việc bạn truy cập hoặc sử dụng Ứng dụng n&agrave;y trong v&ograve;ng hai (2) năm kể từ ng&agrave;y ph&aacute;t sinh hoặc t&iacute;ch lũy khiếu nại hoặc h&agrave;nh động đ&oacute; hoặc khiếu nại hoặc nguy&ecirc;n nh&acirc;n h&agrave;nh động như vậy sẽ được từ bỏ một c&aacute;ch kh&ocirc;ng thể hủy ngang.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Nếu bất kỳ phần n&agrave;o của Thỏa thuận n&agrave;y được x&aacute;c định l&agrave; kh&ocirc;ng hợp lệ hoặc kh&ocirc;ng thể thi h&agrave;nh theo luật hiện h&agrave;nh bao gồm nhưng kh&ocirc;ng giới hạn ở những tuy&ecirc;n bố từ chối tr&aacute;ch nhiệm bảo h&agrave;nh v&agrave; giới hạn tr&aacute;ch nhiệm ph&aacute;p l&yacute; n&ecirc;u tr&ecirc;n, th&igrave; điều khoản kh&ocirc;ng hợp lệ hoặc kh&ocirc;ng thể thi h&agrave;nh sẽ được thay thế bằng một điều khoản hợp lệ, c&oacute; thể thực thi ph&ugrave; hợp nhất với &yacute; định của điều khoản ban đầu v&agrave; c&aacute;c điều khoản c&ograve;n lại trong Thỏa thuận n&agrave;y sẽ tiếp tục c&oacute; hiệu lực.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Thỏa thuận n&agrave;y (v&agrave; bất kỳ điều khoản v&agrave; điều kiện n&agrave;o kh&aacute;c được đề cập ở đ&acirc;y) cấu th&agrave;nh to&agrave;n bộ thỏa thuận giữa bạn v&agrave; HoChiMinh City Tourism đối với Ứng dụng n&agrave;y v&agrave; n&oacute; thay thế cho tất cả c&aacute;c th&ocirc;ng tin li&ecirc;n lạc v&agrave; đề xuất trước đ&acirc;y hoặc đương thời, d&ugrave; l&agrave; điện tử, bằng miệng hay bằng văn bản, giữa bạn v&agrave; HoChiMinh Du lịch Th&agrave;nh phố đối với Ứng dụng n&agrave;y. Phi&ecirc;n bản in của Thỏa thuận n&agrave;y v&agrave; của bất kỳ th&ocirc;ng b&aacute;o n&agrave;o được đưa ra dưới dạng điện tử sẽ được chấp nhận trong c&aacute;c thủ tục tố tụng tư ph&aacute;p hoặc h&agrave;nh ch&iacute;nh dựa tr&ecirc;n hoặc li&ecirc;n quan đến Thỏa thuận n&agrave;y ở c&ugrave;ng một mức độ v&agrave; tu&acirc;n theo c&aacute;c điều kiện tương tự như c&aacute;c t&agrave;i liệu v&agrave; hồ sơ kinh doanh kh&aacute;c được tạo v&agrave; duy tr&igrave; ban đầu trong mẫu in.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">C&aacute;c Điều khoản v&agrave; Điều kiện n&agrave;y c&oacute; sẵn bằng ng&ocirc;n ngữ của Ứng dụng n&agrave;y. C&aacute;c điều khoản v&agrave; điều kiện cụ thể m&agrave; bạn k&yacute; kết thỏa thuận sẽ kh&ocirc;ng được lưu trữ ri&ecirc;ng bởi HoChiMinh City Tourism.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Ứng dụng n&agrave;y kh&ocirc;ng phải l&uacute;c n&agrave;o cũng c&oacute; thể được cập nhật định kỳ hoặc thường xuy&ecirc;n v&agrave; do đ&oacute;, kh&ocirc;ng bắt buộc phải đăng k&yacute; l&agrave;m sản phẩm bi&ecirc;n tập theo bất kỳ luật li&ecirc;n quan n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">T&ecirc;n hư cấu của c&aacute;c c&ocirc;ng ty, sản phẩm, con người, nh&acirc;n vật v&agrave; / hoặc dữ liệu được đề cập tr&ecirc;n Ứng dụng n&agrave;y kh&ocirc;ng nhằm đại diện cho bất kỳ c&aacute; nh&acirc;n, c&ocirc;ng ty, sản phẩm hoặc sự kiện thực sự n&agrave;o.</span></span></span></p>

<p style="text-align:justify; margin-bottom:11px"><span style="font-size:13pt"><span style="line-height:135%"><span style="font-family:&quot;Times New Roman&quot;,serif">Bất kỳ quyền lợi kh&ocirc;ng được c&ocirc;ng nhận ở đ&acirc;y đều được bảo lưu.</span></span></span></p>',
      'ABOUT_US_CONTENT_VI' => '<p>Th&agrave;nh phố Hồ Ch&iacute; Minh l&agrave; đ&ocirc; thị trẻ bởi lịch sử h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển chỉ mới hơn 300 năm.&nbsp;Được biết đến nhiều với t&ecirc;n gọi S&agrave;i G&ograve;n, Th&agrave;nh phố s&ocirc;i động n&agrave;y được v&iacute; như&nbsp;<em><strong>&ldquo;H&ograve;n ngọc Viễn Đ&ocirc;ng&rdquo;</strong></em>&nbsp;bởi những c&ocirc;ng tr&igrave;nh kiến tr&uacute;c di sản quyến rũ, kh&ocirc;ng kh&iacute; năng động, s&ocirc;i động, n&aacute;o nhiệt v&agrave; con người th&acirc;n thiện. Đ&acirc;y l&agrave; những đặc điểm gi&uacute;p Th&agrave;nh phố Hồ Ch&iacute; Minh trở th&agrave;nh một điểm đến thu h&uacute;t với du kh&aacute;ch trong nước v&agrave; quốc tế.</p>

<p>&nbsp;</p>

<p>Sự đa dạng nhiều m&agrave;u sắc, m&ugrave;i hương v&agrave; &acirc;m thanh l&agrave; những n&eacute;t đặc trưng của Th&agrave;nh phố Hồ Ch&iacute; Minh, những đặc điểm n&agrave;y gi&uacute;p Th&agrave;nh phố lu&ocirc;n được xếp hạng một trong những&nbsp;<strong>điểm đến du lịch được y&ecirc;u th&iacute;ch nhất tại Ch&acirc;u &Aacute;</strong>.</p>

<p>&nbsp;</p>

<p><img alt="" src="https://www.visithcmc.vn/uploads/0000/6/2021/08/22/hcmc-tourism-at-a-glance-1.png" /></p>

<p>Ẩm thực&nbsp;tại&nbsp;Th&agrave;nh phố&nbsp;chưa bao giờ&nbsp;l&agrave;m du kh&aacute;ch thất vọng. CNN đ&atilde;&nbsp;gọi&nbsp;Th&agrave;nh phố Hồ Ch&iacute; Minh l&agrave;&nbsp;<strong>&quot;Hương vị Việt Nam&quot;</strong>, th&agrave;nh phố&nbsp;lu&ocirc;n&nbsp;khiến du kh&aacute;ch ngạc nhi&ecirc;n với nền ẩm thực đa dạng - từ thi&ecirc;n đường ẩm thực đường phố đến những tiệm b&aacute;nh thơm ngon đầy cảm hứng, ẩm thực Việt Nam ch&iacute;nh thống v&agrave; cả những qu&aacute;n ăn&nbsp;mang phong c&aacute;ch Ch&acirc;u &Aacute; hiện đại.</p>

<p>Với nhiều trung t&acirc;m mua sắm&nbsp;nổi tiếng, điểm tham quan&nbsp;hấp dẫn, kh&aacute;ch sạn đẳng cấp thế giới v&agrave; cơ sở hạ tầng&nbsp;hiện đại&nbsp;gi&uacute;p Th&agrave;nh phố Hồ Ch&iacute; Minh&nbsp;trở&nbsp;th&agrave;nh điểm đến được y&ecirc;u th&iacute;ch của&nbsp;kh&aacute;ch du lịch&nbsp;tự t&uacute;c, c&aacute;c cặp đ&ocirc;i v&agrave; gia đ&igrave;nh.</p>

<p>Th&ecirc;m v&agrave;o&nbsp;đ&oacute;, với nhiều&nbsp;lễ hội&nbsp;sắc m&agrave;u&nbsp;v&agrave; c&aacute;c sự kiện đẳng cấp thế giới, th&agrave;nh phố n&agrave;y được&nbsp;<strong>World MICE Awards</strong>&nbsp;c&ocirc;ng nhận l&agrave;&nbsp;<strong>&ldquo;Điểm đến MICE&nbsp;h&agrave;ng đầu&nbsp;ở Ch&acirc;u &Aacute;&rdquo;</strong>&nbsp;(2020).</p>',
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
      'VISA_CONTENT_VI' => '<h4>Y&ecirc;u cầu về Visa khi đến Việt Nam</h4>

<p>Hầu hết người nước ngo&agrave;i muốn đến thăm Việt Nam cần phải xin thị thực nhập cảnh trước. Ngoại lệ duy nhất l&agrave; nếu quốc gia của bạn c&oacute; thỏa thuận l&atilde;nh sự song phương về việc miễn thị thực. Bạn c&oacute; thể kiểm tra tr&ecirc;n trang web của ch&iacute;nh phủ để biết liệu của bạn c&oacute; phải l&agrave; một trong số &iacute;t đăng k&yacute; chương tr&igrave;nh n&agrave;y hay kh&ocirc;ng. Một thay đổi gần đ&acirc;y về ch&iacute;nh s&aacute;ch đ&atilde; cho ph&eacute;p kh&aacute;ch du lịch quốc tế được miễn thị thực 30 ng&agrave;y nếu họ đến đảo Ph&uacute; Quốc bằng đường biển hoặc qua ph&ograve;ng chờ trung chuyển quốc tế tại s&acirc;n bay T&acirc;n Sơn Nhất, th&agrave;nh phố Hồ Ch&iacute; Minh. Thị thực khi đến c&oacute; sẵn th&ocirc;ng qua c&aacute;c c&ocirc;ng ty du lịch kh&aacute;c nhau v&agrave; c&aacute;c dịch vụ thị thực trực tuyến, với một khoản ph&iacute;, sẽ điền v&agrave;o c&aacute;c thủ tục giấy tờ th&iacute;ch hợp cho một thư chấp thuận thị thực. N&oacute; kh&ocirc;ng hẳn l&agrave; &ldquo;visa khi đến&rdquo; nhưng điều n&agrave;y gi&uacute;p bạn dễ d&agrave;ng hơn so với việc gửi hộ chiếu đến cơ quan l&atilde;nh sự hoặc đại sứ qu&aacute;n Việt Nam tại quốc gia của bạn. Điều n&agrave;y chỉ d&agrave;nh cho những người bay v&agrave;o trong nước, v&igrave; vậy nếu bạn nhập cảnh qua đường bi&ecirc;n giới tr&ecirc;n bộ, bạn sẽ phải đăng k&yacute; tại nước sở tại hoặc một trong c&aacute;c quốc gia c&oacute; chung bi&ecirc;n giới với Việt Nam.<br />
&nbsp;</p>

<p>&nbsp;</p>

<hr />
<h4>Chi ph&iacute; thị thực như thế n&agrave;o?</h4>

<p>Thị thực du lịch c&oacute; gi&aacute; trị trong 30 hoặc 90 ng&agrave;y v&agrave; c&oacute; thể nhập cảnh một lần hoặc nhiều lần. Ph&iacute; đ&oacute;ng dấu thay đổi từ 25 đ&ocirc; la Mỹ cho thị thực một th&aacute;ng, đến 50 đ&ocirc; la Mỹ cho thị thực ba th&aacute;ng, nhiều lần. Đối với khoản ph&iacute; &ldquo;dịch vụ nhanh&rdquo; bổ sung, bạn c&oacute; thể bỏ qua thời gian xử l&yacute; th&ocirc;ng thường từ ba đến bốn ng&agrave;y l&agrave;m việc. Kiểm tra với đại sứ qu&aacute;n hoặc l&atilde;nh sự qu&aacute;n Việt Nam tại địa phương của bạn, hoặc với đại l&yacute; du lịch hoặc dịch vụ thị thực trực tuyến.<br />
&nbsp;</p>

<p>&nbsp;</p>

<hr />
<h4><br />
T&ocirc;i sẽ được hưởng những tiện &iacute;ch mở rộng g&igrave;?</h4>

<p>Gia hạn thị thực c&oacute; sẵn với lệ ph&iacute; 10 đ&ocirc; la Mỹ nếu bạn đến trực tiếp văn ph&ograve;ng nhập cư. Tuy nhi&ecirc;n, điều n&agrave;y đ&ograve;i hỏi một số kỹ năng ng&ocirc;n ngữ địa phương v&agrave; một ch&uacute;t ki&ecirc;n nhẫn. Do đ&oacute;, hầu hết kh&aacute;ch du lịch dựa v&agrave;o c&aacute;c đại l&yacute; du lịch để giải quyết c&aacute;c phần mở rộng của họ. Điều n&agrave;y đi k&egrave;m với một khoản ph&iacute; nhưng chắc chắn tiết kiệm thời gian v&agrave; rắc rối. Hầu hết c&aacute;c đại l&yacute; du lịch đều cung cấp dịch vụ n&agrave;y với một khoản ph&iacute; v&agrave; c&oacute; thể mất đến 10 ng&agrave;y để xử l&yacute;. Thời gian gia hạn thị thực của bạn phụ thuộc v&agrave;o thị thực ban đầu của bạn. Bạn chỉ c&oacute; thể gia hạn số tiền bằng với thị thực ban đầu của m&igrave;nh - v&iacute; dụ: thị thực một th&aacute;ng chỉ c&oacute; thể được gia hạn th&ecirc;m một th&aacute;ng.</p>',
      'SAFETY_CONTENT_VI' => '<p><strong>C&aacute;c biện ph&aacute;p ph&ograve;ng ngừa về sức khoẻ v&agrave; an to&agrave;n cho kh&aacute;ch du lịch</strong></p>

<section>
<p>Du kh&aacute;ch ở Việt Nam được khuyến kh&iacute;ch thực hiện c&aacute;c biện ph&aacute;p ph&ograve;ng ngừa hợp l&yacute; đối với COVID-19 trong c&aacute;c chuyến đi.&nbsp;Tổ chức Y tế Thế giới đưa ra những thực h&agrave;nh cơ bản n&agrave;y để giữ an to&agrave;n cho bản th&acirc;n v&agrave; những người th&acirc;n của bạn:</p>

<p>1. Tr&aacute;nh đi du lịch nếu bạn bị sốt v&agrave; ho. Nếu bạn bị sốt, ho v&agrave; kh&oacute; thở, h&atilde;y th&ocirc;ng b&aacute;o cho c&aacute;c dịch vụ chăm s&oacute;c sức khoẻ v&agrave; chia sẻ với họ về lịch sử du lịch gần đ&acirc;y của bạn.</p>

<p>2. Duy tr&igrave; gi&atilde;n c&aacute;ch x&atilde; hội. Tr&aacute;nh xa những người kh&aacute;c từ một m&eacute;t trở l&ecirc;n đặc biệt l&agrave; những người đang hắt hơi, hoặc ho, hoặc bị sốt.</p>

<p>3. Thường xuy&ecirc;n rửa tay bằng x&agrave; ph&ograve;ng v&agrave; v&ograve;i nước. bạn cũng c&oacute; thể sử dụng chất khử tr&ugrave;ng tay chứa cồn để xịt tay thường xuy&ecirc;n nếu muốn.</p>

<p>4.&nbsp; Che miệng v&agrave; mũi bằng khăn giấy khi ho hoặc hắt hơi. Vứt bỏ khăn giấy bẩn ngay lập tức v&agrave; rửa tay sau khi ho hoặc hắt hơi.</p>

<p>5.&nbsp; Tr&aacute;nh tiếp x&uacute;c với động vật sống. Rửa tay bằng x&agrave; ph&ograve;ng v&agrave; nước nếu bạn chạm v&agrave;o động vật sống hoặc sản phẩm từ động vật ở chợ.</p>

<p>6. Chỉ ăn thức ăn đ&atilde; được nấu ch&iacute;n kỹ. Đảm bảo rằng c&aacute;c bữa ăn của bạn đặc biệt l&agrave; protein động vật v&agrave; c&aacute;c sản phẩm từ sữa được nấu ch&iacute;n kỹ v&agrave; chuẩn bị trong một m&ocirc;i trường hợp vệ sinh.</p>

<p>7. Bỏ khẩu trang sử dụng một lần. Nếu bạn chọn đeo khẩu trang sử dụng một lần, đảm bảo khẩu trang che mũi v&agrave; miệng của bạn, tr&aacute;nh chạm v&agrave;o khẩu trang v&agrave; rửa tay sau khi th&aacute;o khẩu trang.<br />
&nbsp;</p>

<p><strong>C&aacute;c trang web v&agrave; ứng dụng ch&iacute;nh thức về COVID-19 của ch&iacute;nh phủ Việt Nam:&nbsp;</strong></p>

<p>Kh&aacute;ch du lịch đang t&igrave;m kiếm số liệu thống k&ecirc; cập nhật về COVID-19 c&oacute; thể sử dụng ứng dụng&nbsp;<a href="https://coronavirus.app/" rel="noopener" target="_blank">Coronavirus app</a>.&nbsp;</p>

<p>Cập nhật từ ch&iacute;nh phủ Việt Nam:&nbsp;<a href="https://ncov.moh.gov.vn/">https://ncov.moh.gov.vn</a></p>

<p>Cập nhật tin tức từ Du lịch Việt Nam:&nbsp;<a href="https://vietnam.travel/media-industry">https://vietnam.travel/media-industry</a></p>
</section>

<section>
<figure><img alt="" src="https://visithcmc.vn/uploads/0000/6/2021/09/13/screen-shot-2021-09-13-at-150705.png" style="width: 2422px; height: 1476px;" /></figure>

<p>&ldquo;Bất kỳ du kh&aacute;ch n&agrave;o gặp phải c&aacute;c triệu chứng của vi r&uacute;t &ndash; như sốt, ho v&agrave; kh&oacute; thở n&ecirc;n gọi ngay cho đường d&acirc;y n&oacute;ng của Bộ Y tế Việt Nam: 1900 3228&rdquo;</p>
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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">25 đường L&ecirc; Duẩn, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38251380</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://GeneralEnquiries.Vietnam@fco.gov.uk/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">GeneralEnquiries.Vietnam@fco.gov.uk</span></span></span></a></span></span></span></span></p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Ấn Độ</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">5 đường Nguyễn Đ&igrave;nh Chiểu, Phường 6, Quận 3</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Ph&ograve;ng 1002 The Metropolitan, 235 đường Đồng Khởi, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">41 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">45 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38297350</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://cubacons@hcm.fpt.vn/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">cubacons@hcm.fpt.vn</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Đức</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Lầu 4, Deustches Haus, 33 L&ecirc; Duẩn, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">29 đường L&ecirc; Duẩn, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38235932</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://hcm@minbuza.nl/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">hcm@minbuza.nl</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">H&agrave;n Quốc</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">107 đường Nguyễn Du, Phường Bến Th&agrave;nh, Quận 1</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38225757</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://hcm02@mofa.go.kr/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">hcm02@mofa.go.kr</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">Hoa Kỳ</span></span></span></span></span></span></p>
			</td>
			<td colspan="3" rowspan="1">
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">4 đường L&ecirc; Duẩn, phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">22 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">18 đường Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">24 đu&ograve;ng Ph&ugrave;ng Khắc Khoan, Phường Đa Kao, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">93 đường Pasteur, Phường Bến Ngh&eacute;, Quận 1</span></span></span></span></span></span></p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">109 Nguyễn Văn Hưởng, Phường Thảo Điền, Quận 2</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">028-38299023, 028-38293132</span></span></span></span></span></span></p>

			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="color:black"><a href="http://mwhochiminh@kln.gov.my/"><span style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:blue">mwhochiminh@kln.gov.my</span></span></span></a></span></span></span></span></p>

			<p align="center" style="text-align:center">&nbsp;</p>

			<p align="center" style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td colspan="1" rowspan="2">Nhật bản</td>
			<td colspan="1" rowspan="2">
			<p style="text-align: center;">261 đường Điện Bi&ecirc;n Phủ, Phường 7, Quận 3</p>

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
			<p align="center" style="text-align:center"><span style="font-size:13pt"><span style="line-height:normal"><span style="font-family:&quot;Times New Roman&quot;,serif"><span lang="EN-US" style="font-size:11.5pt"><span style="font-family:Roboto"><span style="color:#212529">40 B&agrave; Huyện Thanh Quan, Phường 6, Quận 3</span></span></span></span></span></span></p>

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

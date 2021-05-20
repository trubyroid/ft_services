 <?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'admin' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'sql-serv' );

define('WP_HOME', 'http://192.168.99.100:5050');

define('WP_SITEURL', 'http://192.168.99.100:5050');

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'W{>1LU*w(+>v=50P`p8-{mO%@{:m*|:|k.Dqpt)vc MYOob4Ublt6OZ}2]5*2t}1');
define('SECURE_AUTH_KEY',  '-nIqf7a]g+-]95&QhUVN3vt,X#E#0&E#C80Kp2c*xHQ3F!xabVGDE0R>uDQwt%+D');
define('LOGGED_IN_KEY',    'h5g+yv^W WRQn0Pad6-wh_=Su++W^>g#b[fzW)3Uk_24@/T>+` [X9HB{Z7J>bOU');
define('NONCE_KEY',        '2B%}qC(%,3-|Sx``q r%R3YWtw`QI +)*&`u)yA2k6*<Q[O=d+K1N4Bi}~0dzs|@');
define('AUTH_SALT',        'UB)|.6~IVKo-*S,<L@.`$>sNJ5211MF>(zI8Z9{I!ReQ-6qa(9C_HQQYur;)BO&b');
define('SECURE_AUTH_SALT', 'R1M?gBx)]<WJ*Y5UK&Yhp:tlAE8uy8@YsvWt81+i0+_aFK|_S}F#_^>;l4+c38>P');
define('LOGGED_IN_SALT',   '34wg`ImgqaZ/f1?CL.8%9ypj29TyOqf7g~Q_a.kXhvjSNw9<[ub=Nbxs}g?IKQ.i');
define('NONCE_SALT',       'Z 68+z|WxcvO+P@C9<{LepQ7]g(o~P_cEeh:mdcP4NTM3eWH6JT~:(S&U>U-U29m');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

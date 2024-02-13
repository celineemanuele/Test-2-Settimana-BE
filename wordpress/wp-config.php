<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'wp_test' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9vRJ@+Op5O=xB;ZW_]A#M91y{lL6b7Q4|`5Lsf$v{KQ@-i|(wt*12T2tbUn|+Qkq' );
define( 'SECURE_AUTH_KEY',  '(qtIsbdwFB-j&$5/5:_>fVKP^CH&uk6Y2=^itRT<Ww^O`U#]GAGciuY|zH]K=>3e' );
define( 'LOGGED_IN_KEY',    'E_}1q:m(6cNn^?CdGSk<=fFg:i$WjetlgjyoV!@,7)]z>~^PX%]T,N6;Q<!L*$%$' );
define( 'NONCE_KEY',        ';G`sB;{O#>o`MEIqZ/$67qNv+SaC~->oUsy!6Gd_QHXR$3%5l]yKoDokrCXYuh09' );
define( 'AUTH_SALT',        '7#GnE,,f(Ix!Wu-N1Qp?MnIgSSwbzXX8MVjVd/mkpVW<1q.$s^,-*z$+idf3swns' );
define( 'SECURE_AUTH_SALT', '0be.:n,|IbR3y>M/M1a.<m.[_v3nXgu9Xd{$B7]<[SW`e24&cbO/MN}CEoSzH:i+' );
define( 'LOGGED_IN_SALT',   '&R&O+ZDNesP8/vAAVB3M1mR8_;-5Luyzrs~9h<_qlY,jx2T)c@?A.*;;:^!_W`bd' );
define( 'NONCE_SALT',       'C*2a` 1hfni5>FXaDqe*D|n??FSSQ.@6J|}HAR&s9gQJ]F_5kIB2F#u*h1gf/KOo' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */



/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';

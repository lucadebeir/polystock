<?php
class File {

	public static function build_path($path_array) {
		// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
		// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
        $d_s = DIRECTORY_SEPARATOR;
        $ROOT_FOLDER = __DIR__ . "/..";
        return $ROOT_FOLDER . $d_s . join($d_s, $path_array);
	}
}

?>
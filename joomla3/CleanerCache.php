<?php
/**
 * Usuwa Cache wybrany
 *
 * @author Piotr Kuźnik <piotr.damian.kuznik@gmail.com>
 * @version 0.1
 * @license GNU
 */
final class CleanerCache{

	/**
	 * Tablica z ścieżkami do usuniecia
	 */
	protected $location = array();

	protected function clear( $path) {
	    $dir = new DirectoryIterator( $path);
	    foreach ($dir as $fileinfo) {
	        if ($fileinfo->isFile() || $fileinfo->isLink()) {
	            unlink($fileinfo->getPathName());
	        } elseif (!$fileinfo->isDot() && $fileinfo->isDir()) {
	            $this->clear($fileinfo->getPathName());
	        }
	    }
	    rmdir($path);
 	}

 	/**
 	 * @param $src Path remove
 	 */
 	public function addPath($src){
 		$this->location[] = $src;
 	}

 	/**
 	 * Start cleaner
 	 */
 	public function run(){
 		foreach ($this->location as $path) {
 			if ( file_exists($src) == FALSE){
 				continue;
 			}
 			$this->clear($src);
 		}
 	}

}

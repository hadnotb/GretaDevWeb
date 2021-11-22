<?php 

namespace App\Avatar;

use Symfony\Component\Filesystem\Filesystem;

class AvatarHelper {

    public const AVATAR_FOLDER = 'avatars';

    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {   
        $this->filesystem = $filesystem;
    }

    public function saveSvg($svg){
        
        // $dir = 'avatar';
        // if(!file_exists($dir) && !is_dir($dir)){
        //    mkdir($dir); 
        // }
        
       
        // $uniqID = sha1(uniqid(mt_rand(),true));

        // $fp = fopen('avatar/'.$uniqID.'.svg','w');
        // fwrite($fp,$svg);
        $filename = sha1(uniqid(mt_rand(), true)) . '.svg';
        $filepath = self::AVATAR_FOLDER . '/' . $filename;

        $this->filesystem->mkdir(self::AVATAR_FOLDER);
        $this->filesystem->touch($filepath);
        $this->filesystem->appendToFile($filepath, $svg);

        return $filename;
    }

    public function ddlSvg(){

        header('Content-Description: File Transfer');
        header('Content-Type: img/svg+xml');
        header('Content-Disposition: attachment; filename=avatar.svg');
        

    }
}
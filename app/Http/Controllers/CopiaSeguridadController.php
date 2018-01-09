<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Artisan;
use Laracasts\Flash\Flash;
use Log;
use Storage;
use Carbon\Carbon;

class CopiaSeguridadController extends Controller
{
    const PRECISION = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function fnc_tamanio_copia($bytes, $precision = null) {
        
	    if (null===$precision) $precision = self::PRECISION;
	    $units = array('b', 'kb', 'Mb', 'Gb', 'Tb');
	    $bytes = max($bytes, 0);
	    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
	    $pow = min($pow, count($units) - 1);
	  
	    $bytes /= pow(1024, $pow);
	  
	    return number_format($bytes, $precision, ',', '.') . ' ' . $units[$pow]; 
	}
    public function  fnc_listado_copia(){
        //
        
        $disk = Storage::disk('copia');
        $files = $disk->files(config('laravel-backup.backup.name'));
        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('laravel-backup.backup.name') . '/', '', $f),
                    'file_size' => $this->fnc_tamanio_copia($disk->size($f)),
                    'last_modified' =>date('d/m/Y H:i:s',strtotime(Carbon::createFromTimestamp($disk->lastModified($f)))),
                ];
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        
        return view("copia_seguridad/copia_seguridad")->with(compact('backups'));
        
    }

    public function fnc_crear_copia(){
        //Crear copia de seguridad del código fuente y la base de datos 
        try {
           Artisan::call('backup:run');
           $output = Artisan::output();
            // Bitacora de sucesoso
            Flash::success('Copía de seguridad creada');
            return redirect()->back();
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect()->back();
        }
    }

     public function fnc_descargar_copia($file_name)
    {
        $file = config('laravel-backup.backup.name') . '/' . $file_name;
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
    public function fnc_borrar_copia($file_name)
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists(config('laravel-backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('laravel-backup.backup.name') . '/' . $file_name);
            return redirect()->back();
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

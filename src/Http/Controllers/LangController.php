<?php

namespace I9w3b\Lang\Http\Controllers;

use I9w3b\Lang\Lang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class LangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(config('lang.middleware'));
    }

    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    protected function manageLanguageRd()
    {
        if (session()->get('locale')) {
            $lg = str_replace('-', '_', session()->get('locale'));
        } else {
            $lg = str_replace('-', '_', config('app.locale'));
        }
        return route('manage.language', [$lg]);
    }

    public function createNewLang($newLang)
    {
        $Filesystem = new Filesystem();
        $langCode = $newLang;
        $langDir = base_path() . '/resources/lang';
        $dir = $langDir;
        if (!is_dir($dir)) {
            mkdir($dir);
            chmod($dir, 0777);
        }
        $dir = $dir . '/' . $langCode;
        $cpJf = config('lang.copy_default_json', __DIR__ . '/../../Resources/lang/pt_BR.json');
        $cpDt = config('lang.copy_default_dir', __DIR__ . '/../../Resources/lang/pt_BR');
        if (!is_dir($dir)) {
            mkdir($dir);
            chmod($dir, 0777);
            $jsonFile = $dir . ".json";
            File::copy($cpJf, $jsonFile);
            $Filesystem->copyDirectory($cpDt, $dir . "/");
        } else {
            if (!is_file($dir . '/lang.php') || !is_file($langDir . '/' . $langCode . '.json')) {
                if (!is_file($dir . '/lang.php')) {
                    File::copy($cpDt.'/lang.php', $dir . '/lang.php');
                }
                if (!is_file($langDir . '/' . $langCode . '.json')) {
                    File::copy($cpJf, $langDir . '/' . $langCode . '.json');
                }
            }
        }
        return route('manage.language', [$newLang]);
    }

    public function manageLanguage($lang = null)
    {
        if (!$lang) {
            return redirect($this->manageLanguageRd());
        }
        $currantLang = $lang;
        $languages = Lang::languages();
        $fileData = null;
        $dir = base_path() . '/resources/lang/' . $currantLang;
        if (!is_dir($dir) || !is_file($dir . '/lang.php') || !is_file($dir . '.json')) {
            $this->createNewLang($currantLang);
        }
        $arrLabel = json_decode(file_get_contents($fileData ?? $dir . '.json'));
        $arrFiles = array_diff(
            scandir($dir), array(
                '..',
                '.',
            )
        );
        $arrMessage = [];
        foreach ($arrFiles as $file) {
            $fileName = basename($file, ".php");
            $fileData = $myArray = include $dir . "/" . $file;
            if (is_array($fileData)) {
                $arrMessage[$fileName] = $fileData;
            }
        }
        return view('multilingual::lang.index', compact('languages', 'currantLang', 'arrLabel', 'arrMessage'));
    }

    public function createLanguage()
    {
        return view('multilingual::lang.create');
    }

    public function storeLanguageData(Request $request, $currantLang)
    {
        $Filesystem = new Filesystem();
        $dir = base_path() . '/resources/lang';
        if (!is_dir($dir)) {
            mkdir($dir);
            chmod($dir, 0777);
        }
        $jsonFile = $dir . "/" . $currantLang . ".json";
        if ($request->flab && $request->label !== null) {
            file_put_contents($jsonFile, json_encode($request->label));
        }
        $langFolder = $dir . "/" . $currantLang;
        if (!is_dir($langFolder)) {
            mkdir($langFolder);
            chmod($langFolder, 0777);
        }
        if (!empty($request->message)) {
            foreach ($request->message as $fileName => $fileData) {
                $content = "<?php return [";
                $content .= $this->buildArray($fileData);
                $content .= "];";
                file_put_contents($langFolder . "/" . $fileName . '.php', $content);
            }
        }
        return redirect()->route('manage.language', [$currantLang])->with('status', __('Changes Saved Successfully!'));
    }

    public function storeLanguage(Request $request)
    {
        $Filesystem = new Filesystem();
        $langCode = $request->code;
        $langDir = base_path() . '/resources/lang';
        $dir = $langDir;
        if (!is_dir($dir)) {
            mkdir($dir);
            chmod($dir, 0777);
        }
        $dir = $dir . '/' . $langCode;
        if (!is_dir($dir)) {
            mkdir($dir);
            chmod($dir, 0777);
            $jsonFile = $dir . ".json";
            File::copy(__DIR__ . '/../../Resources/lang/pt_BR.json', $jsonFile);
            $Filesystem->copyDirectory(__DIR__ . '/../../Resources/lang/pt_BR', $dir . "/");
            return redirect()->route('manage.language', [$langCode])->with('status', __('Language Created Successfully!'));
        }else{
            return redirect()->back()->with('status', __('Language already exists!') . ' ' . $langCode);
        }
    }

    public function buildArray($fileData)
    {
        $content = "";
        foreach ($fileData as $lable => $data) {
            if (is_array($data)) {
                $content .= "'$lable'=>[" . $this->buildArray($data) . "],";
            } else {
                $content .= "'$lable'=>'" . addslashes($data) . "',";
            }
        }
        return $content;
    }
}


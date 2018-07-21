<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\Acknowledge;


class PagesController extends Controller
{

    public function index(Request $request, $slug = 'index')
    {
        $page = Page::where('slug', $slug)->first();
        
        if (!$page) {
            if (substr($slug, 0, 14) == 'salle-de-bain-') {
                return app('App\Http\Controllers\Front\StoresController')->view(substr($slug, 14));
            } else {
                abort(404);
            }
        }

        return view($page->template, compact('page', 'slug'));
    }

    public function contact(Request $request)
    {
        // get Request
        $input = $request->all();

        $civility = $input['civility'];
        $name = $input['name'];
        $firstName = $input['first_name'];
        $phone = $input['phone'];
        $address = $input['address'];
        $zipId = $input['zip'];
        $city = $input['city'];
        $emailInfo = $input['email'];
        $message = $input['message'];
        $postCode = $input['post_code'];

        // get store by zip id
        $store = Store::find($zipId);

        $email = '';
        $emailCopy = '';

        if ($store) {
            $email = $store->email;
            $emailCopy = $store->email_copy;
        }

        // set array
        $infoContact = [
            'civility' => $civility, 
            'name' => $name, 
            'firstName' => $firstName, 
            'phone' => $phone, 
            'address' => $address, 
            'zipId' => $zipId, 
            'city' => $city, 
            'emailInfo' => $emailInfo,
            'message' => $message,
            'postCode' => $postCode
        ];

        $fallbackEmail = env('FALLBACK_EMAIL_ADDR', 'contact@aufildubain.fr');

        $spamScore = $this->sblamtestpost(['name', 'email', 'address', 'message'], 'UAtjaZnDBL9Rip2Ap6');

        if ($spamScore != 2) {

            if (empty($email) && empty($emailCopy)) {
                Mail::to($fallbackEmail)->send(new ContactForm($infoContact));
            } else {
                $emails = [];
                if (!empty($email)) $emails[] = $email;
                if (!empty($emailCopy)) $emails[] = $emailCopy;

                if (count($emails) < 2) {
                    Mail::to($email)->send(new ContactForm($infoContact));
                } else {
                    Mail::to($email)->cc($emailCopy)->bcc($fallbackEmail)->send(new ContactForm($infoContact));
                }
            }
            
            if (!empty($emailInfo)) 
                Mail::to($emailInfo, $name)->send(new Acknowledge($infoContact));
        }
        // var_dump($_POST);
        // var_dump($spamScore); die();
        
        return view('front.mail.success');
    }

    private function sblamtestpost($fieldnames = NULL, $apikey = NULL)
    {
        global $_sblam_last_id, $_sblam_last_error;
        $_sblam_last_id=$_sblam_last_error=NULL;

        if (!count($_POST)) return NULL;

        if (NULL === $apikey) $apikey = "default";
        $in = array(
         'uid' => $this->_sblamserveruid(),
         'uri' => empty($_SERVER['REQUEST_URI'])?$_SERVER['SCRIPT_NAME'].'?'.$_SERVER['QUERY_STRING']:$_SERVER['REQUEST_URI'],
         'host'=> empty($_SERVER['HTTP_HOST'])?$_SERVER['SERVER_NAME']:$_SERVER['HTTP_HOST'],

         'ip'    => $_SERVER['REMOTE_ADDR'],
         'time'=> time(),

         'cookies'=> count($_COOKIE)?1:0,
         'session'=> isset($_COOKIE[session_name()])?1:0,
         'sblamcookie'=> isset($_COOKIE['sblam_'])?$_COOKIE['sblam_']:'',

         'salt'=>'x'.mt_rand().time(),
        );

        if (is_array($fieldnames)) foreach($fieldnames as $key => $val)
            $in['field_'.$key] = $val;

        foreach($_POST as $key => $val)
            $in['POST_'.$key] = stripslashes(is_array($val)?implode("\n",$val):$val);

        if (function_exists("getallheaders"))
        foreach(getallheaders() as $header => $val)
        {
            $in['HTTP_'.strtr(strtoupper($header),"-","_")] = $val;
        }
        else foreach($_SERVER as $key => $val)
        {
            if (substr($key,0,5) !== 'HTTP_') continue;
            $in[$key] = stripslashes($val);
        }
        unset($in['HTTP_COOKIE']);
        unset($in['HTTP_AUTHORIZATION']);
        // var_dump($in);
        $data = '';
        foreach($in as $key => $val)
            $data .= strtr($key,"\0"," ")."\0".strtr($val,"\0"," ")."\0";

        if (strlen($data) > 300000) return 0;

        if ($compress = (strlen($data) > 5000 && function_exists('gzcompress'))) $data = gzcompress($data,1);

        if (function_exists('fsockopen'))
        {
            $hosts = array('api.sblam.com','api2.sblam.com');
            foreach($hosts as $host)
            {
                $request    = "POST / HTTP/1.1\r\n" .
                "Host:$host\r\n" .
                "Connection:close\r\n" .
                "Content-Type:application/x-sblam;sig=".md5("^&$@$2\n$apikey@@").md5($apikey . $data).($compress?";compress=gzip":'')."\r\n" .
                "Content-Length:" . strlen($data) . "\r\n".
                "\r\n".$data;

                $fs = @fsockopen($host, 80, $errn, $errs, 5);
                if ($fs !== false && function_exists('stream_set_timeout')) stream_set_timeout($fs, 15);
                if ($fs !== false && fwrite($fs, $request))
                {
                    $response = '';
                    while(!feof($fs))
                    {
                        $response .= fread($fs,1024);
                        if (preg_match('!\r\n\r\n.*\n!',$response)) break;
                    }
                    fclose($fs);
                    if (preg_match('!HTTP/1\..\s+(\d+\s+[^\r\n]+)\r?\n((?:[^\r\n]+\r?\n)+)\r?\n(.+)!s',$response,$out))
                        if (intval($out[1]) == 200)
                            if (preg_match('!^(-?\d+):([a-z0-9-]{0,42}):([a-z0-9]{32})!',$out[3],$res))
                                if (md5($apikey . $res[1] . $in['salt']) === $res[3])
                                {
                                    $_sblam_last_id = $res[2];
                                    return $res[1];
                                }
                                else trigger_error($_sblam_last_error.="Sblam: Rezultat od serwera $host ma niepoprawny podpis\n");
                            else trigger_error($_sblam_last_error.="Sblam: Awaria serwera $host. Otrzymany rezultat ma niepoprawny format ".htmlspecialchars($out[3])."\n");
                        else trigger_error($_sblam_last_error.="Sblam: Komunikat serwera $host: ".htmlspecialchars(substr($out[1],0,80))."\n");
                    else trigger_error($_sblam_last_error.="Sblam: Niepoprawny rezultat otrzymany od serwera $host\n");
                }
                else trigger_error($_sblam_last_error.="Sblam: Problem komunikacji z serwerem $host - $errn:$errs\n");
            }
        }
        else trigger_error($_sblam_last_error.="Sblam: Brak wymaganego rozszerzenia sockets (fsockopen)\n");
        return 0;
    }

    /** Funkcja pomocnicza dla Sblam!, która generuje identyfikator serwera (nie używaj) */
    private function _sblamserveruid()
    {
        return md5(phpversion() . $_SERVER['HTTP_HOST'] . __FILE__);
    }

    /** Podaje URL pod którym użytkownik może zgłosić błąd filtru. */
    private function sblamreporturl()
    {
        global $_sblam_last_id;
        return "http://sblam.com/report/$_sblam_last_id";
    }

    /** Zwraca ostatni komunikat o błędzie lub NULL, jeśli sprawdzanie odbyło się bezbłędnie
            Wtyczka próbuje komunikacji z kilkoma serwerami, więc może zainstnieć sytuacja, że post zostanie sprawdzony mimo błędów.
    */
    private function sblamlasterror()
    {
        global $_sblam_last_error;
        return $_sblam_last_error;
    }

}

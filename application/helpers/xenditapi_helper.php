<?php
/*
 *  __________________________________________________
 * |                                                  |
 * |                Dont edit directly                |
 * |                   Supported by:                  |
 * |              @simasta (+6285643213043)           |
 * |                  masta@siini.com                 |
 * |__________________________________________________|
 * 
 */


use Xendit\Xendit;
class XenditApi
{
    public function __construct($O0380 = array())
    {
        $this->xendit_config = $O0380;
        require FCPATH . "\166\145\x6e\x64\x6f\162\57\x61\x75\164\157\x6c\157\141\144\56\x70\150\x70";
        Xendit::setApiKey($O0380["\x61\160\x69\137\x6b\145\x79"]);
    }
    public function write_log($O5936, $O3244 = "\111\116\x46\117", $O9531 = "\154\x6f\x67")
    {
        $O2303 = APPPATH . "\57\154\x6f\147\163\x2f" . $O9531 . "\x2d" . date("\167") . "\56\x6c\157\x67";
        if (file_exists($O2303)) {
            if (date("\x59\155\x64") != date("\x59\155\144", filemtime($O2303))) {
                file_put_contents($O2303, '');
            }
        }
        $O1903 = date_default_timezone_get();
        date_default_timezone_set("\x41\163\151\x61\x2f\112\141\x6b\x61\162\x74\x61");
        $O2019 = strtoupper($O3244) . "\72\40" . $O5936;
        @file_put_contents($O2303, date("\x48\151\x73") . "\40" . $O2019 . PHP_EOL, FILE_APPEND);
        date_default_timezone_set($O1903);
    }
    public function get_sample()
    {
        $O1114 = array("\151\x64" => null, "\x75\x73\x65\x72\x5f\151\x64" => 34, "\x64\x72\x69\166\x65\x72\x5f\151\144" => 28, "\144\162\x69\166\x65\162\x5f\x6e\141\x6d\x65" => "\104\162\151\x76\145\x72\x20\x54\x61\x6e\147\145\162\x61\x6e\147", "\160\x72\x6f\x64\x75\143\x74\137\151\144" => 5, "\x70\x72\x6f\x64\x75\x63\x74\137\156\141\x6d\x65" => "\x74\x65\163\164", "\x6f\x72\x64\x65\x72\x5f\x69\x64" => "\62\x31\x38\65\x36\x37\x33", "\x6f\162\x64\x65\x72\x5f\160\157\x69\x6e\x74" => 70000, "\153\157\144\x65\x5f\164\x72\141\156\x73\141\153\x73\151" => "\144\145\155\157\55" . time(), "\x70\141\163\163\x65\x6e\x67\145\x72\137\156\141\x6d\x65" => "\101\x78\145\x6c", "\x70\x61\x73\163\145\156\147\x65\162\x5f\160\150\157\156\x65" => "\60\x38\x31\62\71\x38\64\71\70\x32\65\x39", "\160\x61\x73\x73\145\x6e\147\x65\x72\x5f\145\x6d\141\x69\x6c" => "\x61\x78\145\x6c\100\x67\x6d\141\x69\x6c\x2e\143\157\x6d\x65", "\x6b\x6f\164\141\137\x69\x64" => 5, "\x6b\157\x74\141\137\156\x61\x6d\x65" => "\x54\141\156\147\145\x72\141\156\147", "\155\x6f\x62\x69\x6c\x5f\151\x64" => 6, "\x6d\157\142\x69\x6c\137\x6e\x61\155\x65" => "\124\x6f\x79\x6f\164\x61\x20\111\156\156\x6f\166\x61", "\160\141\153\145\164\137\151\x64" => 1, "\x70\x61\153\145\164\137\x6e\x61\155\x65" => "\61\62\40\x4a\x61\x6d\x20\x44\x61\x6c\141\x6d\x20\x4b\157\x74\141", "\141\x6c\x61\155\x61\x74\137\152\x65\x6d\x70\165\x74" => "\x73\x61\x64\141\x73\x64\x61\x73", "\164\x61\156\147\147\141\x6c\x5f\152\145\x6d\x70\165\x74" => "\62\65\40\112\141\156\x75\141\x72\x79\x20\62\60\x32\x32", "\x6a\141\x6d\x5f\x6a\145\155\160\x75\x74" => "\60\x35\72\x30\60", "\160\x65\162\155\x69\156\164\x61\141\x6e\x5f\x6b\x68\x75\x73\165\x73" => "\141\163\x64\141\x73", "\154\141\155\x61\x5f\x73\145\167\141" => 1, "\152\x75\x6d\x6c\141\x68\x5f\x6d\157\x62\x69\154" => 1, "\x6b\145\x74\145\x6e\164\x75\141\x6e\x5f\x64\x65\163\x63" => "\74\x75\x6c\x3e\x3c\x6c\x69\x3e\x42\x61\164\x61\x73\x20\x70\x65\155\x61\x6b\141\x69\141\156\x20\61\62\x20\x4a\x61\x6d\x3c\x2f\x6c\151\x3e\x3c\x6c\x69\76\150\141\x72\x67\141\x20\x73\x75\x64\141\x68\x20\x74\145\x72\x6d\141\163\165\x6b\x20\x64\162\x69\166\145\162\54\40\144\151\x6c\165\141\162\40\x62\x69\141\171\141\40\x74\157\154\x6c\x2c\40\160\x61\x72\153\x69\162\40\x64\141\156\40\x75\141\x6e\x67\40\155\x61\x6b\x61\156\40\144\x72\151\166\x65\x72\x20\x35\x30\x2e\x30\x30\60\x3c\x2f\x6c\x69\76\74\57\165\154\76", "\160\141\x6b\x65\164\137\x64\x65\163\x63" => "\74\160\x3e\102\141\x74\141\x73\40\x70\145\156\x67\147\165\x6e\x61\x61\x6e\x20\x64\151\40\x61\162\x65\141\40\x74\x61\156\x67\145\x72\141\156\x67\54\x20\152\x69\153\141\40\153\145\154\165\141\x72\x20\141\162\145\x61\40\164\x61\x6e\x67\x65\162\141\156\x67\x20\141\153\x61\156\40\144\151\153\145\156\141\153\x61\x6e\40\142\151\141\171\141\x20\x74\141\155\x62\141\150\141\x6e\40\154\165\141\162\40\153\157\164\141\x3c\57\160\76", "\x6f\162\151\147\x69\x6e" => NULL, "\144\x65\x73\x74\151\x6e\141\164\x69\x6f\156" => NULL, "\152\141\162\141\153" => 0, "\x73\x74\141\x72\x74\137\160\x72\x69\x63\145" => 700000, "\x74\157\164\141\x6c\x5f\x70\x72\x69\x63\x65" => 700000, "\144\x69\x73\x6b\157\x6e\137\x70\157\151\156\x74" => 140000, "\160\x72\157\155\157\137\x61\155\157\x75\x6e\x74" => 0, "\x67\162\x61\x6e\x64\137\164\157\164\141\154" => 560000, "\163\x74\141\164\x75\163" => "\123\145\x6c\145\x73\141\151", "\x73\x74\141\x74\x75\163\x5f\162\145\141\144" => 1, "\x6f\162\x64\x65\162\137\x74\x79\x70\145" => "\104\141\151\154\x79", "\160\145\x6d\x62\141\x79\141\162\x61\x6e\x5f\151\x64" => 0, "\160\145\x6d\x62\x61\171\141\x72\x61\x6e" => "\124\162\141\156\163\x66\145\x72", "\163\164\141\x74\165\163\x5f\160\145\155\x62\x61\171\141\162\x61\156" => "\114\165\156\141\x73", "\156\157\x5f\x76\141" => '', "\x65\x78\x70\151\162\x65\144\x5f\x70\x61\x79\155\145\156\x74\x5f\x64\141\164\x65" => NULL, "\x70\141\x79\155\x65\x6e\x74\x5f\143\150\x61\156\156\145\x6c" => '', "\x70\141\x79\x6d\145\x6e\164\x5f\x74\162\141\156\x73\141\x63\164\151\x6f\x6e\x5f\151\x64" => '', "\x73\164\141\x67\145" => 4, "\144\141\x74\145\137\x63\x72\x65\141\164\145\x64" => "\62\60\x32\62\55\60\61\55\62\64\40\x32\60\x3a\62\61\x3a\x34\x31", "\144\141\164\145\x5f\x75\x70\x64\141\164\x65\x64" => "\x30\60\60\x30\x2d\x30\x30\x2d\60\x30\40\60\x30\x3a\x30\60\x3a\x30\x30");
        $O1114["\160\x61\x79\155\x65\156\x74\137\143\x68\141\x6e\156\145\154"] = isset($_GET["\137\137\x63\150\141\156\x6e\x65\x6c"]) ? $_GET["\x5f\137\143\x68\141\x6e\156\145\x6c"] : "\x56\x49\x52\x54\x55\x41\x4c\137\101\103\x43\x4f\125\x4e\x54";
        $O1114["\160\x61\171\x6d\145\x6e\164\x5f\x63\x6f\144\x65"] = isset($_GET["\137\x5f\x63\157\144\x65"]) ? $_GET["\137\137\x63\x6f\144\145"] : "\x42\122\111";
        $O1114["\x70\x61\x79\155\145\156\164\x5f\143\x68\x61\x6e\156\145\x6c"] = "\x56\111\x52\124\x55\101\114\137\101\103\x43\x4f\x55\116\124";
        $O1114["\160\141\171\155\x65\x6e\x74\137\x63\x6f\144\x65"] = "\102\x52\x49";
        return $O1114;
    }
    public function set_callback_urls()
    {
        $O4122 = array("\146\x76\141\x5f\x73\164\x61\x74\165\163", "\146\166\x61\137\160\x61\x69\144", "\162\x6f\137\x66\x70\x63\137\160\141\151\144", "\x69\156\x76\x6f\151\x63\145", "\145\167\141\x6c\154\x65\x74", "\x70\141\x79\x6d\x65\x6e\164\137\155\x65\x74\x68\157\x64", "\x64\x69\x72\x65\143\x74\137\144\145\142\x69\164", "\x72\x65\x67\151\x6f\x6e\141\x6c\x5f\162\x6f\137\160\141\151\x64", "\144\x69\163\142\x75\162\x73\x65\x6d\x65\x6e\164", "\x70\150\137\x64\x69\x73\x62\x75\x72\163\x65\x6d\145\156\x74", "\x62\141\164\143\150\x5f\x64\151\x73\142\165\x72\163\145\x6d\x65\x6e\x74", "\157\166\x6f\x5f\x70\141\x69\144");
        foreach ($O4122 as $O3244) {
            $O7832 = array("\165\x72\x6c" => $this->xendit_config["\143\141\x6c\154\x62\x61\x63\153\137\x75\162\x6c"] . "\x3f\x74\171\x70\x65\x3d" . $O3244);
            $O9557 = $O3244;
            $O1079 = \Xendit\Platform::setCallbackUrl($O9557, $O7832);
            var_dump($O1079);
            O0517:
        }
        O6898:
    }
    public function gen_payment_status($O6214)
    {
        switch ($O6214) {
            case "\120\x45\116\x44\111\116\107":
                $O7813 = "\x42\145\154\165\155\x20\x44\151\x62\141\171\x61\162";
                goto O9833;
            case "\101\103\x54\111\x56\x45":
                $O7813 = "\102\x65\154\165\155\x20\104\x69\x62\x61\171\x61\162";
                goto O9833;
            case "\x49\116\101\x43\x54\111\x56\x45":
                $O7813 = "\x44\x69\142\x61\164\141\154\153\141\156";
                goto O9833;
            case "\103\x4f\x4d\120\114\x45\x54\x45\x44":
                $O7813 = "\x4c\165\156\141\x73";
                goto O9833;
            case "\120\101\111\104":
                $O7813 = "\114\165\x6e\141\x73";
                goto O9833;
            case "\x45\130\x50\111\122\105\x44":
                $O7813 = "\x44\151\x62\141\164\141\154\153\x61\x6e";
                goto O9833;
            default:
                if ($O6214) {
                    $O7813 = ucfirst($O6214);
                } else {
                    $O7813 = "\x42\x65\x6c\165\155\40\104\151\x62\x61\x79\x61\162";
                }
                goto O9833;
        }
        O1134:
        O9833:
        return $O7813;
    }
    public function call_api_redirect($O1114)
    {
        goto O7576;
        O6423:
        if ($O1625) {
            $O5644 = array("\163\165\143\x63\x65\x73\163" => false, "\162\x65\141\x73\157\x6e" => $O1625);
        } else {
            $O5644 = array("\163\x75\143\143\x65\x73\x73" => true, "\x64\141\x74\141" => $O0671);
        }
        return $O5644;
        goto O1183;
        O4496:
        $O1793->setTimezone(new DateTimeZone("\x55\x54\x43"));
        $O1625 = false;
        $O0671 = array();
        try {
            $O0671 = \Xendit\Invoice::create($O7896);
        } catch (\Xendit\Exceptions\ApiException $O5632) {
            if (isset($_GET["\137\x5f\x64\145\x62\x75\147"])) {
                echo "\x3c\x70\x72\145\x3e";
                print_r($O7896);
                print_r($O5632);
                echo "\74\x2f\160\162\145\76";
            }
            $O1625 = $O5632->getErrorCode();
        }
        if (isset($O0671["\x65\x78\x70\x69\162\x79\x5f\144\x61\164\145"]) && $O0671["\145\x78\x70\151\x72\171\x5f\x64\141\x74\145"]) {
            $O8837 = date_default_timezone_get();
            date_default_timezone_set("\x41\x73\151\141\57\112\141\153\x61\x72\164\141");
            $O0671["\x65\170\160\151\x72\x79\137\x64\x61\x74\145"] = date("\x59\55\155\55\x64\x20\x48\72\151\x3a\x73", strtotime($O0671["\x65\170\160\x69\x72\171\137\x64\141\164\145"]));
            date_default_timezone_set($O8837);
        }
        goto O6423;
        O7576:
        $O7896 = array("\145\170\164\145\162\x6e\141\154\137\151\144" => $O1114["\x6b\157\144\145\137\164\x72\141\156\x73\141\153\x73\151"], "\141\x6d\157\x75\156\x74" => $O1114["\x67\x72\141\x6e\x64\137\x74\x6f\164\141\154"], "\x64\x65\x73\x63\x72\x69\160\164\151\157\156" => "\111\156\166\x6f\151\x63\145\x20\157\x72\x64\x65\x72\40\43" . $O1114["\x6b\157\x64\145\x5f\164\162\141\156\163\x61\153\x73\151"], "\x69\156\x76\x6f\x69\143\145\x5f\x64\x75\162\x61\164\x69\x6f\156" => isset($this->xendit_config["\151\156\x76\157\151\143\145\x5f\x65\x78\x70\x69\162\x65\x64"]) ? $this->xendit_config["\x69\156\166\x6f\x69\x63\x65\x5f\145\x78\160\151\162\x65\144"] : 86400, "\x63\165\163\x74\157\155\x65\162" => array("\147\151\x76\145\x6e\x5f\x6e\141\x6d\145\163" => $O1114["\160\141\163\163\x65\x6e\x67\145\x72\x5f\156\x61\x6d\x65"], "\145\x6d\x61\151\154" => $O1114["\x70\141\163\x73\145\156\147\145\x72\137\145\155\x61\x69\x6c"], "\x6d\157\x62\x69\154\145\x5f\x6e\x75\x6d\x62\145\162" => $O1114["\x70\141\x73\x73\x65\x6e\147\x65\162\x5f\x70\x68\157\156\x65"], "\141\144\x64\x72\x65\163\x73" => array(array("\x63\151\164\x79" => $O1114["\153\x6f\x74\x61\x5f\x6e\x61\155\145"], "\143\157\x75\x6e\x74\x72\x79" => "\111\156\x64\x6f\x6e\145\x73\x69\x61", "\x73\x74\x72\x65\145\x74\x5f\x6c\151\x6e\x65\x31" => $O1114["\x61\154\141\155\141\164\137\152\145\155\x70\165\x74"]))), "\143\165\x72\162\x65\x6e\x63\x79" => "\x49\x44\x52", "\151\164\145\x6d\x73" => array(array("\156\141\155\145" => "\x52\x65\x6e\x74\x61\x6c\40" . $O1114["\x6d\157\x62\151\x6c\x5f\x6e\x61\155\145"] . "\40" . $O1114["\160\141\x6b\x65\x74\137\x6e\x61\x6d\x65"], "\161\x75\141\x6e\164\x69\x74\171" => 1, "\x70\162\x69\x63\x65" => $O1114["\x74\157\x74\141\154\x5f\x70\x72\x69\x63\x65"] - $O1114["\144\x69\x73\153\x6f\156\x5f\x70\x6f\151\x6e\164"])), "\x63\x6c\151\x65\x6e\164\137\x74\x79\160\145" => "\111\116\x54\105\x47\x52\x41\x54\x49\x4f\116", "\x70\154\141\164\x66\157\162\x6d\137\x63\x61\x6c\154\x62\x61\x63\153\x5f\165\162\x6c" => $this->xendit_config["\143\141\x6c\154\x62\141\x63\x6b\x5f\165\162\154"] . "\x3f\164\x79\160\145\x3d\151\156\x76\157\x69\143\145");
        $O5641 = array();
        if (!empty($this->xendit_config["\x66\145\145\163"])) {
            $O7896["\x66\145\145\x73"] = $this->xendit_config["\x66\x65\145\163"];
        }
        if (isset($_GET["\x5f\x5f\x64\145\166\x65\x6c"])) {
            $O1114 = $this->get_sample();
        }
        $O1793 = new DateTime();
        goto O4496;
        O1183:
    }
}
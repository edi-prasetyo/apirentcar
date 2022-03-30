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


defined("\102\x41\x53\105\120\x41\124\x48") or die("\116\x6f\40\144\151\x72\x65\x63\164\x20\163\x63\x72\x69\160\x74\x20\x61\x63\143\145\x73\x73\40\141\154\x6c\157\x77\145\144");
class Callback extends BD_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("\x4d\x5f\x6f\x72\144\x65\x72");
        $this->load->helper("\x78\x65\156\144\x69\164\141\x70\151");
        $this->xendit_config = $this->config->item("\170\145\x6e\144\151\x74");
        $this->xendit = new XenditApi($this->xendit_config);
    }
    public function xendit_get()
    {
        $this->xendit_post();
    }
    public function xendit_post()
    {
        try {
            goto O4610;
            O4631:
            if ($this->xendit_config["\143\x61\154\154\142\x61\143\x6b\137\164\157\153\145\x6e"] != $O3300) {
                header("\110\124\124\x50\57\61\x2e\x31\40\65\60\61\40\111\x6e\166\x61\x6c\x69\144\x20\x54\x6f\x6b\x65\156");
                echo "\x49\x6e\166\141\x6c\x69\x64\x20\x54\157\x6b\x65\x6e";
                die;
            }
            if (isset($O5719->ewallet_type) && $O5719->ewallet_type === "\x44\101\x4e\101") {
                $O7325 = $this->db->select("\52")->from("\164\162\141\x6e\163\141\x6b\163\x69")->where("\x6b\157\144\x65\x5f\x74\162\141\x6e\163\141\x6b\163\x69", $O5719->external_id)->get()->row();
            } else {
                $O7325 = $this->db->select("\52")->from("\164\x72\141\x6e\x73\141\x6b\x73\151")->where("\160\x61\171\x6d\145\156\164\x5f\x74\162\141\156\163\x61\143\x74\151\x6f\x6e\x5f\151\x64", $O5719->id)->get()->row();
            }
            $O2494 = false;
            if (!$O7325) {
                header("\x48\x54\124\x50\57\61\x2e\61\x20\65\60\61\40\116\157\164\40\146\157\165\156\x64\40\157\x72\144\x65\162");
                echo "\x4e\157\x74\x20\146\x6f\x75\x6e\144\x20\157\x72\144\x65\x72" . PHP_EOL;
                die;
            } elseif (isset($_GET["\x74\171\x70\145"]) && $_GET["\164\171\160\x65"]) {
                switch ($_GET["\164\x79\x70\x65"]) {
                    case "\151\156\x76\x6f\151\143\145":
                        $O6214 = $this->xendit->gen_payment_status($O5719->status);
                        $O7955 = isset($O5719->payment_destination) ? $O5719->payment_destination : '';
                        $O2494 = $this->M_order->update(array("\x73\164\141\x74\x75\x73\x5f\x70\x65\155\x62\x61\x79\141\162\x61\x6e" => $O6214, "\160\x61\171\155\145\x6e\x74\x5f\x63\150\x61\156\156\x65\x6c" => isset($O5719->payment_method) ? $O5719->payment_method : '', "\x70\141\171\155\x65\x6e\164\x5f\x63\x6f\x64\x65" => isset($O5719->payment_channel) ? $O5719->payment_channel : '', "\156\157\137\x76\141" => $O7955), array("\x69\144" => $O7325->id));
                        goto O4510;
                    case "\146\x76\x61\x5f\x73\x74\141\164\165\163":
                        $O6214 = $this->xendit->gen_payment_status($O5719->status);
                        $O2494 = $this->M_order->update(array("\163\x74\x61\164\165\163\x5f\160\145\x6d\142\x61\x79\x61\x72\141\156" => $O6214), array("\x69\144" => $O7325->id));
                        goto O4510;
                    case "\x66\x76\141\x5f\x70\x61\151\144":
                        if (isset($O5719->payment_id) && $O5719->payment_id) {
                            $O2494 = $this->M_order->update(array("\163\164\x61\164\165\x73\137\x70\145\x6d\142\x61\x79\x61\162\x61\156" => "\x4c\165\156\141\x73"), array("\151\x64" => $O7325->id));
                        }
                        goto O4510;
                    case "\162\x6f\137\146\x70\143\x5f\160\141\x69\144":
                        if ($O5719->status == "\x53\x45\x54\124\x4c\111\x4e\x47") {
                            $O2494 = $this->M_order->update(array("\x73\164\x61\x74\165\x73\x5f\x70\145\x6d\142\141\171\141\162\141\x6e" => "\114\x75\156\141\x73"), array("\151\x64" => $O7325->id));
                        }
                        goto O4510;
                    case "\157\166\157\x5f\160\x61\151\x64":
                        if ($O5719->status == "\x43\117\115\120\114\x45\x54\x45\104") {
                            $O2494 = $this->M_order->update(array("\163\x74\141\x74\x75\x73\137\x70\145\x6d\142\x61\x79\x61\x72\x61\x6e" => "\114\165\x6e\x61\163"), array("\151\144" => $O7325->id));
                        }
                        goto O4510;
                    case "\x65\167\x61\x6c\x6c\145\x74":
                        switch ($O5719->ewallet_type) {
                            case "\x44\x41\116\101":
                                if ($O5719->payment_status === "\x50\x41\x49\104") {
                                    $O2494 = $this->M_order->update(array("\x73\164\x61\164\x75\x73\x5f\160\x65\155\x62\141\171\x61\162\141\x6e" => "\x4c\165\x6e\141\x73"), array("\x69\144" => $O7325->id));
                                }
                                goto O0298;
                        }
                        O6920:
                        O0298:
                        goto O4510;
                }
                O4498:
                O4510:
            }
            header("\x48\124\x54\x50\57\x31\x2e\61\x20\x32\60\x30\40\117\x6b");
            goto O5015;
            O4610:
            $O1114 = file_get_contents("\x70\150\x70\x3a\57\x2f\151\156\160\165\164");
            $O5719 = json_decode($O1114);
            $this->xendit->write_log((isset($_GET["\164\x79\x70\145"]) ? $_GET["\x74\x79\160\145"] . "\x20" : '') . json_encode($O5719), "\x43\x42", "\143\142\x2d\x64\165\x6d\x70");
            if ($_SERVER["\x52\105\121\125\x45\123\x54\137\x4d\x45\124\x48\x4f\x44"] !== "\120\117\x53\x54") {
                header("\x48\124\x54\120\x2f\61\56\x31\40\65\x30\61\40\111\156\166\141\154\151\144\40\103\141\154\154\142\141\143\x6b");
                echo "\x49\156\x76\x61\x6c\151\x64\x20\103\141\x6c\154\x62\x61\143\153";
                die;
            }
            $O3300 = isset($_SERVER["\110\124\x54\120\137\130\x5f\x43\101\x4c\x4c\x42\x41\x43\x4b\x5f\x54\x4f\x4b\105\116"]) ? $_SERVER["\x48\x54\x54\120\137\130\137\103\101\114\x4c\x42\101\x43\x4b\137\124\x4f\113\x45\116"] : '';
            goto O4631;
            O5015:
            if ($O2494) {
                echo "\x53\125\x43\103\x45\123\x53";
                die;
            } else {
                echo "\x4f\x4b\105";
                die;
            }
            goto O2138;
            O2138:
        } catch (Exception $O5796) {
            header("\x48\124\x54\120\x2f\61\x2e\x31\40\64\x30\x31");
            echo "\105\x72\162\157\162\x20\151\x6e\40\x70\162\157\143\x65\x73\163\151\x6e\147\x20\x63\141\154\x6c\142\141\143\x6b\56\x20" . $O5796->getMessage();
            die;
        }
    }
}

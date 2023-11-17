<?php
class EngineTpl
{
    public $url_tpl;
    public $tpl;

    function __construct($url_tpl)
    {
        $this->url_tpl = $url_tpl;

        $this->tpl = file_get_contents($url_tpl);

        if ($this->testVar("URL_APP")) {
            $this->assignVar("URL_APP", URL_APP);
        }

        if ($this->testVar("CACHE")) {
            if (CACHE == MODO_DEBUG) {
                $this->assignVar("CACHE", "?rand=" . date("YmdHis"));
            } else {
                $this->assignVar("CACHE", "");
            }
        }
    }

    private function testVar($var_tpl)
    {
        return strpos($this->tpl, "{{{$var_tpl}}}");
    }

    public function assignVar($var_tpl, $value)
    {
        $pos = $this->testVar($var_tpl);

        if ($pos !== false) {
            $this->tpl = substr_replace($this->tpl, $value, $pos, strlen("{{{$var_tpl}}}"));
        } else {
            // Manejar el caso en el que no se encontró la variable
            echo "<b>error tpl:</b> No se encontró la variable <u>$var_tpl</u>";
        }
    }

    public function printToScreen()
    {
        echo $this->tpl;
    }
}
?>
